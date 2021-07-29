<?php
/**
 * Plugin Name: Cursos
 * Plugin URI: https://laclave.es
 * Description: Gestionar cursos
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function cursos_post_type() {

	$labels = array(
		'name'                  => _x( 'Cursos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Curso', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cursos', 'text_domain' ),
		'name_admin_bar'        => __( 'Cursos', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los cursos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Curso', 'text_domain' ),
		'edit_item'             => __( 'Editar Curso', 'text_domain' ),
		'update_item'           => __( 'Actualizar Curso', 'text_domain' ),
		'view_item'             => __( 'Ver Curso', 'text_domain' ),
		'search_items'          => __( 'Buscar Curso', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in the trash', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar la imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Use this image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Cursos', 'text_domain' ),
		'description'           => __( 'Cursos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
  		'rest_base'             => 'cursos',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
		// This is where we add taxonomies to our CPT
		'taxonomies'          => array( 'categorias', 'post_tag' ),
	);
	register_post_type('cursos', $args);
}
add_action( 'init', 'cursos_post_type', 0 );
// ./Crear Custom Post Type


// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'categoria_type_init', 0 );

//create a custom taxonomy name it "type" for your posts
function categoria_type_init() {

  $labels = array(
    'name' => _x( 'Categoría del curso', 'taxonomy general name' ),
    'singular_name' => _x( 'Categoría del curso', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar categoría del curso' ),
    'all_items' => __( 'Todas categorías del curso' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Editar categoría' ),
    'update_item' => __( 'Actualizar categoría' ),
    'add_new_item' => __( 'Anãdir nueva categoría' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Categorías' ),
  );

//'rewrite' => array( 'slug' => $post_slug );
  register_taxonomy('categorias',array('cursos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => true,
    'rewrite'         => array(
		'slug'      => '/categoria-curso',
		//'slug'      => $category_ingrediente_slug,
		'with_front'  => false,
		'hierarchical' => true
	),
    'show_in_rest' =>true,
  ));
}


// Campos personalizados

class configCursoMetabox {
	private $screen = array(
		'cursos',
	);
	private $meta_fields = array(
		array(
			'label' => 'Título',
			'id' => 'courseTitle',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Subtítulo',
			'id' => 'courseSubTitle',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Precio',
			'id' => 'coursePrice',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Precio para el curso completo',
			'id' => 'courseFullPriceSourse',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Modalidad del curso (Presencial)',
			'id' => 'courseClassroom',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Modalidad del curso (Online)',
			'id' => 'courseOnline',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Sesiones y hora',
			'id' => 'courseSessionsAndHour',
			'default' => '',
			'type' => 'wysiwyg',
		),
        array(
			'label' => 'Fechas',
			'id' => 'courseDates',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Idioma principal',
			'id' => 'courseMainLanguage',
			'type' => 'select',
			'options' => array(
				'Español',
				'Inglés',
			),
		),
		array(
			'label' => 'Idiomas',
			'id' => 'courseLanguage',
			'default' => 'Español, Inglés',
			'type' => 'text',
		),
		array(
			'label' => 'Número de plazas',
			'id' => 'courseSeats',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Plazas limitadas',
			'id' => 'courseLimitedSeat',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Curso impartido por:',
			'id' => 'courseTeacher',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Texto del botón(Call to action)',
			'id' => 'courseTextCTA',
			'default' => 'Preinscripción',
			'type' => 'text',
		),
		array(
			'label' => 'Metodo de pago',
			'id' => 'coursePaymentMethod',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Información adicional',
			'id' => 'courseGeneralInfo',
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
				__( 'Información del curso', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'configTreatment_data', 'configTreatment_nonce' );
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
		if ( ! isset( $_POST['configTreatment_nonce'] ) )
			return $post_id;
		$nonce = $_POST['configTreatment_nonce'];
		if ( !wp_verify_nonce( $nonce, 'configTreatment_data' ) )
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
if (class_exists('configCursoMetabox')) {
	new configCursoMetabox;
};
// ./ Campos personalizados



/**
 * Register all shortcodes
 *
 * @return null
 */
 function register_shortcodes_cursos() {
    add_shortcode( 'cursos_slider', 'shortcode_slider_cursos' );
}
add_action( 'init', 'register_shortcodes_cursos' );

/**
 * Cursos Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function shortcode_slider_cursos( $atts ) {
	ob_start();
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'categoria-curso' => '',
        'numero-cursos' => '',
    ), $atts );

    $loop = new WP_Query( array(
        'posts_per_page'    => sanitize_title( $atts['numero-cursos'] ),
        'post_type'         => 'cursos',
        'tax_query'         => array( 
        	'relation' => 'AND',
        	array(
            	'taxonomy'  => 'categorias',
            	'field'     => 'slug',
            	'terms'     => array( sanitize_title( $atts['categoria-curso'] ) )
        	)
        )
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }

	?>
	<div class="row">
		<div class="col-md-12">
			<div class="slick-cursos slick-card-courses">
				<?php
					while( $loop->have_posts() ) :
						$loop->the_post();
						?>
							<div class="card-default card-default--course">
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
															echo 'Online · Presencial';
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

										<?php if( get_post_meta( get_the_id(), 'courseLanguage', true) ) : ?>	
											<div class="info-item info-item--language">
												<div class="info-item--icon"></div>
												<div class="info-item--body"><?php echo get_post_meta(get_the_id(), 'courseLanguage', true); ?></div>
											</div>
										<?php endif; ?>
										
										<?php if( get_post_meta( get_the_id(), 'coursePrice', true) ) : ?>	
											<div class="info-item info-item--price">
												<div class="info-item--icon"></div>
												<div class="info-item--body">
													<div class="price"><?php echo get_post_meta(get_the_id(), 'coursePrice', true); ?></div>
													<?php if( get_post_meta( get_the_id(), 'coursePaymentMethod', true) ) : ?>
														<button type="button" class="link-payment-method" data-toggle="modal" data-target="#openModalCourse<?php echo get_the_id(); ?>">
															* ver modalidad de pago
														</button>
													<?php endif; ?>
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
									</div>
									<div class="card-footer">
										<a class="btn btn-outline btn-outline--primary btn-sm" href="<?php echo esc_url( home_url( '/' ) ); ?>form-curso?curso=<?php echo get_the_id(); ?>">
											<?php echo get_post_meta( get_the_id(), 'courseTextCTA', true); ?>
										</a>
									</div>
								</div>
							</div>

						<!-- modal -->
						<?php if( get_post_meta( get_the_id(), 'coursePaymentMethod', true) ) : ?>
							<div class="modal-course--container">
								<div class="modal fade" id="openModalCourse<?php echo get_the_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="openModalCourseLabel<?php echo get_the_id(); ?>" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="openModalCourseLabel<?php echo get_the_id(); ?>">Modalidad de pago</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php echo do_shortcode(get_post_meta(get_the_id(), 'coursePaymentMethod', true)); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<!-- .modal -->
						
						<?php
							
					endwhile; // end while
				?>
			</div><!-- slick-retiros -->
		</div><!-- .col-md-12 --> 
	</div><!-- .row -->
	<?php
    wp_reset_postdata();
    $sliderRetreat = ob_get_clean();
    return $sliderRetreat;
}
