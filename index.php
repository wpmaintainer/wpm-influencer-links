<?php
/*
Plugin Name: Social Influencer Links
Description: Create a landing page of links for quick use on social media profiles, like Instagram.
Author: WP Maintainer
Author URI: https://wpmaintainer.com/products/landing-links/
Version: 0.1
*/

if ( !\defined( 'ABSPATH' ) ) return;

/*
------------------------------------------------
ACF (Free) Inclusion
------------------------------------------------
*/

// Define path and URL to the ACF plugin.
\define( 'MY_ACF_PATH', __DIR__ . '/lib/acf/' );
\define( 'MY_ACF_URL', \plugins_url( '/lib/acf/', __FILE__ ) );

// for loading field syncs
\define( 'WPM_ACF_SAVE_PATH', __DIR__ . '/acf-json' );

// Include the ACF plugin.
include_once MY_ACF_PATH . 'acf.php';

// Customize the url setting to fix incorrect asset URLs.
\add_filter('acf/settings/url', function( $url ) {
    return MY_ACF_URL;
});

// (Optional) Hide the ACF admin menu item.
if ( !\defined( 'WPM_LL_DEVELOPER' ) ) 
{
    \add_filter('acf/settings/show_admin', function( $show_admin ) {
        return \apply_filters( 'wpm_ll_show_acf_admin', false );
    });
}

/*
------------------------------------------------
Initialize all plugin code:
------------------------------------------------
*/

foreach ( \glob( __DIR__ . '/lib/*.php' ) as $file ) include $file;