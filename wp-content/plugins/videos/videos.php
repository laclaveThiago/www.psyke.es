<?php
/**
 * Plugin Name: Vídeos
 * Plugin URI: https://laclave.es
 * Description: Gestionar vídeos
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function videos_post_type() {

	$labels = array(
		'name'                  => _x( 'Vídeos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Vídeo', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Vídeos', 'text_domain' ),
		'name_admin_bar'        => __( 'Vídeos', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todas los Vídeos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Vídeo', 'text_domain' ),
		'edit_item'             => __( 'Editar Vídeo', 'text_domain' ),
		'update_item'           => __( 'Actualizar Vídeo', 'text_domain' ),
		'view_item'             => __( 'Ver Vídeo', 'text_domain' ),
		'search_items'          => __( 'Buscar Vídeo', 'text_domain' ),
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
		'label'                 => __( 'Vídeos', 'text_domain' ),
		'description'           => __( 'Vídeos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-controls-volumeon',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
  		'rest_base'             => 'videos',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
	);
	register_post_type('videos', $args);
}
add_action( 'init', 'videos_post_type', 0 );
// ./Crear Custom Post Type


// Campos personalizados

class configVideoMetabox {
	private $screen = array(
		'videos',
	);
	private $meta_fields = array(
		array(
			'label' => 'Tiempo (Duración)',
			'id' => 'timeVideo',
			'default' => '',
			'type' => 'text',
		),
		array(
			'label' => 'Descripción corta',
			'id' => 'descriptionVideo',
			'default' => '',
			'type' => 'wysiwyg',
		),
		array(
            'label' => 'Video',
            'id' => 'fileVideo',
            'type' => 'media',
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
				'configVideo',
				__( 'Información del audio', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'configVideo_data', 'configVideo_nonce' );
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.configVideo-media').click(function(e) {
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
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button configVideo-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
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
		if ( ! isset( $_POST['configVideo_nonce'] ) )
			return $post_id;
		$nonce = $_POST['configVideo_nonce'];
		if ( !wp_verify_nonce( $nonce, 'configVideo_data' ) )
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
if (class_exists('configVideoMetabox')) {
	new configVideoMetabox;
};
// ./ Campos personalizados

//Plantilla single

function get_custom_videos_template($single_template) {
     global $post;

     if ($post->post_type == 'videos') {
          $single_template = dirname( __FILE__ ) . '/templates/single-videos.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_videos_template' );


/*
//Plantilla Archive
*/
function get_custom_videos_archive_template($archive_template) {
     global $post;

     if ($post->post_type == 'videos') {
          $archive_template = dirname( __FILE__ ) . '/templates/archive-videos.php';
     }
     return $archive_template;
}
add_filter( 'archive_template', 'get_custom_videos_archive_template' );


