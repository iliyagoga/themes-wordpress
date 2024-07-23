<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<header>
		<div class="head_container">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/SHOP.png'?>" alt="">
			<div class="menu_c">
				<?php wp_nav_menu( 
					array(
						'theme_location'=>"head_menu",
						"container"=>false
					)
				 )?>
			</div>
			<div class="search">
			<?php  if ( is_active_sidebar( 'woo-right-sidebar' ) ) { ?>
					<aside id="sidebar-right" class="sidebar">
						<?php dynamic_sidebar( 'woo-right-sidebar' ); ?>
					</aside>
				<?php } ?>
			</div>
		</div>
	</header>
	
