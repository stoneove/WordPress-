<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package paxxer
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'paxxer_about' );
function paxxer_about() {         
        add_theme_page( esc_html__('About Theme', 'paxxer'), esc_html__('Paxxer Theme', 'paxxer'), 'edit_theme_options', 'paxxer-about', 'paxxer_about_page');   
}

// CSS for About Theme Page
function paxxer_admin_theme_style($hook) {

        if ( 'appearance_page_paxxer-about' != $hook ) {
        return;
    }

   wp_enqueue_style('paxxer-admin-style', get_template_directory_uri() . '/inc/admin/theme-info.css');
}
add_action('admin_enqueue_scripts', 'paxxer_admin_theme_style');

function paxxer_about_page() {
$theme = wp_get_theme();
$pro_purchase_url = "https://themecanary.com/pricing/paxxer/";
$doc_url = "https://themecanary.com/documentation/paxxer/";
$demo_url = "https://demo.themecanary.com/paxxer/#demos";
$support_url = "https://wordpress.org/support/theme/paxxer/";

$theme_name = esc_html( $theme->Name );
$free_theme_name = str_replace( ' Pro', '',$theme_name );
?>
<div class="paxxer-wrapper">
  <div id="theme-info-page">
    <div class="admin-banner">
      <div class="banner-left">
        <h2>
          <?php echo esc_html( $theme->Name ); ?>
        </h2>
        <p>
          <?php esc_html_e( 'Multipurpose WordPress Block Based Theme', 'paxxer' ); ?>
        </p>
      </div>
      <div class="banner-right">
        <div class="paxxer-buttons">
          <a href="<?php echo esc_url($doc_url); ?>" class="paxxer-admin-button demo" target="_blank" rel="noreferrer">
            <?php esc_html_e( 'Documentation', 'paxxer' ); ?>
          </a>
          <a href="<?php echo  esc_url($demo_url); ?>" class="paxxer-admin-button documentation" target="_blank" rel="noreferrer">
            <?php esc_html_e( 'Demo', 'paxxer' ); ?>
          </a>
          <a href="<?php echo  esc_url($pro_purchase_url); ?>" class="paxxer-admin-button upgrade-to-pro" target="__blank">
            <?php echo esc_html( 'Upgrade Pro', 'paxxer' ); ?>
          </a>
        </div>
      </div>
    </div>
    <div class="feature-list">
          <div class="paxxer-about-container compare-table">
              <h3>
                <?php echo esc_html( $free_theme_name ); ?>
                <?php esc_html_e( 'Free Vs Pro', 'paxxer' ); ?>
              </h3>
              <table>
                <thead>
                  <tr>
                    <th>
                      <?php esc_html_e( 'Features', 'paxxer' ); ?>
                    </th>
                    <th>
                      <?php echo esc_html( $theme->Name ); ?> <?php esc_html_e( 'Free', 'paxxer' ); ?>
                    </th>
                    <th>
                      <?php echo esc_html( $theme->Name ); ?> <?php esc_html_e( 'Pro', 'paxxer' ); ?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Easy Setup', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Responsive', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Advance Color Options', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( '800+ Fonts', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Slider Options ', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Customizer', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Front/ Home page posts categories', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Boxed Layout', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Sidebar', 'paxxer' ); ?>
                    </td>
                    <td><?php esc_html_e('Right Sidebar','paxxer'); ?></span>
                    </td>
                    <td><?php esc_html_e('Right/Left/ Fullwidth/ No Sidebar','paxxer'); ?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Back to Top', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Select Font Family', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Select Font Family', 'paxxer' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Styles', 'paxxer' ); ?>
                    </td>
                    <td><?php esc_html_e('3','paxxer'); ?></span>
                    </td>
                    <td><?php esc_html_e('11','paxxer'); ?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Templates', 'paxxer' ); ?>
                    </td>
                    <td><?php esc_html_e('10','paxxer'); ?></span>
                    </td>
                    <td><?php esc_html_e('13','paxxer'); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <?php esc_html_e( 'Patterns', 'paxxer' ); ?>
                    </td>
                    <td><?php esc_html_e('11','paxxer'); ?></span>
                    </td>
                    <td><?php esc_html_e('15','paxxer'); ?></span>
                    </td>
                  </tr>
                </tbody>
              </table>
          </div>
      <div class="about-us">
        <div class="our-product"><span><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></span>
          <h3>
            <?php esc_html_e( 'Love our product?', 'paxxer' ); ?>
          </h3>
          <h4>
            <?php esc_html_e( 'Motivate 5 Star rating', 'paxxer' ); ?>
          </h4>
          <a href="https://wordpress.org/support/theme/paxxer/reviews/?filter=5" class="paxxer-admin-button" target="__blank">
            <?php esc_html_e( 'Rate Us', 'paxxer' ); ?>
          </a>
        </div>
        <div class="our-product">
          <h3>
            <?php esc_html_e( 'Still have any question?', 'paxxer' ); ?>
          </h3>
          <p>
          <?php esc_html_e( 'Don\'t hesitate to ask', 'paxxer' ); ?>
          </p>
          <a href="<?php echo esc_url($support_url); ?>" class="paxxer-admin-button" target="_blank">
            <?php esc_html_e( 'Get Support', 'paxxer' ); ?>
          </a>
        </div>
        <div class="paxxer-buttons">
          <a href="<?php echo esc_url($pro_purchase_url); ?>" class="paxxer-admin-button upgrade-to-pro" rel="noreferrer" target="_blank"><i class="fa fa-paint-brush"></i>
            <?php printf( esc_html( 'Get Paxxer Pro', 'paxxer' ), $theme->Name ); ?>
          </a>
          <a href="<?php echo esc_url($doc_url); ?>" class="paxxer-admin-button premium-button documentation" target="_blank" rel="noreferrer"><i class="fa fa-book"></i>
            <?php esc_html_e( 'Documentation', 'paxxer' ); ?>
          </a>
        </div>
      </div>
    </div>
</div>

<?php }