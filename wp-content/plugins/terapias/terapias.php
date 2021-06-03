<?php
/**
 * Plugin Name: Terapias
 * Plugin URI: https://laclave.es
 * Description: Gestionar terapias
 * Author: laclave
 * Author URI: https://laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function terapias_post_type() {

	$labels = array(
		'name'                  => _x( 'Terapias', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Terapia', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Terapias', 'text_domain' ),
		'name_admin_bar'        => __( 'terapias', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todas terapias', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nueva', 'text_domain' ),
		'add_new'               => __( 'Añadir nueva', 'text_domain' ),
		'new_item'              => __( 'Nueva Terapia', 'text_domain' ),
		'edit_item'             => __( 'Editar Terapia', 'text_domain' ),
		'update_item'           => __( 'Actualizar Terapia', 'text_domain' ),
		'view_item'             => __( 'Ver Terapia', 'text_domain' ),
		'search_items'          => __( 'Buscar Terapia', 'text_domain' ),
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
		'label'                 => __( 'terapias', 'text_domain' ),
		'description'           => __( 'terapias', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-smiley',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
  		'rest_base'             => 'terapias',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
	);
	register_post_type('terapias', $args);
}
add_action( 'init', 'terapias_post_type', 0 );
// ./Crear Custom Post Type
