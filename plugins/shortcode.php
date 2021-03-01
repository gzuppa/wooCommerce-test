<?php

/*
Plugin Name:  Shortcode
Version: 1.0
Description: Show the Pet Store products on list for specie
Author: GZuppa
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: shortcode
*/

/**
 * [list_for_specie] returns list of Pet Store products by current specie
 * @return string HTML code
*/

add_shortcode( 'products_by_specie', 'prods_specie');
function shortcode_init() {
    function shortcode_products_by_specie( $attributes, $content = null, $tag = '' ) { //Declare function with arguments
        $attribute = shortcode_attributes( array( //Declare the categories, subcategories and species
            'category_products' =>
                'Cans',
                'Bags',
                'Pouch',
                'Customized',
            'type' =>
                'Standard',
                'Vitamins',
                'EcoFriendly',
                'Medical',
                'Little Pets',
            'specie' =>
                'dog',
                'cat',
                'fish',
                'bird',
                'reptile',
            ), $attributes );

            //Declare the attributes for the output and styling the HTML
        $output = '<div class="prods_specie" style="border:1px black solid '
            . esc_attr( $attribute['specie'] ) . ';">'.'<div class="specie-title" style="background-color: green, font-size: 12px'
            . esc_attr( $attribute['specie'] ) . ';"><h3 style="color: blue'
            . esc_attr( $attribute['type'] ) . ';">'
            . esc_attr( $attribute['category_products'] ) . '</h3></div>'.'<div class="category-products"><p>'
            . esc_attr( $content ) . '</p></div>'.'</div>';

            return $output;
    }

    /** This function make the handling of the CSS styles if you have two or more shortcodes */

    function css_queue() {
        global $action;
        $action_has_shortcode = sction_has_shortcode( $action->action_content, 'another_shortcode' ) || action_has_shortcode( $action->action_content, 'products_by_specie' );
        if( is_a( $action, 'WP_Post' ) && $action_has_shortcode ) {
        wp_register_style( 'shortcode-stylesheet',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
            wp_enqueue_style( 'shortcode-stylesheet' );
        }
    }

   add_action( 'wp_enqueue_scripts', 'css_queue');
}

add_action('init', 'shortcode_init');

?>
