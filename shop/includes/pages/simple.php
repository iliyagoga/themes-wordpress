<div class="simple">
<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
<?php      
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_txt' ); 
    add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_txt' );   
    function woo_custom_cart_button_txt() {
            return __( 'Add to Cart', 'woocommerce' );
    }
    do_action( 'woocommerce_single_variation' );
?>
</form>

</div>