<?php

/**
 * Title: Header Banner Image
 * Slug:paxxer/header-banner-image
 * Categories:paxxer,header,featured
 */
?>

<!-- wp:cover {"url":"<?php echo get_parent_theme_file_uri( 'assets/images/header-banner.jpg' ); ?>","id":66,"hasParallax":true,"dimRatio":30,"overlayColor":"primary","minHeight":800,"isDark":false,"align":"full","className":"banner-image"} -->
<div class="wp-block-cover alignfull is-light has-parallax banner-image" style="min-height:800px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div role="img" class="wp-block-cover__image-background wp-image-66 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo get_parent_theme_file_uri( 'assets/images/header-banner.jpg' ); ?>)"></div><div class="wp-block-cover__inner-container"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","layout":{"type":"default"}} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:paragraph {"align":"center","textColor":"white","className":"banner-title","fontSize":"x-large"} -->
<p class="has-text-align-center banner-title has-white-color has-text-color has-x-large-font-size" id="div"><?php esc_html_e('Welcome to Block Based Theme','paxxer'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"22px"}},"textColor":"white","className":"banner-description"} -->
<p class="has-text-align-center banner-description has-white-color has-text-color" id="span" style="font-size:22px"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','paxxer'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"0px"}},"fontSize":"medium"} -->
<div class="wp-block-button has-custom-font-size has-medium-font-size"><a href="#" class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:0px"><?php esc_html_e('Continue Reading','paxxer'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->