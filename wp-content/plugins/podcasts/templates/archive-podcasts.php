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
                    <h2 class="title-hero text-center">Podcasts</h2>
                    <p class="text-center text-dark-gray">Espacio para ir construyendo la base más esencial de la práctica de Mindfulness: el hábito de practicar a diario. A través de charlas y meditaciones guiadas aspiramos a generar el interés y la motivación necesaria para mantener una práctica regular en nuestra vida cotidiana.</p>
                </div>    
            </div>    
        </div>
        <section class="bottom-text">
            <div class="bottom-text--inner">
                <p class="text-center">EXPANDE EL MINDFULNESS A TODAS LAS ÁREAS DE TU VIDA</p>
            </div>
        </section>
    </div>
</div>


<div class="wrapper bg-white" id="wrapper-meditaciones">
    <?php
       if ( have_posts() ) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="padding-large grid-masonry--container">
                    <div class="grid-masonry">
                        <div class="grid-sizer"></div>
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
                                        echo '<div class="grid-item">';
                                    else:
                                        echo '<div class="grid-item">';
                                    endif;
                                    get_template_part( 'loop-templates/content-card--podcasts' );
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
