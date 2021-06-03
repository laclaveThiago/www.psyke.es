<?php
/**
 * Template Name: Login
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper wrapper-login bg-white" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
				<h1>Login</h1>

                <?php $args = array(
                    'echo' => true,
                    //'redirect' => 'http://wpsnipp.com',
                    'form_id' => 'loginform',
                    'label_username' => __( 'Usuario' ),
                    'label_password' => __( 'Contraseña' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in' => __( 'Log In' ),
                    'id_username' => 'user_login',
                    'id_password' => 'user_pass',
                    'id_remember' => 'rememberme',
                    'id_submit' => 'wp-submit',
                    'remember' => true,
                    'value_username' => NULL,
                    'value_remember' => false );
                    wp_login_form($args);
                ?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
