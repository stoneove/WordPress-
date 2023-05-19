<?php
/**
 * Load libraries.
 */
require_once get_template_directory() . '/lib/tgm/class-tgm-plugin-activation.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets/widgets-init.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/tgmpa-functions.php';

/**
 * Load Init for Hook files.
 */
require get_template_directory() . '/inc/hooks/hooks-init.php';


 /**
 * admin dashboard
 */
require get_template_directory() . '/admin-dashboard/admin_dashboard.php';