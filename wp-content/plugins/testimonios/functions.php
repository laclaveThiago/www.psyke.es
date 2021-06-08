<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/js/vendor/slick/slick.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'slick-theme-styles', get_stylesheet_directory_uri() . '/js/vendor/slick/slick-theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

    wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() . '/js/vendor/jquery.easing.min.js', array('jquery'), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'webfont', get_stylesheet_directory_uri() . '/js/vendor/webfont.js', array('jquery'), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/vendor/slick/slick.min.js', array('jquery'), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'slick-animation-js', get_stylesheet_directory_uri() . '/js/vendor/slick/slick-animation.min.js', array('jquery'), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'waypoints-js', get_stylesheet_directory_uri() . '/js/vendor/jquery.waypoints.min.js', array('jquery'), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/js/all.js', array());
    wp_enqueue_script( 'frontend', get_stylesheet_directory_uri() . '/js/frontend.js', array('jquery', 'jquery-easing', 'webfont', 'slick-js', 'slick-animation-js', 'waypoints-js', ), $the_theme->get( 'Version' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}


/*
// Optimization - defer js and styles
*/

/**
 * Improve performance by adding defer or async to script tag
 *
 * @param string $tag Script element tag
 * @param string $handle Script handle.
 * @param string $url Script URL.
 * @return string Modified script tag.
 */
function lazy_scripts( $tag, $handle, $url ) {
    /**
     * List of exceptions to ignore
     */
    static $exceptions = array(
        '/jquery.js',
        '/jsapi',
        'customize',  // WP Customizer scripts should not be deferred.
        'wp-',  // WP Customizer break if we don't eliminate this.
        'cloudflare.com',
        'google.com'
        /* Add more exceptions here. */
    );

    /**
     * Static var so that we look up site domain only once per request.
     * @static
     * @var string $domain
     */
    static $domain = false;

    /**
     * Ignore non-javascript.
     */
    if ( ! strpos( $url, '.js' ) ) {
        return $tag;
    }

    /**
     * Ignore exceptions.
     */
    foreach ( $exceptions as $exception ) {
        if ( strpos( $url, $exception ) !== false ) {
            return $tag;
        }
    }

    /**
     * Get the domain if we don't already have it.
     */
    if ( false === $domain ) {
        $domain = parse_url( get_site_url(), PHP_URL_HOST );
    }

    /**
     * Ignore script tags that already contain defer or async
     */
    if ( strpos( $tag, ' defer' ) || strpos( $tag, ' async' ) ) {
        return $tag;
    }

    /**
     * If script URL contains domain name, use defer
     */
    if ( strpos( $url, $domain ) ) {
        return str_replace( '></script>', ' defer="defer"></script>', $tag );
    }

    /**
     * If script is not in this domain, use async
     */
    return str_replace( '></script>', ' async="async"></script>', $tag );
}

add_filter( 'script_loader_tag', 'lazy_scripts', PHP_INT_MAX, 3 );

function add_rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

     $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );
/*
// END
*/

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_action( 'after_setup_theme', 'register_menu_copyrights' );
function register_menu_copyrights() {
    register_nav_menu( 'menu_copyrights', __( 'Copyright Menu', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_about' );
function register_menu_footer_about() {
    register_nav_menu( 'menu_footer_about', __( 'Footer - About us', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_programs' );
function register_menu_footer_programs() {
    register_nav_menu( 'menu_footer_programs', __( 'Footer - Programs & Workshops', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_facilitators' );
function register_menu_footer_facilitators() {
    register_nav_menu( 'menu_footer_facilitators', __( 'Footer - Facilitators', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_resources' );
function register_menu_footer_resources() {
    register_nav_menu( 'menu_footer_resources', __( 'Footer - Resources', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_contact' );
function register_menu_footer_contact() {
    register_nav_menu( 'menu_footer_contact', __( 'Footer - Contact', 'understrap-child' ) );
}

add_action( 'after_setup_theme', 'register_menu_footer_social' );
function register_menu_footer_social() {
    register_nav_menu( 'menu_footer_social', __( 'Footer - Social Media', 'understrap-child' ) );
}


add_image_size( 'wideFull', 1640, 710, true);
add_image_size( 'wideThumbnail', 720, 314, true);
add_image_size( 'programThumbnail', 630, 335, true);

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

//
// Begin Woocommerce customization
//

/**
 * Display the custom text field
 * @since 1.0.0
 */
function price_text_create_custom_field() {
    $args = array(
        'id' => 'custom_text_field_price',
        'label' => __( 'Text after price', 'understrap-child' ),
        'class' => 'after-price-custom-field',
        'desc_tip' => true,
        'description' => __( 'Text showed after price. Eg. Regular, Almost early bird.', 'understrap-child' ),
    );
    woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'price_text_create_custom_field' );

/**
 * Save the custom field
 * @since 1.0.0
 */
function price_text_save_custom_field( $post_id ) {
 $product = wc_get_product( $post_id );
 $after_price = isset( $_POST['custom_text_field_price'] ) ? $_POST['custom_text_field_price'] : '';
 $product->update_meta_data( 'custom_text_field_price', sanitize_text_field( $after_price ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'price_text_save_custom_field' );

/**
 * Display custom field on the front end
 * @since 1.0.0
 */
function price_text_display_custom_field() {
 global $post;
 // Check for the custom field value
 $product = wc_get_product( $post->ID );
 $after_price = $product->get_meta( 'custom_text_field_price' );
 if( $after_price ) {
 // Only display our field if we've got a value for the field title
 printf(
 '<div class="cfwc-custom-field-wrapper"><label for="cfwc-title-field">%s</label></div>',
 esc_html( $after_price )
 );
 }
}
add_action( 'woocommerce_before_add_to_cart_button', 'price_text_display_custom_field' );

//
// End Woocommerce customization
//
