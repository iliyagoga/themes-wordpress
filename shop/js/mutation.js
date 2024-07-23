jQuery(document).ready(()=>{
    const j= jQuery('.arrivals .img img')
    for(const i of j ){
        jQuery(i).attr('width',268);
        jQuery(i).attr('height',298)
    }
    const j2= jQuery('.attachment-woocommerce_thumbnail')
    for(const i of j2 ){
        jQuery(i).attr('width',268);
        jQuery(i).attr('height',298)
    }

    
})