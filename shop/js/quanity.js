jQuery(document).ajaxComplete(function(){
    const containers = jQuery(".quantity");
    for(let cont of containers){
        const container= jQuery(cont);
        const quantity= container.find('input');
        quantity.css('display','none');
        const slider= jQuery('<div class="slider"> <div class="s_button s1"><img src="http://woocommerse/wp-content/themes/shop/shop/templates/img/+.svg"></div><p>1</p><div class="s_button s2"><img src="http://woocommerse/wp-content/themes/shop/shop/templates/img/-.svg"></div></div>');
        container.append(slider);
        const b1= slider.find('.s1');
        const b2= slider.find('.s2');
        const value=slider.find('p');
        value.html(quantity.val());
        b1.click(()=>{
            if(value.html()>1)
            value.html(value.html()-1)
            quantity.val(value.html());
            quantity.change();
        }
        )
        b2.click(()=>{
            value.html(Number(value.html())+1);
            quantity.val(value.html());
            quantity.change();
        })
    }
    
    

})
jQuery('.wc-block-components-checkbox').ready(()=>{
    console.log(jQuery('.wc-block-components-checkbox'))
    jQuery('.wc-block-components-checkbox').css('display','none')})
jQuery(document).ready(function(){
    const containers = jQuery(".quantity");
    for(let cont of containers){
        const container= jQuery(cont);
        const quantity= container.find('input');
        quantity.css('display','none');
        const slider= jQuery('<div class="slider"> <div class="s_button s1"><img src="http://woocommerse/wp-content/themes/shop/shop/templates/img/+.svg"></div><p>1</p><div class="s_button s2"><img src="http://woocommerse/wp-content/themes/shop/shop/templates/img/-.svg"></div></div>');
        container.append(slider);
        const b1= slider.find('.s1');
        const b2= slider.find('.s2');
        const value=slider.find('p');
        value.html(quantity.val());
        b1.click(()=>{
            if(value.html()>1)
            value.html(value.html()-1)
            quantity.val(value.html());
            quantity.change();
        }
        )
        b2.click(()=>{
            value.html(Number(value.html())+1);
            quantity.val(value.html());
            quantity.change();
        })
    }
    
    

})


