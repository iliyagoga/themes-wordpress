jQuery(document).ready(function(){
    const colors_block= jQuery('.variations .colors');
    const select_hodden= jQuery('.variations .colors td select');
    select_hodden.css('display','none');
    const values= select_hodden.children();
    let c=0;
    const  bl= jQuery('<div class="colors_container">')
    for( const value of values){
        if(c>0)
        {
            const color= jQuery('<div class="color_el"><img class="img_none" src="http://woocommerse/wp-content/themes/shop/shop/templates/img/Frame.svg"></div>');
            color.css('background',jQuery(value).val());
            color.click(()=>{
                for(const el of bl.children()){
                    jQuery(jQuery(el).children()[0]).addClass('img_none');
                }
                select_hodden.val(jQuery(value).val()).change();
                jQuery((color.children())[0]).removeClass('img_none')
            });
            bl.append(color);
        }
        c++;
    }
    colors_block.append(bl);



    
})