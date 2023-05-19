<?php
/**
 * Maintenance
 *
 * @author  P-THEMES
 * @package Porto
 * @since 2.5.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Porto Maintenance
 *
 * @since 2.5.0
 */
class Porto_Maintenance {

	private $usage_builder = array(
		'block'   => 0,
		'header'  => 0,
		'footer'  => 0,
		'product' => 0,
		'shop'    => 0,
		'archive' => 0,
		'single'  => 0,
		'popup'   => 0,
		'type'    => 0,
	);

	/**
	 * The Constructor
	 *
	 * @since 2.5.0
	 */
	public function __construct() {
		add_action( 'porto_send_statistics_info', array( $this, 'collect_data' ) );
		add_filter( 'template_include', array( $this, 'control_maintenance' ), 9999 );
		add_action( 'admin_bar_menu', array( $this, 'add_maintenance_notice' ), 999 );
		self::init();
	}

	public static function init() {
		register_activation_hook( PORTO_FUNC_PLUGIN_BASE, array( __CLASS__, 'activate' ) );
		register_uninstall_hook( PORTO_FUNC_PLUGIN_BASE, array( __CLASS__, 'deactivate' ) );
	}

	/**
	 * Get the count of template builders.
	 *
	 * @since 2.5.0
	 */
	public function get_builder_count() {
		global $wpdb;
		$results = $wpdb->get_results(
			"SELECT meta.meta_value builder, COUNT(ID) count
			FROM {$wpdb->posts} posts
			LEFT JOIN {$wpdb->postmeta} meta ON posts.id=meta.post_id
			WHERE post_status = 'publish' AND post_type='porto_builder'
				AND meta.meta_key = 'porto_builder_type'
			GROUP BY meta.meta_value"
		);

		if ( $results ) {
			foreach ( $results as $result ) {
				$this->usage_builder[ $result->builder ] = (int) $result->count;
			}
		}
	}


	/**
	 * Is allow send?
	 *
	 * @since 2.5.0
	 */
	public function allow_send() {
		global $porto_settings_optimize;

		if ( isset( $porto_settings_optimize['analysis_info'] ) ) {
			if ( $porto_settings_optimize['analysis_info'] ) {
				return true;
			} else {
				return false;
			}
		} else {
			if ( defined( 'PORTO_DEMO' ) ) {
				return false;
			} else {
				return true;
			}
		}
	}

