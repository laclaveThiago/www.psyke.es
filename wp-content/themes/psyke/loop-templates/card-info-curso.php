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

    $courseID = $params['curso']

?>

<?php 
    $curso = new WP_Query(
        array(
            'post_type'   => 'cursos',
            'p' => $courseID
        )
    );

    if( $curso->have_posts() ) : 
        while( $curso->have_posts() ) : 
            $curso->the_post(); 
        ?>
            <div class="card-default card-default--course" data-course="<?php echo get_the_id(); ?>">
                <div class="card-inner">
                    <div class="card-header">
                        <?php if( get_post_meta( get_the_id(), 'courseTitle', true) ) : ?>	
                            <h3><?php echo get_post_meta(get_the_id(), 'courseTitle', true); ?></h3>
                        <?php else: ?>
                            <h3><?php the_title(); ?></h3>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'courseSubTitle', true) ) : ?>	
                            <div class="sub-header">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'courseSubTitle', true)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">

                        <?php if( get_post_meta( get_the_id(), 'courseSessionsAndHour', true) ) : ?>	
                            <div class="info-item info-item--dates">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <?php echo do_shortcode(get_post_meta(get_the_id(), 'courseSessionsAndHour', true)); ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="info-item info-item--classroom">
                            <div class="info-item--icon"></div>
                            <div class="info-item--body">
                                <?php
                                    if( get_post_meta( get_the_id(), 'courseOnline', true) ) :
                                        if( get_post_meta( get_the_id(), 'courseClassroom', true) ) :
                                            echo 'Online o Presencial';
                                        else:
                                            echo 'Online';
                                        endif;
                                    else:
                                        if( get_post_meta( get_the_id(), 'courseClassroom', true) ):
                                            echo 'Presencial';
                                        endif;
                                    endif;
                                ?>
                            </div>
                        </div>

                    
                        <?php if( get_post_meta( get_the_id(), 'coursePlace', true) ) : ?>	
                            <div class="info-item info-item--place sr-only">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo do_shortcode(get_post_meta( get_the_id(), 'coursePlace', true)); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'courseSeats', true) ) : ?>	
                            <div class="info-item info-item--seats sr-only">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <?php echo get_post_meta( get_the_id(), 'courseSeats', true); ?>
                                    <?php if( get_post_meta( get_the_id(), 'courseLimitedSeat', true) ) : ?>
                                        <span>Plazas Limitadas</span>	
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'courseLanguage', true) ) : ?>	
                            <div class="info-item info-item--language">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo get_post_meta(get_the_id(), 'courseLanguage', true); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'courseTeacher', true) ) : ?>	
                            <div class="info-item info-item--teacher sr-only">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body"><?php echo get_post_meta(get_the_id(), 'courseTeacher', true); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'coursePrice', true) ) : ?>	
                            <div class="info-item info-item--price">
                                <div class="info-item--icon"></div>
                                <div class="info-item--body">
                                    <div class="price"><?php echo get_post_meta(get_the_id(), 'coursePrice', true); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( get_post_meta( get_the_id(), 'courseDates', true) ) : ?>	
                            <div class="info-item info-item--course-dates">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'courseDates', true)); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( get_post_meta( get_the_id(), 'courseGeneralInfo', true) ) : ?>	
                            <div class="info-item info-item--general">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'courseGeneralInfo', true)); ?>
                            </div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'coursePaymentMethod', true) ) : ?>
                            <div class="sr-only" id="coursePaymentMethod" data-payment="true">
                                <?php echo do_shortcode(get_post_meta(get_the_id(), 'coursePaymentMethod', true)); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( get_post_meta( get_the_id(), 'courseClassroom', true) ) : ?>
                            <div class="sr-only" id="courseClassroom" data-classroom="true"></div>
                        <?php else: ?>
                            <div class="sr-only" id="courseClassroom" data-classroom="false"></div>
                        <?php endif; ?>
                        <?php if( get_post_meta( get_the_id(), 'courseOnline', true) ) : ?>
                            <div class="sr-only" id="courseOnline" data-online="true"></div>
                        <?php else: ?>
                            <div class="sr-only" id="courseOnline" data-online="false"></div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    endif; 
?>


