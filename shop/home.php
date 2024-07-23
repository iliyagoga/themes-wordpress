<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="agitation">
		<div class="block b1">
			<div class="header">
				<h2><?php echo get_field('agit_title')?></h2>
				<p><?php echo get_field("agit_descr")?></p>
				<a class="button" >Shop now</a>
			</div>
			<div class="stat">
				<div>
					<h3>100+</h3>
					<p>International Brands</p>
				</div>
				<div>
					<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Line 10.png'?>" alt="">
				</div>
				<div>
					<h3>1,500+</h3>
					<p>High-Quality Products</p>
				</div>
				<div>
					<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Line 10.png'?>" alt="">
				</div>
				<div>
					<h3>20,000+</h3>
					<p>Happy Customers</p>
				</div>
			</div>
		</div>
		<div class="block b2">
			<img class="star1" src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector.svg'?>" alt="">
			<img class="star2" src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector (1).svg'?>" alt="">

		</div>
	</div>
	<div class="brands">
		<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector.png'?>" alt="">
		<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector-1.png'?>" alt="">
		<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector-2.png'?>" alt="">
		<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector-3.png'?>"alt="">
		<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Vector-4.png'?>" alt="">
	</div>
	<div class="arrivals">
		<h2 class="title">NEW ARRIVALS</h2>
		<div class="body">
			<?php
			$products_arr=wc_get_products(array('limit'=>4));
			foreach($products_arr as $pr ){
				include 'includes/shablones/product.php';
			}
			?>
		
			
		</div>
		
	
	</div>
	<div class="list_brands">
		<h2>BROWSE BY dress STYLE</h2>
		<div class="body">
		<?php
			$categoryes=  get_terms( ['taxonomy' => 'product_cat', 'hide_empty' => false] );
			$c=0;
			foreach($categoryes as $el):
				if($el->name!="Misc"):
				if($c<4):
					
			?>
			<div class="brand">
				<a href="/product-category/<?php echo $el->slug;?>">
				<h4><?php echo $el->name?></h4>
				<img src="<?php echo wp_get_attachment_url(get_woocommerce_term_meta($el->term_id, 'thumbnail_id', true));?>" alt="">
				</a>
				
			</div>
			<?php
				$c++;
				endif;
				if($c>=4){
					break;
				}
				endif;
				
				endforeach;
			
		?>
		<div class="brand">

		</div>
		</div>
	</div>
	</main>

<?php
get_footer();
