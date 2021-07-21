<?php
/**
 * Plugin Name: Retiros
 * Plugin URI: https://laclave.es
 * Description: Gestionar retiros
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function retiros_post_type() {

	$labels = array(
		'name'                  => _x( 'Retiros', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Retiro', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Retiros', 'text_domain' ),
		'name_admin_bar'        => __( 'Retiros', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los Retiros', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Retiros', 'text_domain' ),
		'edit_item'             => __( 'Editar Retiros', 'text_domain' ),
		'update_item'           => __( 'Actualizar Retiros', 'text_domain' ),
		'view_item'             => __( 'Ver Retiros', 'text_domain' ),
		'search_items'          => __( 'Buscar Retiros', 'text_domain' ),
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
		'label'                 => __( 'Retiros', 'text_domain' ),
		'description'           => __( 'Retiros', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
  		'rest_base'             => 'retiros',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
		// This is where we add taxonomies to our CPT
		'taxonomies'          => array( 'categoria-retiro', 'post_tag' ),
	);
	register_post_type('retiros', $args);
}
add_action( 'init', 'retiros_post_type', 0 );
// ./Crear Custom Post Type


// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'retiro_type_init', 0 );

//create a custom taxonomy name it "type" for your posts
function retiro_type_init() {

  $labels = array(
    'name' => _x( 'Categoría', 'taxonomy general name' ),
    'singular_name' => _x( 'Categoría', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar categoría de retiro' ),
    'all_items' => __( 'Todas categorías de retiros' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Editar categoría' ),
    'update_item' => __( 'Actualizar categoría' ),
    'add_new_item' => __( 'Anãdir nueva categoría' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Categorías' ),
  );

//'rewrite' => array( 'slug' => $post_slug );
  register_taxonomy('categoria-retiro',array('retiros'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => true,
    'rewrite'         => array(
		'slug'      => '/categoria-retiro',
		//'slug'      => $category_ingrediente_slug,
		'with_front'  => false,
		'hierarchical' => true
	),
    'show_in_rest' =>true,
  ));
}


// Campos personalizados
class configRetiroMetabox {
	private $screen = array(
		'retiros',
	);
	private $meta_fields = array(
		array(
			'label' => 'Título',
			'id' => 'retreatTitle',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Subtítulo',
			'id' => 'retreatSubTitle',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Precio',
			'id' => 'retreatPrice',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Precio para el retiro completo',
			'id' => 'retreatFullPriceSourse',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Modalidad del retiro (Presencial)',
			'id' => 'retreatClassroom',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Modalidad del retiro (Online)',
			'id' => 'retreatOnline',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Local de celebración',
			'id' => 'retreatPlace',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Sesiones y hora',
			'id' => 'retreatSessionsAndHour',
			'default' => '',
			'type' => 'wysiwyg',
		),
        array(
			'label' => 'Fechas',
			'id' => 'retreatDates',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Idioma principal',
			'id' => 'retreatMainLanguage',
			'type' => 'select',
			'options' => array(
				'Español',
				'Inglés',
			),
		),
		array(
			'label' => 'Idiomas',
			'id' => 'retreatLanguage',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Número de plazas',
			'id' => 'retreatSeats',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Plazas limitadas',
			'id' => 'retreatLimitedSeat',
			'default' => 'true',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Retiro impartido por:',
			'id' => 'retreatTeacher',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Texto del botón(Call to action)',
			'id' => 'retreatTextCTA',
			'default' => 'Preinscripción',
			'type' => 'text',
		),
		array(
			'label' => 'Metodo de pago',
			'id' => 'retreatPaymentMethod',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Información adicional',
			'id' => 'retreatGeneralInfo',
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
				'configRetiro',
				__( 'Información del retiro', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'configRetiro_data', 'configRetiro_nonce' );
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.configRetiro-media').click(function(e) {
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
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button configRetiro-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
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
		if ( ! isset( $_POST['configRetiro_nonce'] ) )
			return $post_id;
		$nonce = $_POST['configRetiro_nonce'];
		if ( !wp_verify_nonce( $nonce, 'configRetiro_data' ) )
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
if (class_exists('configRetiroMetabox')) {
	new configRetiroMetabox;
};
// ./ Campos personalizados

// Add custom fields on REST API wordpress
add_action( 'rest_api_init', 'create_api_posts_meta_field' );
 
function create_api_posts_meta_field() {
 
    // register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
    register_rest_field( 'retiros', 'post-meta-fields', array(
           'get_callback'    => 'get_post_meta_for_api',
           'schema'          => null,
        )
    );
}
 
function get_post_meta_for_api( $object ) {
    //get the id of the post object array
    $post_id = $object['id'];
 
    //return the post meta
    return get_post_meta( $post_id );
}


/**
 * Register all shortcodes
 *
 * @return null
 */
 function register_shortcodes_retiros() {
    add_shortcode( 'retiros_slider', 'shortcode_slider_retiros' );
}
add_action( 'init', 'register_shortcodes_retiros' );

/**
 * Retiros Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function shortcode_slider_retiros( $atts ) {
	ob_start();
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'categoria-retiro' => '',
        'numero-retiros' => '',
    ), $atts );

    $loop = new WP_Query( array(
        'posts_per_page'    => sanitize_title( $atts['numero-retiros'] ),
        'post_type'         => 'retiros',
		'order' => 'ASC',
        'tax_query'         => array( 
        	'relation' => 'AND',
        	array(
            	'taxonomy'  => 'categoria-retiro',
            	'field'     => 'slug',
            	'terms'     => array( sanitize_title( $atts['categoria-retiro'] ) )
        	)
        )
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }

	?>
	<div class="row">
		<div class="col-md-12">
			<div class="slick-retiros slick-card-courses">
				<?php
					while( $loop->have_posts() ) :
						$loop->the_post();
						?>
							<div class="card-default card-default--retreat">
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
													<?php if( get_post_meta( get_the_id(), 'retreatPaymentMethod', true) ) : ?>
														<button type="button" class="link-payment-method" data-toggle="modal" data-target="#openModalCourse<?php echo get_the_id(); ?>">
															* ver modalidad de pago
														</button>
													<?php endif; ?>
												</div>
											</div>
										<?php endif; ?>
										
										<?php if( get_post_meta( get_the_id(), 'retreatGeneralInfo', true) ) : ?>	
											<div class="info-item info-item--general">
												<?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatGeneralInfo', true)); ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="card-footer">
										<a class="btn btn-outline btn-outline--primary btn-sm" href="<?php echo esc_url( home_url( '/' ) ); ?>form-retiro?retiro=<?php echo get_the_id(); ?>">
											<?php echo get_post_meta( get_the_id(), 'retreatTextCTA', true); ?>
										</a>
									</div>
								</div>
							</div>

						<!-- modal -->
						<?php if( get_post_meta( get_the_id(), 'retreatPaymentMethod', true) ) : ?>
							<div class="modal-course--container">
								<div class="modal fade" id="openModalCourse<?php echo get_the_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="openModalCourseLabel<?php echo get_the_id(); ?>" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="openModalCourseLabel<?php echo get_the_id(); ?>">Metodo de pago</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php echo do_shortcode(get_post_meta(get_the_id(), 'retreatPaymentMethod', true)); ?>
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
