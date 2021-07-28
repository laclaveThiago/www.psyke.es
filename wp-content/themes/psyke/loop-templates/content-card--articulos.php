<?php
/**
 * Card meditaciones
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card-articulos">
    <a href="<?php the_permalink(); ?>" class="card-post--inner">
        <div class="card-image">
            <?php 
                if (has_post_thumbnail()) :
            ?>
                <div class="card-image--inner">
                    <?php 
                        the_post_thumbnail( 'thumbnailMaterial', array( 'class' => 'img-fluid img-rounded' ) ); 
                    ?>
                </div>
            <?php 
                endif;
            ?>
        </div>
        <div class="card-header">
            <h3><?php the_title(); ?></h3>
            
        </div>
        <div class="card-body">
            <?php 
                if( get_post_meta( get_the_id(), 'descriptionAudio', true) ) :
                    echo do_shortcode(get_post_meta(get_the_id(), 'descriptionAudio', true)); 
                endif;
            ?>
        </div>
    </a>
</div>

