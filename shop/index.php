<?php get_header() ?>
<div class="breadcrumbs">
    <?php
        woocommerce_breadcrumb(array('delimiter'=>">"));
    ?>
</div>
<?php 
    if(have_posts(  )):
        while(have_posts()):
            the_post();  
?>
<?php the_content()?>
<?php endwhile; endif;?>

<?php get_footer() ?>
