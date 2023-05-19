<?php
/*
Plugin Name: Porto Theme - Functionality
Plugin URI: http://themeforest.net/user/p-themes
Description: Adds functionality such as Shortcodes, Post Types and Widgets to Porto Theme
Version: 2.9.1
Author: P-Themes
Author URI: http://themeforest.net/user/p-themes
License: GNU General Public License version 3.0
Text Domain: porto-functionality
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class Porto_Functionality {

	private $widgets     = array( 'block', 'recent_posts', 'twitter_tweets' );
	private $woo_widgets = array( 'price_filter_list' );

	/**
	 * Constructor
	 *
	 * @since 1.0
	 */
	public function __construct() {
		
		$active_plugins = get_option( 'active_plugins', array() );
		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, array_flip( get_site_option( 'active_sitewide_plugins', array() ) ) );
		}
		// define contants
		$this->define_constants( $active_plugins );
		// Import, filter and save studios
		if ( wp_doing_ajax() && isset( $_REQUEST['action'] ) && ( 'porto_studio_filter_category' === $_REQUEST['action'] || 'porto_studio_save' === $_REQUEST['action'] || 'porto_studio_import' === $_REQUEST['action'] ) ) {
			/**
			 * Import Soft Mode class - Remove unnecessary theme options for studio import
			 * 
			 * @since 2.8.0
			 */
			require_once PORTO_SOFT_MODE_PATH . 'setup.php';
			// add porto builders
			require_once PORTO_BUILDERS_PATH . 'init.php';
			// add shortcodes
			if ( ! in_array( 'porto-shortcodes/porto-shortcodes.php', $active_plugins ) ) {
				$this->load_shortcodes();
			}
			return;
		}

		add_action( 'plugins_loaded', array( $this, 'load_woo' ), 1 );
		// Load text domain
		add_action( 'plugins_loaded', array( $this, 'load' ) );

		add_action( 'init', array( $this, 'init' ), 20 );

		add_action( 'redux/page/porto_settings/enqueue', array( $this, 'fix_redux_styles' ) );


		$porto_old_plugins = ( in_array( 'porto-content-types/porto-content-types.php', $active_plugins ) ||
					in_array( 'porto-shortcodes/porto-shortcodes.php', $active_plugins ) ||
					in_array( 'porto-widgets/porto-widgets.php', $active_plugins ) );
		if ( $porto_old_plugins ) {
			add_action( 'admin_notices', array( $this, 'notice_to_remove_old_plugins' ) );
			add_action( 'network_admin_notices', array( $this, 'notice_to_remove_old_plugins' ) );
		}

		/**
		 * Load Soft Mode
		 *
		 * @since 2.3.0
		 */
		require_once PORTO_SOFT_MODE_PATH . 'setup.php';

		// add shortcodes
		if ( ! in_array( 'porto-shortcodes/porto-shortcodes.php', $active_plugins ) ) {
			$this->load_shortcodes();
		}

		// add porto content types
		if ( ! in_array( 'porto-content-types/porto-content-types.php', $active_plugins ) ) {
			$this->load_content_types();
		}

		// include critical css wizard
		require_once PORTO_CRITICAL_PATH . 'init.php';

		// add porto builders
		require_once PORTO_BUILDERS_PATH . 'init.php';
		
		// include ai content generator
		require_once PORTO_FUNC_LIB_PATH . 'ai-generator/class-content-generator.php';

		// include maintenance
		require_once dirname( __FILE__ ) . '/maintenance/init.php';

		// add meta library
		require_once( PORTO_META_BOXES_PATH . 'lib/meta_values.php' );

		require_once( PORTO_META_BOXES_PATH . 'lib/meta_fields.php' );

		// Disable Gutenberg editing
		global $porto_settings;

		if ( defined( 'ELEMENTOR_VERSION' ) || defined( 'WPB_VC_VERSION' ) || ( empty( $porto_settings['enable-gfse'] ) || true != $porto_settings['enable-gfse'] ) ) {
			add_filter( 'theme_file_path', array( $this, 'disable_gutenberg_editing' ), 99, 2 );
		}
	}

    /**
	 * Disable Gutenberg Editing
	 *
	 * @since 2.5.1
	 */
	public function disable_gutenberg_editing( $path = false, $file = false ) {
		if ( 'templates/index.html' == $file || 'block-templates/index.html' == $file ) {
			return false;
		}
		return $path;
	}

	// load plugin text domain
	public function load() {

		if ( ! defined( 'ELEMENTOR_VERSION' ) && ! defined( 'WPB_VC_VERSION' ) ) {
			require_once dirname( __FILE__ ) . '/maintenance/porto-gutenberg-fse.php';
		}

		load_plugin_textdomain( 'porto-functionality', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		if ( apply_filters( 'porto_legacy_mode', true ) ) { // legacy mode
			$this->widgets       = array_merge( $this->widgets, array( 'recent_portfolios', 'contact_info', 'follow_us' ) );	
		}
		if ( defined( 'PORTO_WIDGETS_PATH' ) ) {
			if ( class_exists( 'Woocommerce' ) ) {
				$this->load_woocommerce_widgets();
			}
			// load porto widgets
			$this->load_widgets();
		}
		// add metaboxes
		require_once( PORTO_META_BOXES_PATH . 'meta_boxes.php' );
		if ( defined( 'ELEMENTOR_VERSION' ) || defined( 'WPB_VC_VERSION' ) ) {
			include_once 'conditional-rendering/init.php';
		}
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			/**
			 * Register Elementor widgets and settings
			 */
			require_once( dirname( PORTO_META_BOXES_PATH ) . '/elementor/init.php' );
		}
	}

	public function init() {

		// add async attribute
		add_filter( 'script_loader_tag', array( $this, 'script_add_async_attribute' ), 10, 2 );

		// fix yith woocommerce ajax navigation issue
		if ( defined( 'YITH_WCAN' ) ) {
			add_filter( 'the_post', array( $this, 'woocommerce_yith_ajax_filter' ), 16, 2 );
		}

		if ( class_exists( 'WC_Vendors' ) ) {
			global $porto_settings;
			if ( isset( $porto_settings['porto_wcvendors_product_tab'] ) && $porto_settings['porto_wcvendors_product_tab'] ) {
				remove_filter( 'woocommerce_product_tabs', array( 'WCV_Vendor_Shop', 'seller_info_tab' ) );
			}
		}

		add_filter( 'dynamic_sidebar_params', array( $this, 'add_classes_to_subscription_widget' ) );

		if ( is_admin() ) {
			require_once( PORTO_BUILDERS_PATH . 'lib/class-block-check.php' );
		}
	}

	public function woocommerce_yith_ajax_filter( $posts, $query = false ) {
		if ( class_exists( 'WooCommerce' ) ) {
			remove_filter( 'the_posts', array( YITH_WCAN()->frontend, 'the_posts' ), 15 );
		}
		return $posts;
	}

	public function script_add_async_attribute( $tag, $handle ) {
		// add script handles to the array below
		$scripts_to_async = array( 'jquery-magnific-popup', 'modernizr', 'porto-theme-async', 'jquery-flipshow', 'porto_shortcodes_flipshow_loader_js', 'jquery-hoverdir' );
		if ( in_array( $handle, $scripts_to_async ) ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
		return $tag;
	}

	public function add_classes_to_subscription_widget( $params ) {
		if ( __( 'MailPoet Subscription Form', 'wysija-newsletters' ) == $params[0]['widget_name'] || 'MailPoet Subscription Form' == $params[0]['widget_name'] ) {
			$params[0]['before_widget'] = $params[0]['before_widget'] . '<div class="box-content">';
			$params[0]['after_widget']  = '</div>' . $params[0]['after_widget'];
		}
		return $params;
	}

	public function notice_to_remove_old_plugins() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		/* translators: opening and closing bold tags */
		echo '<div class="error"><p>' . sprintf( esc_html__( '%1$sImportant:%2$s Please deactivate Porto Shortcodes, Porto Content Types and Porto Widgets plugins from old Porto 3.x version.', 'porto-functionality' ), '<b>', '</b>' ) . '</p></div>';
	}

	public function fix_redux_styles() {
		// *****************************************************************
		// Select2 JS
		// *****************************************************************
		// JWp6 plugin giving us problems.  They need to update.
		if ( wp_script_is( 'jquerySelect2' ) ) {
			wp_deregister_script( 'jquerySelect2' );
			wp_dequeue_script( 'jquerySelect2' );
			wp_dequeue_style( 'jquerySelect2Style' );
		}
	}

	protected function define_constants( $active_plugins ) {

		define( 'PORTO_FUNC_VERSION', '2.9.1' );
		define( 'PORTO_FUNC_FILE', __FILE__ );
		define( 'PORTO_FUNC_PLUGIN_BASE', plugin_basename( PORTO_FUNC_FILE ) );
		define( 'PORTO_META_BOXES_PATH', dirname( __FILE__ ) . '/meta_boxes/' );
		define( 'PORTO_BUILDERS_PATH', dirname( __FILE__ ) . '/builders/' );
		define( 'PORTO_CRITICAL_PATH', dirname( __FILE__ ) . '/critical-css/' );
		define( 'PORTO_SOFT_MODE_PATH', dirname( __FILE__ ) . '/soft-mode/' );
		define( 'PORTO_FUNC_LIB_PATH', dirname( __FILE__ ) . '/lib/' );
		define( 'PORTO_FUNC_URL', plugin_dir_url( __FILE__ ) );
		if ( ! in_array( 'porto-shortcodes/porto-shortcodes.php', $active_plugins ) ) {
			define( 'PORTO_SHORTCODES_URL', PORTO_FUNC_URL . 'shortcodes/' );
			define( 'PORTO_SHORTCODES_PATH', dirname( __FILE__ ) . '/shortcodes/shortcodes/' );
			define( 'PORTO_SHORTCODES_WOO_PATH', dirname( __FILE__ ) . '/shortcodes/woo_shortcodes/' );
			define( 'PORTO_SHORTCODES_LIB', dirname( __FILE__ ) . '/shortcodes/lib/' );
			define( 'PORTO_SHORTCODES_TEMPLATES', dirname( __FILE__ ) . '/shortcodes/templates/' );
			define( 'PORTO_SHORTCODES_WOO_TEMPLATES', dirname( __FILE__ ) . '/shortcodes/woo_templates/' );
		}
		if ( ! in_array( 'porto-content-types/porto-content-types.php', $active_plugins ) ) {
			define( 'PORTO_CONTENT_TYPES_PATH', dirname( __FILE__ ) . '/content-types/' );
			define( 'PORTO_CONTENT_TYPES_LIB', dirname( __FILE__ ) . '/content-types/lib/' );
		}
		if ( ! in_array( 'porto-widgets/porto-widgets.php', $active_plugins ) ) {
			define( 'PORTO_WIDGETS_PATH', dirname( __FILE__ ) . '/widgets/' );
		}
	}

	// Load Shortcodes
	protected function load_shortcodes() {
		require_once( PORTO_SHORTCODES_PATH . '../porto-shortcodes.php' );
	}

	// Load Content Types
	protected function load_content_types() {
		require_once( PORTO_CONTENT_TYPES_PATH . 'porto-content-types.php' );
	}

	// Load widgets
	protected function load_widgets() {
		foreach ( $this->widgets as $widget ) {
			require_once( PORTO_WIDGETS_PATH . $widget . '.php' );
		}
	}

	// Load Woocommerce widgets
	protected function load_woocommerce_widgets() {
		foreach ( $this->woo_widgets as $widget ) {
			require_once( PORTO_WIDGETS_PATH . $widget . '.php' );
		}
	}

	/**
	 * Load woo
	 * 
	 * @since 2.7.0
	 */
	public function load_woo() {
		if ( class_exists( 'WooCommerce' ) ) {
			require_once dirname( __FILE__ ) . '/porto-woo.php';
		}
	}
}

/**
 * Instantiate the Class
 *
 * @since     1.0
 * @global    object
 */
$porto_functionality = new Porto_Functionality();
