<?php
 /**
  * Title: Header Top Bar
  * Slug: paxxer/header-top-bar
  * Categories: paxxer,header
  */
?>
<!-- wp:group {"align":"wide","backgroundColor":"primary","className":"block-top-bar","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide block-top-bar has-primary-background-color has-background"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"size-full is-resized is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/icon-phone.png" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size" style="font-style:normal;font-weight:500"><a href="tel+987 654 123" target="_blank" rel="noreferrer noopener"><?php esc_html_e('+987 654 123','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"size-full is-resized is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/icon-envelope.png" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size" style="font-style:normal;font-weight:500"><a href="mailto:support@yourdomain.com" target="_blank" rel="noreferrer noopener"><?php esc_html_e('support@yourdomain.com','paxxer'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":["#fff","#fff"]}}} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/icon-location.png" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size" style="font-style:normal;font-weight:500"><a href="#" target="_blank" rel="noreferrer noopener"><?php esc_html_e('Your Location','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:social-links {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"wordpress"} /-->

<!-- wp:social-link {"url":"#","service":"fivehundredpx"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"vk"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->