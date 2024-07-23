

	<footer class="site-footer">
		<div class="form_contact">
			<div class="one">
				<p>STAY UPTO DATE ABOUT OUR LATEST OFFERS</p>
			</div>
			<div class="two">
				<?php
				echo do_shortcode("[ninja_form id='2']");
				?>
			</div>
			
		</div>
		
		<div class="top">
			<div class="column">
				<img src="<?php  echo get_stylesheet_directory_uri().'/templates/img/SHOP.png'?>" alt="">
				<p>We have clothes that suits your style and which you’re proud to wear. From women to men.</p>
			</div>
			<div class="column">
				<h3>company</h3>
				<?php
				wp_nav_menu( array(
					'theme_location'=>"company",
					'container'=>'div',
					'container_id' => 'mainmenu-wrap',
					'menu_class'=>'under_menu'
				) );
				?>
			</div>
			<div class="column">
				<h3>help</h3>
				<?php
				wp_nav_menu( array(
					'theme_location'=>"help",
					'container'=>'div',
					'container_id' => 'mainmenu-wrap',
					'menu_class'=>'under_menu'
				) );
				?>
			</div>
			<div class="column">
				<h3>faq</h3>
				<?php
				wp_nav_menu( array(
					'theme_location'=>"faq",
					'container'=>'div',
					'container_id' => 'mainmenu-wrap',
					'menu_class'=>'under_menu'
				) );
				?>
			</div>
			<div class="column">
				<h3>resources</h3>
				<?php
				wp_nav_menu( array(
					'theme_location'=>"resources",
					'container'=>'div',
					'container_id' => 'mainmenu-wrap',
					'menu_class'=>'under_menu'
				) );
				?>
			</div>
		</div>
	<div class="bottom">
		<div class="y">
			<p>Shop.co © 2000-2023, All Rights Reserved</p>
		</div>
		<div class="y">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Badge-1.png'?>" alt="">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Badge-2.png'?>" alt="">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Badge-3.png'?>" alt="">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Badge-4.png'?>" alt="">
			<img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Badge-5.png'?>" alt="">
		</div>
	</div>
		
	</footer>


<?php wp_footer(); ?>

</body>
</html>
