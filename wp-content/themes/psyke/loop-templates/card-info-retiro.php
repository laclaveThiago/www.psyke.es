<?php
/**
 * Card retreat
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<?php
    // Inintialize URL to the variable
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
        
    // Use parse_url() function to parse the URL 
    // and return an associative array which
    // contains its various components
    $url_components = parse_url($url);
    
    // Use parse_str() function to parse the
    // string passed via URL
    parse_str($url_components['query'], $params);

    $courseID = $params['retiro']

?>

<?php 
    $retiro = new WP_Query(
        array(
            'post_type'   => 'retiros',
            'p' => $courseID
        )
    );

    if( $retiro->have_posts() ) : 
        while( $retiro->have_posts() ) : 
            $retiro->the_post(); 
        ?>
            <div class="card-default card-default--retreat" data-retiro="<?php echo get_the_id(); ?>">
                <div class="card-inner">
                    <div class="card-header">
                        <?php if( get_post_meta( get_the_id(), 'retreatTitle', true) ) : ?>	
                            <h3><?php echo get_post_meta(get_the_id(), 'retreatTitle', true); ?></h3>
                        <?php else: ?>
                            <h3><?php the_title(); ?></h3>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatSubTitle', true) ) : ?>	
                            <div class="sub-header">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatSubTitle', true)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if( get_post_meta( get_the_id(), 'retreatDates', true) ) : ?>	
                            <div class="info-item info-item--dates">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatDates', true)); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatPlace', true) ) : ?>	
                            <div class="info-item info-item--place">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo do_shortcode(get_post_meta( get_the_id(), 'retreatPlace', true)); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatSeats', true) ) : ?>	
                            <div class="info-item info-item--seats">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <?php echo get_post_meta( get_the_id(), 'retreatSeats', true); ?>
                                    <?php if( get_post_meta( get_the_id(), 'retreatLimitedSeat', true) ) : ?>
                                        <span>Plazas Limitadas</span>	
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatLanguage', true) ) : ?>	
                            <div class="info-item info-item--language">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo get_post_meta(get_the_id(), 'retreatLanguage', true); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatTeacher', true) ) : ?>	
                            <div class="info-item info-item--teacher">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo get_post_meta(get_the_id(), 'retreatTeacher', true); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatPrice', true) ) : ?>	
                            <div class="info-item info-item--price">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <div class="price"><?php echo get_post_meta(get_the_id(), 'retreatPrice', true); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( get_post_meta( get_the_id(), 'retreatGeneralInfo', true) ) : ?>	
                            <div class="info-item info-item--general">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatGeneralInfo', true)); ?>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatPaymentMethod', true) ) : ?>
                            <div class="sr-only" id="retreatPaymentMethod" data-payment="true">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatPaymentMethod', true)); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( get_post_meta( get_the_id(), 'retreatClassroom', true) ) : ?>
                            <div class="sr-only" id="retreatClassroom" data-classroom="true"></div>
                        <?php else: ?>
                            <div class="sr-only" id="retreatClassroom" data-classroom="false"></div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'retreatOnline', true) ) : ?>
                            <div class="sr-only" id="retreatOnline" data-online="true"></div>
                        <?php else: ?>
                            <div class="sr-only" id="retreatOnline" data-online="false"></div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    endif; 
?>


