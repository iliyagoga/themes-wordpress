<div class="attributes">
    <?php   
    $available_variations=$product->get_available_variations();
    $attributes=$product->get_variation_attributes();
    $attribute_keys  = array_keys( $attributes );
    $variations_json = wp_json_encode( $available_variations );
    $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
    
    do_action( 'woocommerce_before_add_to_cart_form' ); ?>
    
    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
        <?php do_action( 'woocommerce_before_variations_form' ); ?>
    
        <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
            <p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
        <?php else : ?>
            <table class="variations" cellspacing="0" role="presentation">
                <tbody>
                    <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                        <tr class="<?php echo explode('_',$attribute_name)[1];?>">
                            <th class="label" ><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></th>
                            <td class="value">
                                <?php
                                    wc_dropdown_variation_attribute_options(
                                        array(
                                            'options'   => $options,
                                            'attribute' => $attribute_name,
                                        )
                                    );
                                    echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php do_action( 'woocommerce_after_variations_table' ); ?>
    
            <div class="single_variation_wrap">
                <?php
                add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_txt' ); //
                add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_txt' );   
                function woo_custom_cart_button_txt() {
                        return __( 'Add to Cart', 'woocommerce' );
                }
                    do_action( 'woocommerce_before_single_variation' );
                    do_action( 'woocommerce_single_variation' );
                    do_action( 'woocommerce_after_single_variation' );
                ?>
            </div>
        <?php endif; ?>
    
        <?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>

</div>