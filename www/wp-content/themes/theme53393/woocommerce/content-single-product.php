<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form();
    return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php    do_action( 'woocommerce_before_single_product_summary' ); ?>

    <div class="summary entry-summary">

        <?php
        do_action( 'woocommerce_single_product_summary' );

        $tabs = apply_filters( 'woocommerce_product_tabs', array() );

        if ( ! empty( $tabs ) ) {
            call_user_func($tabs["additional_information"]["callback"]);
        }?>

    </div><!-- .summary -->
    <div class="comments">
        <?php if ( ! empty( $tabs ) ) {

                call_user_func($tabs["reviews"]["callback"]);
            }?>
    </div>
    <meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
