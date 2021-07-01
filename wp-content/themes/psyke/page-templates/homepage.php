<?php
/**
 * Template Name: Home Page
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

<div class="wrapper bg-white" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

        <main class="site-main" id="main" role="main">

            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'loop-templates/content-notitle', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
            ?>

        </main><!-- #main -->

	</div><!-- #content -->
    <?php
        get_template_part( 'global-templates/block-frases' );
        get_template_part( 'global-templates/block-blog-slider' );
        get_template_part( 'global-templates/block-meditaciones-slider' );
    ?>

</div><!-- #full-width-page-wrapper -->

<?php
    get_template_part( 'global-templates/novedades' );
?>

<?php
get_footer();
