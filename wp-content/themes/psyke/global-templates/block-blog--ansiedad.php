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
$posts = new WP_Query(
    array(
        'post_type'   => 'post',
        'category_name'  => 'ansiedad',
        'posts_per_page' => 3
    )
);

if( $posts->have_posts() ) : 
  ?>
  <section class="section-blog"> 
    <div class="section-blog--inner">
        <div class="padding-regular">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="slick-posts">
                        <?php
                            while( $posts->have_posts() ) : 
                                $posts->the_post(); 
                                    ?>
                                    <div class="slick-item">
                                        <?php get_template_part( 'loop-templates/content-card--post-default' ); ?>
                                    </div>
                                    <?php
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
