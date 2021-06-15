<?php
/**
 * Plugin Name: Materiales
 * Plugin URI: https://laclave.es
 * Description: Gestionar materiales
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function materiales_post_type() {

	$labels = array(
		'name'                  => _x( 'Materiales', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Material', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Materiales', 'text_domain' ),
		'name_admin_bar'        => __( 'Materiales', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los materiales', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Material', 'text_domain' ),
		'edit_item'             => __( 'Editar Material', 'text_domain' ),
		'update_item'           => __( 'Actualizar Material', 'text_domain' ),
		'view_item'             => __( 'Ver Material', 'text_domain' ),
		'search_items'          => __( 'Buscar Material', 'text_domain' ),
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
		'label'                 => __( 'Materiales', 'text_domain' ),
		'description'           => __( 'Materiales', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'post-formats' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cover-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
  		'rest_base'             => 'materiales',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
	);
	register_post_type('materiales', $args);
}
add_action( 'init', 'materiales_post_type', 0 );
// ./Crear Custom Post Type


// Campos personalizados

class configMaterialMetabox {
	private $screen = array(
		'materiales',
	);
	private $meta_fields = array(
		array(
			'label' => 'Número del material',
			'id' => 'numberMaterial',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Tiempo (Duración)',
			'id' => 'timeMaterial',
			'default' => '',
			'type' => 'text',
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
				__( 'Información del tratamiento', 'textdomain' ),
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
if (class_exists('configMaterialMetabox')) {
	new configMaterialMetabox;
};
// ./ Campos personalizados

//Plantilla single
function get_custom_material_template($single_template) {
     global $post;

     if ($post->post_type == 'materiales') {
          $single_template = dirname( __FILE__ ) . '/templates/single-materiales.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_material_template' );

add_theme_support( 'post-formats', 
	array( 
		'aside', 
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) 
);
//add_post_type_support( 'post', 'post-formats' );
//add_post_type_support( 'materiales', 'post-formats' );

add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
     add_theme_support( 'post-formats', 
     	array( 
		'aside', 
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) );

 	add_post_type_support( 'materiales', 'post-formats' );
}


/*
//Plantilla Archive
*/
function get_custom_material_archive_template($archive_template) {
     global $post;

     if ($post->post_type == 'materiales') {
          $archive_template = dirname( __FILE__ ) . '/templates/archive-materiales.php';
     }
     return $archive_template;
}
add_filter( 'archive_template', 'get_custom_material_archive_template' );

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        }    
    return $title;    
});


