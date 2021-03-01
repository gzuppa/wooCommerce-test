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
 * @return string ProductsBySpecie
*/

add_shortcode( 'products_by_specie');
function shortcode_init(){
 function shortcode_products_by_specie() {
 return function () {
     console.log("Temporal")
 };
 }
}
add_action('init', 'shortcode_init');

?>