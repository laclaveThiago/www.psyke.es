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
$frases = new WP_Query(
    array(
        'post_type'   => 'frases',
        'posts_per_page' => 3
    )
);

if( $frases->have_posts() ) : 
  ?>
  <section class="section-frases padding-regular"> 
    <div class="section-frases--inner"> 
  
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="slick-frases">
                        <?php
                            $slickCounter = 0;
                            while( $frases->have_posts() ) : 
                                $frases->the_post(); 
                                    ?>
                                    <div class="slick-item">

                                        <div class="card-frases">
                                            <div class="card-body typed-wrap" id="typedQuote-<?php echo $slickCounter; ?>">
                                                <?php the_content(); ?>
                                            </div>
                                            <?php if(get_post_meta( get_the_id(), 'authorQuote', true) || get_post_meta( get_the_id(), 'sourceQuote', true) ) : ?>
                                                <div class="card-footer">
                                                    <?php 
                                                        if( get_post_meta( get_the_id(), 'authorQuote', true) ) : 
                                                            echo get_post_meta( get_the_id(), 'authorQuote', true); 
                                                        endif;
                                                        if( get_post_meta( get_the_id(), 'sourceQuote', true) ) : ?>
                                                            <span class="source"> - <?php echo get_post_meta( get_the_id(), 'sourceQuote', true); ?></span>
                                                            <?php
                                                        endif;
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                    $slickCounter++;
                            endwhile;

                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
