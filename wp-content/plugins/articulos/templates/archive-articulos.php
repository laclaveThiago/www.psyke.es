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

<div class="hero-pages hero-blog" style="background-color: #efecea;">
    <div class="hero-inner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="title-hero text-center">Artículos</h2>
                    <p class="text-center text-dark-gray">Psyke ha participado en diferentes estudios de investigación científica en colaboración con Universidades como la Universidad de Valencia y la Universidad de Zaragoza. El avance del Mindfulness se debe a la evidencia de que funciona para multitud de trastornos como la depresión y la ansiedad.</p>
                </div>    
            </div>    
        </div>
        <section class="bottom-text">
            <div class="bottom-text--inner">
                <p class="text-center">LA SALUD MENTAL NECESITA LA INVESTIGACIÓN CIENTÍFICA</p>
            </div>
        </section>
    </div>
</div>


<div class="wrapper bg-white" id="wrapper-articulos">
    <?php
       if ( have_posts() ) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="padding-large">
                    <div class="row">
                            <?php
                                $pointerGrid = 1;
                                // Start the loop.
                                while ( have_posts() ) :
                                    the_post();
                                    /*
                                    * Include the Post-Format-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                    */
                                    if ($pointerGrid == 3 || $pointerGrid == 4 || $pointerGrid == 9 || $pointerGrid == 10) :
                                        //echo '<div class="grid-item grid-item--width2">';
                                        echo '<div class="col-md-4">';
                                    else:
                                        echo '<div class="col-md-4">';
                                    endif;
                                    get_template_part( 'loop-templates/content-card--articulos' );
                                    echo '</div>';
                                    $pointerGrid++;
                                endwhile;
                            ?>
                        
					</div>
					<?php
						else :
							get_template_part( 'loop-templates/content', 'none' );
						endif;
					?>
					<div class="row">
						<div class="col-md-12">
							<?php
								// Display the pagination component.
								understrap_pagination();
							?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
