$('.js_dev').hover(function(){$('.js_dot1').addClass('dot3');},function(){$('.js_dot1').removeClass('dot3');});
$('.js_prod').hover(function(){$('.js_dot2').addClass('dot3');},function(){$('.js_dot2').removeClass('dot3');});

//photo swipe
$(document).on('click','.js_photo_swipe',function(e){
    e.preventDefault();
    var index=$(this).attr('data-index');
    openPhotoSwipe(index);
});

var openPhotoSwipe = function(ind)
{
    var pswpElement =document.querySelectorAll('.pswp')[0];

    ind=parseInt(ind);
    // define options (if needed)
    var options = {
        index: ind, // start at first slide
        showHideOpacity:true,
        getThumbBoundsFn:false,
        bgOpacity:0.9,
        closeOnScroll:false,
        shareButtons: [
            {id:'facebook', label:'Facebook', url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'},
            {id:'twitter', label:'Твитнуть', url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
            {id:'pinterest', label:'Pinterest', url:'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'},
            {id:'download', label:'Скачать', url:'{{raw_image_url}}', download:true}
        ]
    };
    var items = [];
    var image=new Image();
    $(".js_img").each(function() {
        var src=$(this).attr('src');
        image.src=src;
        var w=image.width;
        var h=image.height;
        items.push({src:src, w:w, h:h});
    });

    // Initializes and opens PhotoSwipe
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};
$('.js_des_list_img').hover(function(){
        $(this).find('.js_title_bg').css('opacity','0.7');
        $(this).find('.js_title_hidden').css({ "bottom": "20px", "opacity": "1" });
    },
    function(){
        $(this).find('.js_title_bg').css('opacity','0');
        $(this).find('.js_title_hidden').css({ "bottom": "-20px", "opacity": "0" });
    }
);
if($('.gallery-thumbs').length){
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
}