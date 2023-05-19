<?php
 /**
  * Title: About
  * Slug: paxxer/about
  * Categories: paxxer,frontpage
  */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"color":{"gradient":"linear-gradient(257deg,rgb(238,238,238) 4%,rgb(169,184,195) 54%)"}},"layout":{"type":"constrained","contentSize":"1440px"}} -->
<div class="wp-block-group alignfull has-background" style="background:linear-gradient(257deg,rgb(238,238,238) 4%,rgb(169,184,195) 54%);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
<h2><?php esc_html_e('Learn more about Theme Development','paxxer'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras est lacus, convallis a dignissim vel, sollicitudin id dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.','paxxer');?> </p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"30px","right":"30px"}}}} -->
<div class="wp-block-button"><a href="#" class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:0px;padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px"><?php esc_html_e('Enroll Today','paxxer'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"25px","right":"25px"}},"color":{"background":"#ffffff00"}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a href="#" class="wp-block-button__link has-background-color has-text-color has-background wp-element-button" style="border-radius:0px;background-color:#ffffff00;padding-top:15px;padding-right:25px;padding-bottom:15px;padding-left:25px"><?php esc_html_e('View Courses','paxxer');?>→</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/hand-internet-finger.jpg","dimRatio":0,"focalPoint":{"x":0.43,"y":0.22},"minHeight":550,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:550px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/hand-internet-finger.jpg" style="object-position:43% 22%" data-object-fit="cover" data-object-position="43% 22%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->