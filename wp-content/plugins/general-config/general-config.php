<?php
/**
 * Plugin Name: General Config
 * Plugin URI: https://laclave.es
 * Description: Configuraciones generales de la web
 * Author: laclave
 * Author URI: https://laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // error when open direct link on browser
}

add_action('admin_init', 'custom_fields_general_section');  
function custom_fields_general_section() {  
    add_settings_section(  
        'social_media_settings_section', // Section ID 
        'Redes sociales', // Section Title
        'social_media_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'facebook_url', // Option ID
        'Facebook URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'social_media_settings_section', // Name of our section
        array( // The $args
            'facebook_url' // Should match Option ID
        )  
    ); 

    add_settings_field( // Option 2
        'youtube_url', // Option ID
        'Youtube URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'social_media_settings_section', // Name of our section (General Settings)
        array( // The $args
            'youtube_url' // Should match Option ID
        )  
    ); 

    register_setting('general','facebook_url', 'esc_attr');
    register_setting('general','youtube_url', 'esc_attr');
}

function social_media_options_callback() { // Section Callback
    echo '<p>Redes sociales</p>';  
}

function social_media_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}


add_action('admin_init', 'address_fields_general_section');  
function address_fields_general_section() {  
    add_settings_section(  
        'address_settings_section', // Section ID 
        'Dirección', // Section Title
        'address_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'address_line1', // Option ID
        'Línea 1', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_line1' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_line2', // Option ID
        'Línea 2', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_line2' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_postal_code', // Option ID
        'Postal Code', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_postal_code' // Should match Option ID
        )  
	); 
	add_settings_field( // Option 1
        'address_postal_code', // Option ID
        'Postal Code', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_postal_code' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_locality', // Option ID
        'Localidad', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_locality' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_region', // Option ID
        'Region', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_region' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_country', // Option ID
        'Pais', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_country' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_cod_phone1', // Option ID
        'Código', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_cod_phone1' // Should match Option ID
        )  
	); 
	add_settings_field( // Option 1
        'address_phone1', // Option ID
        'Teléfono 1', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_phone1' // Should match Option ID
        )  
	); 
	
	add_settings_field( // Option 1
        'address_cod_phone2', // Option ID
        'Código 2', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_cod_phone2' // Should match Option ID
        )  
	); 
	add_settings_field( // Option 1
        'address_phone2', // Option ID
        'Teléfono 2', // Label
        'address_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'address_settings_section', // Name of our section
        array( // The $args
            'address_phone2' // Should match Option ID
        )  
    ); 

    register_setting('general','address_line1', 'esc_attr');
	register_setting('general','address_line2', 'esc_attr');
	register_setting('general','address_postal_code', 'esc_attr');
	register_setting('general','address_locality', 'esc_attr');
	register_setting('general','address_region', 'esc_attr');
	register_setting('general','address_country', 'esc_attr');

	register_setting('general','address_cod_phone1', 'esc_attr');
	register_setting('general','address_phone1', 'esc_attr');
	register_setting('general','address_cod_phone2', 'esc_attr');
	register_setting('general','address_phone2', 'esc_attr');
}

function address_options_callback() { // Section Callback
    echo '<p>Datos utilizados para generar los schema.org de las páginas</p>';  
}

function address_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

//require_once( dirname( __FILE__ ) . 'includes/schema.php');
require_once('includes/schema.php');


add_filter( 'get_the_archive_title', 'remove_archive_title' );
/**
 * Remove archive labels.
 * 
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function remove_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

/**
* Proper ob_end_flush() for all levels
*
* This replaces the WordPress `wp_ob_end_flush_all()` function
* with a replacement that doesn't cause PHP notices.
*/
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
    while ( @ob_end_flush() );
} );
