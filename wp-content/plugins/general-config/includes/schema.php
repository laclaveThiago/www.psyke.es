<?php
/**
 * Schema.org.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Using `wp_head` to inject to the document <head>
add_action('wp_head', function() {
    $schema = array(
        '@context'  => 'http://schema.org',
        '@type'     => 'MedicalBusiness',
        'MedicalSpecialty' => 'Psychiatric',
        'name'      => get_bloginfo('name'),
        'url'       => get_home_url(),
        'telephone' => get_option('address_cod_phone1', '') . get_option('address_phone1', ''), // change the country code
		'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_option('address_line1', '') . get_option('address_line2', ''),
            'postalCode'      => get_option('address_postal', ''),
            'addressLocality' => get_option('address_locality', ''),
            'addressRegion'   => get_option('address_region', ''),
            "addressCountry"  => get_option('address_country', '')
        ),
        'logo'     => get_stylesheet_directory_uri() . 'logotype.jpg',
        'image'     => get_stylesheet_directory_uri() . 'company.jpg',
        'sameAs' => [array(get_option('facebook_url', ''), get_option('youtube_url', ''))],
        'openingHoursSpecification' => [array(
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Mo", "Tu", "We", "Th", "Fr"],
            "opens" => "09:00",
            "closes" => "14:00"
        ), array(
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek"=> ["Mo", "Tu", "We", "Th", "Fr"],
            "opens"=> "16:00",
            "closes"=> "21:00"
        ), array(
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Sa", "Su"],
            "opens" => "00:00",
            "closes" => "00:00"
        )]
	);
    
    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});
