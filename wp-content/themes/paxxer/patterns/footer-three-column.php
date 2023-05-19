<?php
 /**
  * Title: Footer Three Column
  * Slug: paxxer/footer-three-column
  * Categories: paxxer, footer
  */
?>
<!-- wp:group {"align":"full","backgroundColor":"footer-column","className":"footer","layout":{"type":"constrained","contentSize":"1440px"}} -->
<div class="wp-block-group alignfull footer has-footer-column-background-color has-background"><!-- wp:columns {"align":"wide","className":"upper-footer"} -->
<div class="wp-block-columns alignwide upper-footer"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"border-color","className":"wp-block-widget","layout":{"type":"constrained","justifyContent":"left","contentSize":""}} -->
<div class="wp-block-column wp-block-widget has-border-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"textDecoration":"underline"}},"className":"footer-title"} -->
<h3 class="footer-title" style="text-decoration:underline"><?php esc_html_e('About Us','paxxer');?></h3>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:group {"className":"wp-info-group","layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group wp-info-group"><!-- wp:image {"id":2038,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/about-us.jpg' ); ?>" alt="" class="wp-image-2038"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e('(+990) 123 3456 7890','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"wp-info-group","layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group wp-info-group"><!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e('support@companyname.com','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras est lacus, convallis a dignissim vel, sollicitudin id dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.','paxxer');?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"border-color"} -->
<div class="wp-block-column has-border-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":3,"style":{"typography":{"textDecoration":"underline"}},"className":"footer-title"} -->
<h3 class="footer-title" style="text-decoration:underline"><?php esc_html_e('Recent Post','paxxer');?></h3>
<!-- /wp:heading -->

<!-- wp:latest-posts {"postsToShow":3,"displayPostContent":true,"excerptLength":10,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":75,"featuredImageSizeHeight":75} /--></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"border-color","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-column has-border-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":3,"style":{"typography":{"textDecoration":"underline"}},"className":"footer-title"} -->
<h3 class="footer-title" style="text-decoration:underline"><?php esc_html_e('Information','paxxer');?></h3>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|footer-column"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size" style="font-style:normal;font-weight:500"><a href="tel+987 654 123" target="_blank" rel="noreferrer noopener"><?php esc_html_e('+987 654 123','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|footer-column"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size" style="font-style:normal;font-weight:500"><a href="mailto:support@yourdomain.com" target="_blank" rel="noreferrer noopener"><?php esc_html_e('support@yourdomain.com','paxxer');?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:social-links {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"wordpress"} /-->

<!-- wp:social-link {"url":"#","service":"fivehundredpx"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"vk"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->