<?php
/**
 * Plugin Name: Courses
 * Plugin URI: https://generatewp.com/post-type/
 * Description: Courses - The School of We.
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}

// Crear Custom Post Type
function courses_temp_post_type() {

	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Courses', 'text_domain' ),
		'name_admin_bar'        => __( 'Course', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All course', 'text_domain' ),
		'add_new_item'          => __( 'Add course', 'text_domain' ),
		'add_new'               => __( 'Add new', 'text_domain' ),
		'new_item'              => __( 'New course', 'text_domain' ),
		'edit_item'             => __( 'Edit course', 'text_domain' ),
		'update_item'           => __( 'Update course', 'text_domain' ),
		'view_item'             => __( 'See course', 'text_domain' ),
		'search_items'          => __( 'Search course', 'text_domain' ),
		'not_found'             => __( 'Not founded', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not founded in the trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set feature image', 'text_domain' ),
		'remove_featured_image' => __( 'Delete feature image', 'text_domain' ),
		'use_featured_image'    => __( 'Set feature image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Course', 'text_domain' ),
		'description'           => __( 'Courses', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
  	'rest_base'             => 'courses',
  	'rest_controller_class' => 'WP_REST_Posts_Controller',
		'rewrite' => array(
            'slug' => 'courses',
            'with_front' => false,
            'hierarchical' => true,
            ),
		// This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'courses_course_type', 'post_tag' ),
	);
	register_post_type( 'courses', $args );
}
add_action( 'init', 'courses_temp_post_type', 0 );
// ./Crear Custom Post Type

// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'courses_course_init', 0 );

//create a custom taxonomy name it "type" for your posts
function courses_course_init() {

  $labels = array(
    'name' => _x( 'courses_course_type', 'taxonomy general name' ),
    'singular_name' => _x( 'Course type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search course type' ),
    'all_items' => __( 'All course types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ),
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Course type' ),
  );

  register_taxonomy('courses_course_type',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'course-type-tmp' ),
    'show_in_rest' =>true,
  ));
}


// Campos personalizados

class configTrainerMetabox {
	private $screen = array(
		'courses',
	);
	private $meta_fields = array(
		array(
			'label' => 'Course title',
			'id' => 'titleCourseTxt',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Open to register?',
			'id' => 'isOpenCourse',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Category Tag',
			'id' => 'categoryTag',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Course visibility',
			'id' => 'visibilityCourseTxt',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Price',
			'id' => 'priceCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Location',
			'id' => 'locationCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Partner',
			'id' => 'partnerCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Dates',
			'id' => 'datesCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Hours',
			'id' => 'hourCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Facilitators',
			'id' => 'facilitatorsCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Language',
			'id' => 'languageCourse',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Form Hubspot(ID)',
			'id' => 'formIDHubspotSuscribe',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Action course',
			'id' => 'actionCourse',
			'default' => '',
			'type' => 'wysiwyg',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'configTrainer',
				__( 'Datos del curso', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'configTrainer_data', 'configTrainer_nonce' );
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.configTrainer-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'media':
					$input = sprintf(
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button configTrainer-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value,
						$meta_field['id'],
						$meta_field['id']
					);
					break;
				case 'checkbox':
					$input = sprintf(
						'<input %s id=" % s" name="% s" type="checkbox" value="1">',
						$meta_value === '1' ? 'checked' : '',
						$meta_field['id'],
						$meta_field['id']
						);
					break;
				case 'wysiwyg':
					ob_start();
					wp_editor($meta_value, $meta_field['id']);
					$input = ob_get_contents();
					ob_end_clean();
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $meta_field['options'] as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value === $field_value ? 'selected' : '',
							$field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['configTrainer_nonce'] ) )
			return $post_id;
		$nonce = $_POST['configTrainer_nonce'];
		if ( !wp_verify_nonce( $nonce, 'configTrainer_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('configTrainerMetabox')) {
	new configTrainerMetabox;
};
// ./ Campos personalizados

add_image_size( 'courseUltraWideThumbnail', 620, 200, true);


/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode( 'products_tmp', 'shortcode_mostra_produtos' );
}
add_action( 'init', 'register_shortcodes' );

/**
 * Produtos Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function shortcode_mostra_produtos( $atts ) {
	ob_start();
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'category-course' => '',
        'category-type' => '',
    ), $atts );

    $loop = new WP_Query( array(
        'posts_per_page'    => 32,
        'post_type'         => 'courses',
        'order'             => 'DESC',
        'tax_query'         => array( 
        	'relation' => 'AND',
        	array(
            	'taxonomy'  => 'courses_course_type',
            	'field'     => 'slug',
            	'terms'     => array( sanitize_title( $atts['category-type'] ) )
        	),
        	array(
            	'taxonomy'  => 'courses_course_type',
            	'field'     => 'slug',
            	'terms'     => array( sanitize_title( $atts['category-course'] ) )
        	)
        )
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }

    $pointerGrid = 1; 
    while( $loop->have_posts() ) {
        $loop->the_post();
        ?>

        <?php if ($pointerGrid == 1) : ?>
			<div class="grid-courses">
				<style>
		        	.card-info--item {
		        		display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
						display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
						display: -ms-flexbox;      /* TWEENER - IE 10 */
						display: -webkit-flex;     /* NEW - Chrome */
						display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
		        		flex-wrap: nowrap;
		        	}
		        	.card-info--item__icon {
		        		width: 30px;
		        		flex: 0 0 30px;
		        	}
		        	.card-info--item+.card-info--item {
		        		margin-top: 6px;
		        	}
		        </style>
        <?php endif; ?>
        <?php if ($pointerGrid == 5) : ?>
        	</div>
        	<p class="text-right"><a href="javascript:void(0);" class="btn btn-link triggerAllCourses">See more <i class="fas fa-chevron-down"></i></a></p>
			<div class="grid-courses" id="allCourses" style="display: none;">
        <?php endif; ?>
		<?php 
			if(get_post_meta( get_the_id(), 'visibilityCourseTxt', true)) : 
				$availabilityCourse = get_post_meta( get_the_id(), 'visibilityCourseTxt', true);
				if ($availabilityCourse == "Public" || $availabilityCourse == "Publico" || $availabilityCourse == "Público") :
					$availabilityCourseColor = "public";
				else : 
					$availabilityCourseColor = "private";
				endif; 
			endif; 
		?>
        <div class="grid-courses--card <?php if(!get_post_meta( get_the_id(), 'isOpenCourse', true)) : ?> course-not-avaliable <?php endif; echo $availabilityCourseColor;?> ">
        	
		 	<div class="card-image">
		 		<?php 
				if (has_post_thumbnail()) :
					//$imageHeaderBackground = get_the_post_thumbnail_url( get_the_id() ,'courseUltraWideThumbnail');
					//$imageHeaderBackground = wp_get_attachment_url(get_the_id(), 'courseUltraWideThumbnail' );
					the_post_thumbnail('courseUltraWideThumbnail', array('class' => 'img-fluid'));
				else:
					$imageHeaderBackground = get_stylesheet_directory_uri() . '/img/assets/course-generic-place.jpg';
					echo '<img src="'.$imageHeaderBackground.'" alt="'.the_title().'" class="img-fluid">';
			 	endif;
		 		?>
	 		</div>
        	<div class="card-header">
        		
        		<?php if(get_post_meta( get_the_id(), 'categoryTag', true)) : ?>
        			<ul class="list-categories--courses">
						<li><span class="course-category"><?php echo get_post_meta( get_the_id(), 'categoryTag', true); ?></span></li>
					</ul>
		 		<?php endif; ?>

        		<h3>
        			<?php 
        				if(get_post_meta( get_the_id(), 'visibilityCourseTxt', true)) :
        					echo get_post_meta( get_the_id(), 'titleCourseTxt', true);
    					else:
    						the_title();
    					endif;
					?>
        			</h3>
        	</div>
        	<div class="card-info">
        		<?php if(get_post_meta( get_the_id(), 'visibilityCourseTxt', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="fas fa-user-friends"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'visibilityCourseTxt', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'priceCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="far fa-credit-card"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'priceCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'locationCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="fas fa-city"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'locationCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'partnerCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="fas fa-hands-helping"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'partnerCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'datesCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="far fa-calendar-alt"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'datesCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'hourCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="far fa-clock"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'hourCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'facilitatorsCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="fas fa-users"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'facilitatorsCourse', true); ?></div></div>
		 		<?php endif; ?>
		 		<?php if(get_post_meta( get_the_id(), 'languageCourse', true)) : ?>
					<div class="card-info--item"><div class="card-info--item__icon"><i class="fas fa-comment"></i></div> <div class="card-info--item__text"><?php echo get_post_meta( get_the_id(), 'languageCourse', true); ?></div></div>
		 		<?php endif; ?>
        	</div>
        	<div class="card-footer">
        		<?php if(get_post_meta( get_the_id(), 'formIDHubspotSuscribe', true)) : ?>
        			<a href="#formIDHubspotSuscribe" data-toggle="modal" data-target="#formIDHubspotSuscribe"><?php echo do_shortcode(get_post_meta(get_the_id(), 'actionCourse', true)); ?></a>
    			<?php else: ?>
    				<?php echo do_shortcode(get_post_meta(get_the_id(), 'actionCourse', true)); ?>
    			<?php endif; ?>
        	</div>
        	<?php if(get_post_meta( get_the_id(), 'formIDHubspotSuscribe', true)) : ?>
	        	<!-- Modal -->
				<div class="modal fade" id="formIDHubspotSuscribe" tabindex="-1" role="dialog" aria-labelledby="formIDHubspotSuscribeTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formIDHubspotSuscribeTitle"><?php the_title(); ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								</div>
							<div class="modal-body">
								<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
								<script>
								  hbspt.forms.create({
									portalId: "7023589",
									formId: <?php echo '"'.get_post_meta( get_the_id(), 'formIDHubspotSuscribe', true).'"';?>
								});
								</script>
							</div>
						</div>
					</div>
				</div>
				<!-- ./ Modal -->
			<?php endif; ?>
        </div>

        <?php
        	$pointerGrid = $pointerGrid+1;
    }
    echo '</div>';
    wp_reset_postdata();
    $myvariable = ob_get_clean();
    return $myvariable;
}


