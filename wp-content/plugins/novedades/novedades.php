<?php
/**
 * Plugin Name: Novedades
 * Plugin URI: https://laclave.es
 * Description: Gestionar novedades
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function novedades_post_type() {

	$labels = array(
		'name'                  => _x( 'Novedades', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Novedad', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Novedades', 'text_domain' ),
		'name_admin_bar'        => __( 'Novedades', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todas las Novedades', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nueva', 'text_domain' ),
		'add_new'               => __( 'Añadir nueva', 'text_domain' ),
		'new_item'              => __( 'Nueva Novedad', 'text_domain' ),
		'edit_item'             => __( 'Editar Novedad', 'text_domain' ),
		'update_item'           => __( 'Actualizar Novedad', 'text_domain' ),
		'view_item'             => __( 'Ver Novedad', 'text_domain' ),
		'search_items'          => __( 'Buscar Novedad', 'text_domain' ),
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
		'label'                 => __( 'Novedades', 'text_domain' ),
		'description'           => __( 'Novedades', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
  		'rest_base'             => 'novedades',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
	);
	register_post_type('novedades', $args);
}
add_action( 'init', 'novedades_post_type', 0 );
// ./Crear Custom Post Type