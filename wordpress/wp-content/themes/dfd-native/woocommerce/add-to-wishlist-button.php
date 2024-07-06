<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */
if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly

global $product;
$product_id = get_the_ID();
?>

<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', $product_id, '' ), 'add_to_wishlist' ) )?>" rel="nofollow" data-product-id="<?php echo $product_id ?>" data-product-type="<?php echo $product->get_type() ?>" class="add_to_wishlist" >
    <i class="dfd-socicon-heart-shape-silhouette"></i>
    <span><?php esc_html_e('Add to wishlist', 'dfd-native') ?></span>
</a>