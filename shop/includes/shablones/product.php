<div class="product">
    <a href="/<?php echo $pr->slug?>">
        <div class="img">
            <img src="<?php echo wp_get_attachment_url($pr->image_id)?>" alt="">
        </div>
        <h2><?php echo $pr->name?></h2>
        <div class="rait">
            <div class="rait_imgs">
                <?php
                for($u=0;$u<$pr->get_average_rating();$u++):
                    ?>
                    <img src="<?php echo get_stylesheet_directory_uri().'/templates/img/Star 4.svg'?>" alt="">
                    
                <?php
                endfor;
                ?>
                <p><?php echo $pr->get_average_rating()?>/5</p>
            
            </div>
            <div class="price">
                <h3>
                <?php
                    echo "$".$pr->price;
                ?>
                </h3>
                <p class="decor">
                <?php 
                    if(!empty($pr->regular_price) &&$pr->regular_price!=$pr->price){
                        echo "$".$pr->regular_price;
                    }
                ?>
                </p>
                <div class="<?php if(!empty($pr->regular_price) && $pr->regular_price!=$pr->price) echo 'sale'?>">
                <?php 

                    if(!empty($pr->regular_price) && $pr->regular_price!=$pr->price){
                        echo "-".(100-($pr->price/$pr->regular_price)*100)."%";
                    }
                ?>
                
                </div>
            </div>
        </div>
    </a>
</div>