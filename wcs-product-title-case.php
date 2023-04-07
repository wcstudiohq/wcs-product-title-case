<?php 
/*
Plugin Name: WCS Product Title Case for WooCommerce
Plugin URI : https://github.com/wcstudiohq/wcs-product-title-case
Description: Capitalize WooCommerce product titles automatically.
Version: 1.0
Author: WC Studio
Author URI: https://wcstudio.com
License : GPL v or later
Text Domain: wcs-product-title-case
Domain Path : /languages/
WC requires at least: 5.0
WC tested up to: 7.5
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    

/**
 * Capitalize WooCommerce product titles automatically.
 */

    add_filter( 'the_title', 'wcs_product_title_case', 9999, 2 );

    function wcs_product_title_case( $post_title, $post_id ) {
        if ( ! is_admin() && 'product' === get_post_type( $post_id ) ) {
            $post_title = ucwords( strtolower( $post_title ) );
        }
        return $post_title;
    }

}
