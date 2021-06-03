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
        'telephone' => get_field('address_cod1', 'general') . get_field('address_cod_phone1', 'general'), // change the country code
		'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_field('address_line1', 'general') . get_field('address_line2', 'general'),
            'postalCode'      => get_field('address_postal', 'general'),
            'addressLocality' => get_field('address_locality', 'general'),
            'addressRegion'   => get_field('address_region', 'general'),
            "addressCountry"  => get_field('address_country', 'general')
        )
	);

    /*
    /// LOGO
    $schema['logo'] = get_stylesheet_directory_uri() . "logotype.jpg";
    /// IMAGE
    $schema['image'] = get_stylesheet_directory_uri() . "company.jpg";

    /// SOCIAL MEDIA
    "sameAs": [get_field('facebook_url', 'general')],
    "sameAs": [get_field('youtube_url', 'general')],

    "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Mo", "Tu", "We", "Th", "Fr"],
        "opens": "09:00",
        "closes": "14:00"
    }, {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Mo", "Tu", "We", "Th", "Fr"],
        "opens": "16:00",
        "closes": "21:00"
    }, {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Sa", "Su"],
        "opens": "00:00",
        "closes": "00:00"
    }],

    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});