<?php
/**
 * Template Name: Formulario - cursos
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

<div class="hero-pages hero-pages--form has-overlay hero-contact--wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">
    <div class="hero-inner" style="flex-wrap: wrap;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0);" class="btn btn-link btn-link--sm btn-icon--left" onclick="goBack()" style="position: relative; z-index: 5;">
                            <span class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="svg-inline--fa fa-times fa-w-11"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path></svg></span> Cerrar formulario
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ( get_post_meta( get_the_ID(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true )) :
                echo do_shortcode(get_post_meta(get_the_id(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true)); 
            endif;
        ?>


            <div class="<?php echo esc_attr( $container ); ?>" id="content">

                <main class="site-main" id="main" role="main">
                    
                    <div class="box-contact box-courses-form">
                        <div class="box-card bg-white">
                            <?php get_template_part( 'loop-templates/card-info-curso'); ?>
                        </div>
                        <div class="box-form">
                            <div class="padding--inner">
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
                            </div>
                        </div>
                    </div>

                </main><!-- #main -->

            </div><!-- #content -->

    </div>
</div>

<?php
get_footer();
