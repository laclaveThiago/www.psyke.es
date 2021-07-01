<?php
/**
 * Template Name: Basic Page
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
    <div class="hero-pages has-overlay" style="background-image: url('<?php echo $featured_img_url; ?>');">
        <div class="hero-inner">
            <?php
                echo do_shortcode(get_post_meta(get_the_id(), 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true)); 
            ?>
        </div>
    </div>
    <?php
endif;

if (get_the_ID() == 39) :
    //is pyske page
    ?>
        <svg class="anim-logotipo-psyke" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 142 142" style="enable-background:new 0 0 142 142;" xml:space="preserve">
            <g class="psyke-logo">
                <circle class="smile-base" cx="71" cy="71" r="71"></circle>
                <g class="smile-group">
                    <path d="M69.6,112.5c-10.4,0.2-21.2-2.1-31.4-6.9c-1-0.5-1.9-0.9-2.8-1.6c-1-0.7-1.6-1.7-1-3.1c0.7-1.4,1.7-1.9,3.3-1.4
                        c0.5,0.2,0.9,0.3,1.2,0.7c20.7,9.9,41.3,9.4,62.1,0.9c1-0.3,1.9-0.9,3-1.4c1.4-0.5,2.6-0.3,3.3,1c0.7,1.2,0.2,2.6-1.2,3.6
                        c-0.7,0.3-1.6,0.7-2.3,1C93.2,110.2,81.9,112.5,69.6,112.5z"></path>
                    <path d="M45,65.8c-5.2-0.2-9.7-1.7-13.7-5.2c-0.7-0.5-1.4-1.2-1.6-1.9c-0.2-0.9,0-2.3,0.5-2.8s1.9-0.5,2.8-0.3
                        c0.7,0.2,1.4,1,1.9,1.6c6.2,4.7,13.9,4.7,20.1,0c0.5-0.3,1-0.9,1.7-1.4c1.2-0.9,2.4-0.9,3.5,0.3s0.9,2.4-0.2,3.5
                        c-0.5,0.5-1.2,1.2-1.9,1.7C54.3,64.4,50,65.8,45,65.8z"></path>
                    <path d="M99.5,65.8c-6.1-0.2-10.2-1.6-13.9-4.5c-0.7-0.5-1.6-1.2-1.9-2.1c-0.3-0.7-0.3-2.1,0.2-2.6c0.7-0.7,1.7-0.7,2.8-0.9
                        c0.5,0,1,0.5,1.4,0.9c5.6,5.2,14.4,5.2,20.1,0c0.2,0,0.2-0.2,0.3-0.2c1.7-1.2,3.1-1.2,4,0c1,1.2,0.9,2.6-0.9,4
                        c-1.6,1.2-3.1,2.6-5,3.3C104,64.8,101,65.3,99.5,65.8z"></path>
                </g>
            </g>
        </svg>
    <?
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
