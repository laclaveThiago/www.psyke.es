<?php
/**
 * Terapias
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- Lasts Posts-->     
<?php 
$terapias = new WP_Query(
    array(
        'post_type'   => 'terapias',
        'posts_per_page' => -1
    )
);

if( $terapias->have_posts() ) : 
  ?>
  <section class="section-terapias--slider"> 
    <div class="section-terapias--slider-inner"> 
  
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    
                    <?php
                    while( $terapias->have_posts() ) : 
                        $terapias->the_post(); 
                            ?>
                            
                                <div class="card-terapias" id="card-terapias-<?php echo get_the_id();?>">
                                    <?php 
                                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full' );
                                    ?>
                                    <div class="collumn-image" style="background-image: url(<?php echo $backgroundImg[0]; ?>);">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="collumn-color" style="background-color:<?php echo get_post_meta( get_the_id(), 'colorLight', true); ?>"></div>
                                    </div>
                                    <div class="card-body" style="background-color:<?php echo get_post_meta( get_the_id(), 'colorDark', true); ?>">
                                        <div class="align-self-center">
                                            <div class="slick-terapias--vertical">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php
                    endwhile;

                    wp_reset_postdata();
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