	/**
	 * Collecting Data
	 *
	 * @since 2.5.0
	 */
	public function collect_data() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}
		if ( ! defined( 'PORTO_VERSION' ) ) {
			return;
		}
		if ( ! $this->allow_send() ) {
			return;
		}

		$this->usage_builder = apply_filters( 'porto_templates_builder_types', $this->usage_builder, 'usage' );
		$this->get_builder_count();

		global $porto_settings, $porto_settings_optimize;
		$code = '';
		if ( function_exists( 'Porto' ) ) {
			$code = Porto()->get_purchase_code();
		} else {
			$code = get_option( 'envato_purchase_code_9207399' );
		}
		if ( empty( $code ) ) {
			return false;
		}
		$info = array(
			'email'             => get_option( 'admin_email' ),
			'code'              => $code,
			'info'              => array(
				'site_lang'         => get_bloginfo( 'language' ),
				'version'           => PORTO_VERSION,
				'soft_mode'         => ! apply_filters( 'porto_legacy_mode', true ),
				'live_option_panel' => get_theme_mod( 'theme_options_use_new_style', false ),
				'critical_css'      => ! empty( $porto_settings_optimize['critical_css'] ) ? true : false,
				'merge_stylesheets' => ! empty( $porto_settings_optimize['merge_stylesheets'] ) ? true : false,
				'woocommerce'       => defined( 'WOOCOMMERCE_VERSION' ) ? true : false,
				'header_type'       => isset( $porto_settings['header-type-select'] ) ? $porto_settings['header-type-select'] : '',
				'elementor'         => defined( 'ELEMENTOR_VERSION' ) ? true : false,
				'wpb'               => defined( 'WPB_VC_VERSION' ) ? true : false,
				'builder'           => $this->usage_builder,
			),
			'installed_time'    => date( 'Y-m-d', porto_installed_time() ),
			'installed_month'   => date( 'Y-m', porto_installed_time() ),
			'installed_year'    => date( 'Y', porto_installed_time() ),
			'last_updated_time' => date( 'Y-m-d' ),
		);

		add_filter( 'https_ssl_verify', '__return_false' );

		add_filter( 'http_request_args', array( $this, 'http_request_args' ), 10, 2 );

		$response = wp_remote_post(
			PORTO_API_URL . 'download/tracker.php',
			array(
				'timeout'    => 60,
				'user-agent' => 'Porto/' . PORTO_VERSION,
				'body'       => array(
					'data' => wp_json_encode( $info ),
					'code' => $code,
				),
			)
		);
		if ( is_wp_error( $response ) ) {
			return $response;
		}
	}

	/**
	 * Filters the http request args.
	 *
	 * @since 2.5.0
	 */
	public function http_request_args( $parsed_args = [], $url = '' ) {
		if ( false === strpos( $url, PORTO_API_URL ) ) {
			return $parsed_args;
		}
		if ( ! isset( $parsed_args['headers'] ) || ! is_array( $parsed_args['headers'] ) ) {
			$parsed_args['headers'] = array();
		}
		$parsed_args['headers']['Referer'] = site_url();

		return $parsed_args;
	}

	/**
	 * Activate plugin
	 *
	 * @since 2.5.0
	 */
	public static function activate() {
		wp_clear_scheduled_hook( 'porto_send_statistics_info' );
		wp_schedule_event( time(), 'weekly', 'porto_send_statistics_info' );
	}

	/**
	 * Uninstall plugin
	 *
	 * @since 2.5.0
	 */
	public static function deactivate() {
		wp_clear_scheduled_hook( 'porto_send_statistics_info' );
	}

	/**
	 * Add info to admin bar about maintenance notice
	 * 
	 * @since 2.7.0
	 */
	public function add_maintenance_notice( $admin_bar ) {
		
		global $porto_settings;
		if ( ! empty( $porto_settings['is-maintenance'] ) ) {
			$admin_bar->add_menu(
				array(
					'id'     => 'porto-maintenance',
					'parent' => 'top-secondary',
					'title'  => sprintf( __( '%sMaintenance Mode Enabled%s', 'porto-functionality' ), '<span style="color: red">', '</span>' ),
					'href'   => porto_get_theme_option_url( 'is-maintenance' ),
				)
			);
		}

		return $admin_bar;
	}

	/**
	 * Control the maintenance mode
	 * 
	 * @since 2.7.0
	 */
	public function control_maintenance( $template ) {
		if ( is_user_logged_in() && current_user_can( 'edit_published_posts' ) ) { 
			return $template;
		}

		global $porto_settings;
		
		if ( empty( $porto_settings['is-maintenance'] ) ) {
			return $template;
		}
		
		$abspath = str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, ABSPATH );
		$included_files = get_included_files();
		if ( in_array( $abspath . 'wp-login.php', $included_files ) || 
			in_array( $abspath . 'wp-register.php', $included_files ) || 
			( isset( $_GLOBALS['pagenow'] ) && $GLOBALS['pagenow'] == 'wp-login.php' ) || 
			$_SERVER['PHP_SELF'] == '/wp-login.php'  ) {
			return $template;
		}
		$fallback  = '<h2>';
		$fallback .= esc_html__( 'This is default maintenance page. Please create a new page and set it as \'Maintenance Page\' in Theme Option.', 'porto-functionality' );
		$fallback .= '</h2>';
		
		$maintenance_page = $porto_settings['maintenance-page'];
		
		if ( $maintenance_page ) {
			if ( is_page( $maintenance_page ) ) { // without checkout, shop like archive page.
				status_header( 503 ); // Common causes are a server that is down for maintenance or that is overloaded.
				nocache_headers();
				return $template;
			}
			if ( wp_redirect( get_permalink( $maintenance_page ) ) ) {
				exit;
			}
		}
		
		/**
		 * Output a fallback message if redirect failed or no page selected
		 */
		status_header( 503 );
		nocache_headers();
		exit( $fallback );
	}
}

new Porto_Maintenance;
