<?php

/*
 * Plugin Name: GCode Hide Product Prices 
 * Plugin URI: https://jenniferladd.art/
 * Description: Hides prices of WooCommerce products if they are in the special 'hide_price' product category. 
 * 
 * Version: 1.0 
 * Author: Gareth Ladd 
 * Author URI: https://jenniferladd.art/ 
 * License: GPLv2 or later 
 * Text Domain: gcode_hpp
 */

add_filter('woocommerce_get_price_html', 'gcode_hpp_hide_price_on_taxonomy');

/**
 * Filters the given price to return empty if the current product is in the
 * <code>hide_price</code> category.
 * 
 * @param string $price the price with currency symbol and appropriate separators, etc.
 * @return string the $price arg or empty string
 */
function gcode_hpp_hide_price_on_taxonomy( $price )
{
    // Search the current products terms for category called hide_price    
    if ( has_term('hide_price', 'product_cat') )
    { 
        // Don't show price when it's in one of the categories
        $price = '';
    }
    else 
    {
        return $price; // Return original price]
    }
}