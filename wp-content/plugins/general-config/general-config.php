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
        'linkedin_url', // Option ID
        'Linkedin URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'social_media_settings_section', // Name of our section (General Settings)
        array( // The $args
            'linkedin_url' // Should match Option ID
        )  
    ); 

    add_settings_field( // Option 2
        'instagram_url', // Option ID
        'Instagram URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'social_media_settings_section', // Name of our section (General Settings)
        array( // The $args
            'instagram_url' // Should match Option ID
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

    add_settings_field( // Option 2
        'vimeo_url', // Option ID
        'Vimeo URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'social_media_settings_section', // Name of our section (General Settings)
        array( // The $args
            'vimeo_url' // Should match Option ID
        )  
    ); 

    add_settings_field( // Option 2
        'soundcloud_url', // Option ID
        'Soundcloud URL', // Label
        'social_media_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'social_media_settings_section', // Name of our section (General Settings)
        array( // The $args
            'soundcloud_url' // Should match Option ID
        )  
    ); 

    register_setting('general','facebook_url', 'esc_attr');
    register_setting('general','linkedin_url', 'esc_attr');
    register_setting('general','instagram_url', 'esc_attr');
    register_setting('general','youtube_url', 'esc_attr');
    register_setting('general','vimeo_url', 'esc_attr');
    register_setting('general','soundcloud_url', 'esc_attr');
    
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

//
add_image_size( 'thumbnailMaterial', 620, 920, TRUE);
add_image_size( 'thumbnailMaterial', 620, 400, TRUE);
add_image_size( 'thumbnailQuad', 620, 620, TRUE);


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



/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes_social_media() {
    add_shortcode( 'web_social_media', 'shortcode_web_social_media' );
}
add_action( 'init', 'register_shortcodes_social_media' );

/**
 * Soc Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function shortcode_web_social_media( $atts ) {
	ob_start();

	?>
        <ul class="social-media">
            <?php if(get_option('facebook_url', '')) : ?>
                <li class="facebook">
                    <a href="<?php echo get_option('facebook_url', ''); ?>" target="_blank" rel="noopener">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(get_option('linkedin_url', '')) : ?>
            <li class="linkedin">
                <a href="<?php echo get_option('linkedin_url', ''); ?>" target="_blank" rel="noopener">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_option('instagram_url', '')) : ?>
            <li class="instagram">
                <a href="<?php echo get_option('instagram_url', ''); ?>" target="_blank" rel="noopener">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_option('soundcloud_url', '')) : ?>
            <li class="soundcloud">
                <a href="<?php echo get_option('soundcloud_url', ''); ?>" target="_blank" rel="noopener">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="soundcloud" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-soundcloud fa-w-20"><path fill="currentColor" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4-2.2 0-4.2.8-5.6 1.9-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7 1.7 1.9 3.9 3.1 6.4 3.1 2.2 0 4.2-1.1 5.6-2.5 1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1-6.4-70.8-65.8-126.4-138.3-126.4-17.8 0-35 3.3-50.3 9.4-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5 4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z" class=""></path></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_option('vimeo_url', '')) : ?>
            <li class="vimeo">
                <a href="<?php echo get_option('vimeo_url', ''); ?>" target="_blank" rel="noopener">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="vimeo-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-vimeo-v fa-w-14"><path fill="currentColor" d="M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z" class=""></path></svg>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_option('youtube_url', '')) : ?>
            <li class="youtube">
                <a href="<?php echo get_option('youtube_url', ''); ?>" target="_blank" rel="noopener">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg>
                </a>
            </li>
            <?php endif; ?>
        </ul>

	<?php
    wp_reset_postdata();
    $listSocialMedia = ob_get_clean();
    return $listSocialMedia;
}
