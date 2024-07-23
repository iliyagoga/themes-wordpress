jQuery(document).ready(()=>{

    const uls = jQuery('.wp-block-woocommerce-product-categories ul');
    for( const ul of uls){
        const lis= jQuery(ul).children();
        for(const li of lis){
            jQuery(li).children('span').remove()
            if(jQuery(li).find('ul').length>0){
                const img = jQuery('<img class="throw" src="http://woocommerse/wp-content/themes/shop/shop/templates/img/Frame (2).svg">');
                jQuery(li).children('a').after(img);
                const underUl=jQuery(li).children('ul');
                for(const u of underUl){
                    jQuery(u).css('display','none');
                    let c=0;
                    img.on('click',(()=>{;
                        if(c==0){
                            jQuery(u).css('display','block');
                            img.css('transform','rotate(90deg)')
                            c=1;
                        }
                        else{
                            jQuery(u).css('display','none');
                            img.css('transform','rotate(0deg)')
                            c=0;
                        }
                    })
                )
                }
            }
           
        }
    }
    
})