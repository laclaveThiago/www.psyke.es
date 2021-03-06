<?php
/**
 * Plugin Name: Testimonios
 * Plugin URI: https://laclave.es
 * Description: Gestionar testimonios
 * Author: laclave
 * Author URI: https://laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}


// Crear Custom Post Type
function testimonios_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonios', 'text_domain' ),
		'name_admin_bar'        => __( 'testimonios', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los testimonios', 'text_domain' ),
		'add_new_item'          => __( 'Anãdir nuevo', 'text_domain' ),
		'add_new'               => __( 'Anãdir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Testimonio', 'text_domain' ),
		'edit_item'             => __( 'Editar Testimonio', 'text_domain' ),
		'update_item'           => __( 'Actualizar Testimonio', 'text_domain' ),
		'view_item'             => __( 'Ver Testimonio', 'text_domain' ),
		'search_items'          => __( 'Buscar Testimonio', 'text_domain' ),
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
		'label'                 => __( 'testimonios', 'text_domain' ),
		'description'           => __( 'testimonios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
  		'rest_base'             => 'testimonios',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'rewrite' => true,
		// This is where we add taxonomies to our CPT
		'taxonomies'          => array( 'categorias-testimonios', 'post_tag' ),
	);
	register_post_type('testimonios', $args);
}
add_action( 'init', 'testimonios_post_type', 0 );
// ./Crear Custom Post Type

// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'testimonios_category_init', 0 );

//create a custom taxonomy name it "type" for your posts
function testimonios_category_init() {

  $labels = array(
    'name' => _x( 'Categoría', 'taxonomy general name' ),
    'singular_name' => _x( 'Categoría', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search category' ),
    'all_items' => __( 'Todas categorías' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Editar categoría' ),
    'update_item' => __( 'Actualizar categoría' ),
    'add_new_item' => __( 'Añadir nueva' ),
    'new_item_name' => __( 'Nombre de la categoría' ),
    'menu_name' => __( 'Categoría' ),
  );

  register_taxonomy('categorias-testimonios',array('testimonios'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'testimonios-categoria' ),
    'show_in_rest' =>true,
  ));
}



/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode( 'testimonios_slider', 'shortcode_slider_testimonials' );
}
add_action( 'init', 'register_shortcodes' );

/**
 * Produtos Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function shortcode_slider_testimonials( $atts ) {
	ob_start();
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'categoria-testimonios' => '',
        'numero-testimonios' => '',
    ), $atts );

    $loop = new WP_Query( array(
        'posts_per_page'    => sanitize_title( $atts['numero-testimonios'] ),
        'post_type'         => 'testimonios',
        'order'             => 'RAND',
        'tax_query'         => array( 
        	'relation' => 'AND',
        	array(
            	'taxonomy'  => 'categorias-testimonios',
            	'field'     => 'slug',
            	'terms'     => array( sanitize_title( $atts['categoria-testimonios'] ) )
        	)
        )
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }

	?>
	<div class="padding-large wrapper-slider-testimonials">
		<div class="slider-testimonials--inner">
			<div class="container"><div class="row"><div class="col-md-12">
				<div class="slick-testimonials">
					<?php
					while( $loop->have_posts() ) :
						$loop->the_post();
						?>
						<div class="testimonials-item">
							<div class="testimonials-content">
								<?php the_content(); ?>
							</div>
							<div class="testimonials-author">
								<?php the_title(); ?>
							</div>
						</div>

						<?php
							$pointerGrid = $pointerGrid+1;
					endwhile; // end while
					?>
				</div>
			</div></div></div>
		</div>
	</div>
	<?php
    wp_reset_postdata();
    $sliderTestimonials = ob_get_clean();
    return $sliderTestimonials;
}
