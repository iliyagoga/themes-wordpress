jQuery(document).ready(function(){
    const button = jQuery('.tabs .but');
    const comment= jQuery('.comment-respond');
        button.click(()=>{
            window.scrollTo(0, 0);
            comment.css('display','flex')
            jQuery('body').css('overflow','hidden')
    })
})

