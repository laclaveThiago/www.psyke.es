<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
    if ( get_post_meta( 48, 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true )) :
        $featured_img_url = get_the_post_thumbnail_url(48, 'full'); 
    ?>
    <div class="hero-pages hero-blog" style="background-color: #efecea;">
        <div class="hero-inner">
            <?php
                echo do_shortcode(get_post_meta(48, 'configurar_elementos_de_la_pagina_contenido-de-la-portada', true)); 
            ?>
        </div>
    </div>
<?php
    endif;
?>

<div class="wrapper" id="single-wrapper">

	<div id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					//understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						//comments_template();
					}
				}
				?>

			</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
