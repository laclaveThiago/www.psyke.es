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
            <?php 
                if (has_post_thumbnail()) :
            ?>
                <div class="card-image--inner">
                    <?php 
                        //the_post_thumbnail( 'thumbnailQuad', array( 'class' => 'img-fluid img-rounded' ) ); 
                        $featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'thumbnailQuad'); 
                    ?>
                    <canvas class="" width="620" height="620" style="background-image: url('<?php echo $featured_img_url; ?>');"></canvas>
                </div>
            <?php 
                endif;
            ?>
        </div>
        <div class="card-header">
            <h3><?php the_title(); ?></h3>
            <?php $author = get_the_author(); ?>
            <p>By <?php echo $author; ?></p>
        </div>
        <div class="card-footer">
            <strong class="btn-link btn-fk">Leer más<?php //_e( 'Read more', 'understrap' ); ?></strong>
        </div>
    </a>
</div>
