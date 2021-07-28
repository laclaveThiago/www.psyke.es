<?php
/**
 * Template Name: Basic Page - Hero Basic
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
    if ( get_post_meta( get_the_ID(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true )) :
            $featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'full'); 
        ?>
        <div class="hero-pages has-overlay hero-unlock-height" style="background-image: url('<?php echo $featured_img_url; ?>');">
            <div class="hero-inner">
                <?php
                    echo do_shortcode(get_post_meta(get_the_id(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true)); 
                ?>
            </div>
        </div>
        <?php
    endif;
?>

<div class="wrapper bg-white" id="full-width-page-wrapper">

	<div id="content">
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

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
