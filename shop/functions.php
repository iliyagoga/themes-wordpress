<?php

add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-zoom');
    wp_enqueue_script( 'quanity', get_stylesheet_directory_uri() . '/js/quanity.js', 'jquery', null, true );
    wp_enqueue_script( 'colors', get_stylesheet_directory_uri() . '/js/grouped_colors.js', 'jquery', null, true );
    wp_enqueue_script( 'attributes', get_stylesheet_directory_uri() . '/js/attributes.js', 'jquery', null, true );
    wp_enqueue_script( 'comments_show', get_stylesheet_directory_uri() . '/js/comments_show.js', 'jquery', null, true );
    wp_enqueue_script( 'categories', get_stylesheet_directory_uri() . '/js/categories.js', 'jquery', null, true );
    wp_enqueue_script( 'mutation', get_stylesheet_directory_uri() . '/js/mutation.js', 'jquery', null, true );
});

function files() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
} 

add_action( 'wp_enqueue_scripts', 'files' );

add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-zoom' );

wp_deregister_style( 'woocommerce-general' );
wp_deregister_style( 'woocommerce-layout' );

register_nav_menus(
    array(
        'head_menu'=>"меню в шапке",
        'company'=>"company",
        'faq'=>'faq',
        'help'=>'help',
        'resources'=>'resources'

    )
    );

add_filter('woocommerce_reset_variations_link', '__return_empty_string');

register_sidebar();
function register_woo_widgets(){
    register_sidebar( array(
        'name'       => "Поиск",
        'id'         => 'woo-right-sidebar',
        'description' => 'Виджеты в новой колонке магазина',
        'before_widget'  => '<div id="%1$s" class="widget %2$s">',
        'after_widget'   => '</div>',
        'before_title'   => '<h3 class="widget-title">',
        'after_title'    => '</h3>'
    ) );
}
add_action( 'widgets_init', 'register_woo_widgets' );
//remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10, 3 );
function my_custom_sale_flash($text, $post, $_product) {
return ' ';
}
add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb',20 );
add_action('woocommerce_before_shop_loop',function(){
    woocommerce_breadcrumb( array('delimiter'=>"> ") );
    echo '<div class="list_container">';
    echo woocommerce_get_sidebar();
    echo '<div class="list">';
    echo '<div class="products_tabs">';
    echo '<h2>';
    woocommerce_page_title();
    echo '</h2>';
    
});

remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action( 'woocommerce_before_shop_loop','woocommerce_output_all_notices',10);
add_action( 'woocommerce_before_shop_loop', function(){
    woocommerce_output_all_notices();

    echo '<div class="tabs_r">';
    woocommerce_result_count();
    echo "Sort by ";
    woocommerce_catalog_ordering();
    echo "</div>";
    echo '</div>';
} );
add_action('woocommerce_after_shop_loop',function(){
    echo '</div>';
    echo '</div>';
});
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
add_action('woocommerce_after_shop_loop_item_title',function(){
    global $product;
    $rating= $product->get_average_rating();
    $coll="";
    if ( $rating && wc_review_ratings_enabled() ) {
        if($rating<6){
            for( $i=1; $i<=$rating;$i++){
                $coll.='<img src="'.get_stylesheet_directory_uri().'/templates/img/Star 4.svg">';
            };
            echo $coll;
        } 
    }
});
add_action('woocommerce_after_shop_loop_item_title',function(){
    echo '<div class="price">';
    woocommerce_template_loop_price();
    global $product;
    if(!empty($product->regular_price) && $product->regular_price!=$product->price){
        echo '<div class="sale">';
        echo "-".(100-($product->price/$product->regular_price)*100)."%";
        echo '</div>';
    }
    echo '</div>';
});
add_action('woocommerce_before_cart',function(){
    echo '<div class="cart_mean">';
});
add_action('woocommerce_after_cart',function(){
    echo '</div>';
});

add_filter( 'woocommerce_cart_totals_coupon_html', 'true_remove_coupon_class' );
 
function true_remove_coupon_class( $coupon_html ){
 
	return str_replace( 'class="woocommerce-remove-coupon"', '', $coupon_html );
 
}

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
add_action('woocommerce_before_single_product_summary',function(){
    echo '<div class="prevue_product">';
    woocommerce_show_product_sale_flash();
    global $product;
    woocommerce_show_product_images();
    // echo '<div class="gallery">';
    // echo '<div class="mini_imgs">';
    // if(!empty($product->gallery_image_ids)){
    //     foreach($product->gallery_image_ids as $imgId ){
    //         echo '<a href="'.wp_get_attachment_url($imgId).'"><img src="'.wp_get_attachment_url($imgId).'"></a>';
    //     };
    // };
    // echo '</div>';
    // echo '<div class="main_img">';
    // echo '<a href="'.wp_get_attachment_url($product->get_image_id()).'"><img src="'.wp_get_attachment_url($product->get_image_id()).'"></a>';
    // echo '</div> </div>';
});
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10 );
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
add_action('woocommerce_after_single_product_summary',function(){
    echo '</div>';
    woocommerce_output_product_data_tabs();
    woocommerce_upsell_display();
    woocommerce_output_related_products();
});
remove_all_actions('woocommerce_single_product_summary');
add_action('woocommerce_single_product_summary',function(){
    global $product;
    echo '<div class="info">';
    woocommerce_template_single_title();
    $rating= $product->get_average_rating();
    $coll='<div class="r">';
    if ( $rating && wc_review_ratings_enabled() ) {
        if($rating<6){
            for( $i=1; $i<=$rating;$i++){
                $coll.='<img src="'.get_stylesheet_directory_uri().'/templates/img/Star 4.svg">';
            };
            $coll.='<p>'.$rating.'/5</p>';
            $coll.='</div>';
            echo $coll;
        } 
        else{
            $coll.=$rating.'/10';
            echo $coll;
        }
    }
    echo '<div class="price"> <h3>';
    echo "$".$product->price;
    echo '</h3> <p class="decor">';
        if(!empty($product->regular_price) &&$product->regular_price!=$product->price){
            echo "$".$product->regular_price;
            echo ' <div class="sale"';
            echo "-".(100-($product->price/$product->regular_price)*100)."%";
        }
    echo '</p>';
    if(!empty($product->regular_price) &&$product->regular_price!=$product->price){
        echo "-".(100-((int)$product->price/(int)$product->regular_price)*100)."%";
    };
    echo '</div> </div>';
    the_excerpt();
    woocommerce_template_single_excerpt();
    woocommerce_template_single_meta();
    woocommerce_template_single_add_to_cart();
    echo '</div>';
    woocommerce_template_single_sharing();

});

remove_action('woocommerce_review_before','woocommerce_review_display_gravatar',10);
remove_action('woocommerce_review_before_comment_meta','woocommerce_review_display_rating',10);
add_action('woocommerce_review_before_comment_meta',function(){
    global $comment;
    $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
    $coll="";
    if ( $rating && wc_review_ratings_enabled() ) {
        if($rating<6){
            for( $i=1; $i<=$rating;$i++){
                $coll.='<img src="'.get_stylesheet_directory_uri().'/templates/img/Star 4.svg">';
            };
            echo $coll;
        }
        
        
    }
});

add_filter( 'woocommerce_show_page_title', 'wp_kama_woocommerce_show_page_title_filter' );

function wp_kama_woocommerce_show_page_title_filter( $true ){

	// filter...
	return false;
}





?>