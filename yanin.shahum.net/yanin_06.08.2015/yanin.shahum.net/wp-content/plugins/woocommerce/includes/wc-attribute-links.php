<?php
/*
Plugin Name: WooCommerce Attribute Links
Description: Display product attribute archive links on product page, right below the add to cart button.
Version: 1.0
Author: Alex Melik
Author URI: http://none
*/
add_action( 'woocommerce_product_meta_end', 'cj_show_attribute_links' );
function cj_show_attribute_links() {
    global $post;
    $attribute_names = array( '<ATTRIBUTE_NAME>', '<ANOTHER_ATTRIBUTE_NAME>' ); // Insert attribute names here
    foreach ( $attribute_names as $attribute_name ) {
        $taxonomy = get_taxonomy( $attribute_name );
        if ( $taxonomy && ! is_wp_error( $taxonomy ) ) {
            $terms = wp_get_post_terms( $post->ID, $attribute_name );
            $terms_array = array();
            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    $archive_link = get_term_link( $term->slug, $attribute_name );
                    $full_line = '<a href="' . $archive_link . '">'. $term->name . '</a>';
                    array_push( $terms_array, $full_line );
                }
                echo $taxonomy->labels->name . ' ' . implode( $terms_array, ', ' );
            }
        }
    }
}
?>