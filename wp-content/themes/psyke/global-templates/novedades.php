<?php
/**
 * Frases
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- Lasts Posts-->     
<?php 
$novedades = new WP_Query(
    array(
        'post_type'   => 'novedades',
        'post_status' => 'publish',
        'posts_per_page' => 1
    )
);

if( $novedades->have_posts() ) : 
  ?>
  <section class="section-novedades"> 
  
        
    <?php
        while( $novedades->have_posts() ) : 
            $novedades->the_post(); 
                ?>
                <div class="novedad-item">
                    <div class="marquee">
                        <div class="marquee__inner" aria-hidden="true">
                            <span><?php the_content(); ?></span>
                            <span><?php the_content(); ?></span>
                            <span><?php the_content(); ?></span>
                            <span><?php the_content(); ?></span>
                        </div>
                    </div>
                </div>   
                <?php
        endwhile;
        wp_reset_postdata();
    ?>
                    
</section>
<?php endif; ?>
