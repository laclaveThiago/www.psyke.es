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
            <strong class="meditation-time"><span class="icon-clock icon-awesome"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-clock fa-w-16"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path></svg></span> <?php if( get_post_meta( get_the_id(), 'timeMeditation', true) ) :  echo get_post_meta( get_the_id(), 'timeMeditation', true);  endif; ?></strong>
        </div>
    </a>
</div>

