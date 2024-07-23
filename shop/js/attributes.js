jQuery(document).ready(function(){
    const table =jQuery('.variations tbody tr');
    for( const tr of table){
        if(tr.className!='colors'){
            jQuery(tr).find('select').css('display','none');
            const td= jQuery(tr).find('td');
            td.addClass('attr');
            let c=0;
            for(const option of (jQuery(tr).find('select')).children()){
                if(c>0){
                    const block= jQuery('<div class="block">');
                    block.html(jQuery(option).val());
                    block.click(()=>{
                        for(const r of jQuery(tr)){
                            jQuery(r).find('.block').removeClass('active');
                        }
                        block.addClass('active');
                        (jQuery(tr).find('select')).val(jQuery(option).val());
                        (jQuery(tr).find('select')).change();
                    })
                    td.append(block);
                }
                c++;
           }
        }
    }
})