<?php
/**
 * Template Name: Calendar Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'full'); 

?>

    <div class="hero-pages hero-general has-overlay" style="background-image: url('<?php echo $featured_img_url; ?>');">
        <div class="hero-inner">
            <div class="hero-page-content">
                <div class="hero-page-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?php echo the_title(); ?></h1>
                                <?php
                                    if ( get_post_meta( get_the_ID(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true )) :
                                        echo do_shortcode(get_post_meta(get_the_id(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true)); 
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
    

<div class="wrapper bg-white padding-large" id="full-width-page-wrapper">

	<div class="container" id="content">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
