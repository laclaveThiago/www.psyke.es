<?php
/**
 * Posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- Lasts Posts-->     
<?php 
$meditaciones = new WP_Query(
    array(
        'post_type'   => 'meditaciones',
        'posts_per_page' => 8,
        'order' => 'ASC' 
    )
);

if( $meditaciones->have_posts() ) : 
  ?>
  <section class="section-meditaciones-slider"> 
    <div class="section-meditaciones--inner">
        <div class="padding-regular bg-primary">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h3 class="text-center text-alternate text-gray title-smile">Ser Mindful</h3>
                        <p class="text-center text-white text-uppercase">Encuentra tu momento y tu lugar para meditar</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-regular">
            <div class="container">
                <?php if ( is_active_sidebar( 'intro-meditation' ) ) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php dynamic_sidebar( 'intro-meditation' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="slick-meditaciones">
                        <?php
                            while( $meditaciones->have_posts() ) : 
                                $meditaciones->the_post(); 
                                    ?>
                                    <div class="slick-item">
                                        <?php get_template_part( 'loop-templates/content-card--meditaciones' ); ?>
                                    </div>
                                    <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-regular">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>meditaciones" class="btn btn-outline btn-outline--primary">Ver meditaciones</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
