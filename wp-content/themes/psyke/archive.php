
<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

<div class="wrapper" id="archive-wrapper">

	<div id="content" tabindex="-1">

			<main class="site-main" id="main">
				<?php
				if ( have_posts() ) {
					?>
                    
                    <header class="page-header page-header--archive padding-regular border-b">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                                    ?>
                                    <ul class="list-child-categories">
                                        <?php
                                            wp_list_categories(
                                                array(
                                                    'child_of' => get_queried_object_id(), // this will be ID of current category in a category archive
                                                    'style' => 'list',
                                                    'title_li' => ''
                                                )
                                            );
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </header><!-- .page-header -->
                            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="padding-large grid-masonry--container">
                                    <div class="grid-masonry">
                                        <div class="grid-sizer"></div>
                                    <?php
                                    // Start the loop.
                                    while ( have_posts() ) {
                                        the_post();

                                        /*
                                        * Include the Post-Format-specific template for the content.
                                        * If you want to override this in a child theme, then include a file
                                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                        */
                                        echo '<div class="grid-item">';
                                        get_template_part( 'loop-templates/content-card--post-default');
                                        echo '</div>';
                                    }
                                } else {
                                    get_template_part( 'loop-templates/content', 'none' );
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
			</main><!-- #main -->

            <section class="pagination-section padding-regular--top padding-large--bottom">
            <div class="container">
            <div class="row">
            <div class="col-md-12">
			<?php
			// Display the pagination component.
			understrap_pagination();
			// Do the right sidebar check.
			?>
            </div>
            </div>
            </div>
            </section>

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
