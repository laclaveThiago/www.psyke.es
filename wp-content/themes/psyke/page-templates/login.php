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

<div class="hero-pages hero-login has-overlay" style="background-image: url('<?php echo $featured_img_url; ?>');">
    <div class="hero-inner">
        <div class="hero-page-content hero-formacion">
            <div class="hero-page-inner">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-9 align-self-center">
                            <h1 data-animation="true" data-duration="0.5" data-delay="0" data-offset="100%" style="opacity: 0;">Programa de Formación en Mindfulness Profundo</h1>
                            <ul class="list-anchor-courses">
                                <li data-animation="true" data-duration="0.5" data-delay="0.2" data-offset="100%" style="opacity: 0;"><a href="#iniciacion" class="page-scroll btn btn-outline">1 Iniciación MBSR</a></li>
                                <li data-animation="true" data-duration="0.5" data-delay="0.4" data-offset="100%" style="opacity: 0;"><a href="#avanzado" class="page-scroll btn btn-outline">2 Avanzado</a></li>
                                <li data-animation="true" data-duration="0.5" data-delay="0.6" data-offset="100%" style="opacity: 0;"><a href="#profundizacion" class="page-scroll btn btn-outline">3 Profundización</a></li>
                            </ul>
                            <h2 data-animation="true" data-duration="0.5" data-delay="0.8" data-offset="100%" style="opacity: 0;">Formación <br>para empresas</h2>
                        </div>    
                    </div>    
                </div>
            </div>
            <div class="stamp--page">
                <div class="stamp">
                    <div class="stamp--inner"> (nº13619/2013)</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper wrapper-login bg-white padding-large" id="full-width-page-wrapper">

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
