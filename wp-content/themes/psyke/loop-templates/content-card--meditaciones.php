<?php
/**
 * Card meditaciones
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card-meditaciones">
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
            <div class="card-header-play">
                <div class="icon">
                    <svg class="play-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 34 34" style="enable-background:new 0 0 34 34;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:none;stroke:#E26D5C;stroke-width:3.0252;stroke-miterlimit:10;}
                        .st1{fill:#E26D5C;}
                    </style>
                        <circle cx="16.6" cy="17.1" r="15"/>
                        <path d="M14.6,22.1v-9.9c0-0.7,0.8-1,1.3-0.5l5,5c0.3,0.3,0.3,0.8,0,1.1l-5,5C15.4,23.1,14.6,22.8,14.6,22.1z"/>
                    </svg>
                </div>
                <div class="title">
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <?php 
                if( get_post_meta( get_the_id(), 'descriptionMeditation', true) ) :
                    echo do_shortcode(get_post_meta(get_the_id(), 'descriptionMeditation', true)); 
                endif;
            ?>
        </div>
        <div class="card-footer">
            <strong class="meditation-time">Tiempo: <?php if( get_post_meta( get_the_id(), 'timeMeditation', true) ) :  echo get_post_meta( get_the_id(), 'timeMeditation', true);  endif; ?></strong>
        </div>
    </a>
</div>

