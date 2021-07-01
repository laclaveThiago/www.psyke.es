<?php
/**
 * Card post
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card-post">
    <a href="<?php the_permalink(); ?>" class="card-post--inner">
        <div class="card-image">
            <div class="card-image--inner">
                <?php 
                    if (has_post_thumbnail()) :
                        $featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'thumbnailQuad'); 
                    else:
                        $featured_img_url = get_stylesheet_directory_uri().'/img/assets/thumbnail-quad.jpg';
                    endif;
                ?>
                <canvas class="" width="620" height="620" style="background-image: url('<?php echo $featured_img_url; ?>');"></canvas>
            </div>
        </div>
        <div class="card-header">
            <h3><?php the_title(); ?></h3>
            <?php $author = get_the_author(); ?>
            <p>By <?php echo $author; ?></p>
        </div>
    </a>
</div>

