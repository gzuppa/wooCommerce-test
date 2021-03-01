<?php
/**
 * Plugin Name: List products by specie
 * Description: List products by specie
**/

function list_by_specie( $atts ) {
    global $woocommerce_loop;

    extract(shortcode_atts(array(
        'per_page'  => '3',
        'columns'   => '3',
        'orderby' => 'category',
        'order' => 'desc'
    ), $atts));

    $woocommerce_loop['columns'] = $columns;

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'orderby' => $orderby,
        'order' => $order,
        'meta_query' => array(
            array(
                'key' => '_visibility',
                'value' => array('catalog', 'visible'),
                'compare' => 'IN'
            ),
            array(
                'key' => '_sale_price',
                'value' =>  0,
                'compare'   => '>',
                'type'      => 'NUMERIC'
            )
        )
    );
    query_posts($args);
    woocommerce_get_template_part( 'loop', 'shop' );
    wp_reset_query();

    return ob_get_clean();
}

add_shortcode('list_by_specie', 'woocommerce_sale_products');