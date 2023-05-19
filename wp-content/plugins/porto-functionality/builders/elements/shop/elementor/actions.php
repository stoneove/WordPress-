<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Porto Shop Builder - Grid / List Toggle Widget
 *
 * @since 6.0
 */

use Elementor\Controls_Manager;

class Porto_Elementor_SB_Actions_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'porto_sb_actions';
	}

	public function get_title() {
		return __( 'Shop Hooks', 'porto-functionality' );
	}

	public function get_categories() {
		return array( 'porto-sb' );
	}

	public function get_keywords() {
		return array( 'action', 'shop', 'hook' );
	}

	public function get_icon() {
		return 'Simple-Line-Icons-anchor';
	}

	public function get_script_depends() {
		return array();
	}

	public function get_custom_help_url() {
		return 'https://www.portotheme.com/wordpress/porto/documentation/shop-builder-elements/';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_actions_layout',
			array(
				'label' => __( 'Shop Hooks', 'porto-functionality' ),
			)
		);

		$this->add_control(
			'notice_skin',
			array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => sprintf( __( 'To change the Products Archive’s layout, go to %1$sPorto / Theme Options / WooCommerce / Product Archives%2$s.', 'porto-functionality' ), '<a href="' . porto_get_theme_option_url( 'product-archive-layout' ) . '" target="_blank" class="porto-text-underline">', '</a>' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			)
		);

		$this->add_control(
			'notice_wrong_data',
			array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => __( 'The editor\'s preview might look different from the live site. Please check the frontend.', 'porto-functionality' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			)
		);

		$this->add_control(
			'action',
			array(
				'label'   => __( 'action', 'porto-functionality' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''                             => '',
					'woocommerce_before_shop_loop' => 'woocommerce_before_shop_loop',
					'woocommerce_after_shop_loop'  => 'woocommerce_after_shop_loop',
				),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$atts = $this->get_settings_for_display();
		if ( ! empty( $atts['action'] ) ) {
			do_action( $atts['action'] );
		}
	}
}
