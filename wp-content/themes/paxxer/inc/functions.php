<?php
/**
 * Custom functions
 *
 * @package WpInvent
 * @subpackage Paxxer
 * @since paxxer 1.0
 */

/* Adding Fonts */
	
if ( ! function_exists( 'paxxer_fonts_url' ) ) :
	/**
	 * Register Google fonts for Paxxer.
	 *
	 * Create your own paxxer_fonts_url() function
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function paxxer_fonts_url() {
		$font_number = get_theme_mod('font-number','2');
		$fonts_url = '';
		$fonts     = array();
		for( $i = 1; $i <= $font_number; $i++ ){
			$font_family = get_theme_mod('font-families_'. $i,'Source Serif Pro');
	
			/* translators: If there are characters in your language that are not supported by Source Serif Pro, translate this to 'off'. Do not translate into your own language. */

			if ( 'off' !== _x( 'on', $font_family. 'font: on or off', 'paxxer' ) ) {
				$fonts[] = $font_family.':wght@100;200;300;400;500;800';
			}
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => implode('&family=', $fonts) ,
				'display' => 'swap',
			), 'https://fonts.googleapis.com/css2' );
		}
	
		return esc_url_raw($fonts_url);
	}
	endif;

/**
 * Enqueue scripts and styles.
 */
	function paxxer_scripts() {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		
		wp_enqueue_style( 'paxxer-google-fonts', wptt_get_webfont_url(paxxer_fonts_url()), array(), null );
		
	}
	add_action( 'wp_enqueue_scripts', 'paxxer_scripts', 100 );