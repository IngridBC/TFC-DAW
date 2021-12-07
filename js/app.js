const btnMenu= document.querySelector('.menu-btn');
const navigation = document.querySelector('.navigation');
        
btnMenu.addEventListener('click', ()=>{
    btnMenu.classList.toggle('active');
    navigation.classList.toggle('active');
});

const btns=document.querySelectorAll('.nav-btn');
const slides= document.querySelectorAll('.video-slide');
const contents= document.querySelectorAll('.content');

var sliderNav=function(manual){
    btns.forEach((btn)=>{
    btn.classList.remove('active');
    });

    slides.forEach((slide)=>{
        slide.classList.remove('active');
    });

    contents.forEach((content)=>{
        content.classList.remove('active');
    });

    btns[manual].classList.add('active');
    slides[manual].classList.add('active');
    contents[manual].classList.add('active');
}

btns.forEach((btn,i)=>{
    btn.addEventListener('click', ()=>{
        sliderNav(i);
    });
});

/*-------------COUNTER--------- */

jQuery(document).ready(function( $ ){
    $('.time-counter').counterUp({
        delay:10,
        time:1200
    });
});


/*-------------SLIDER CAROUSEL TESTIMONIES--------- */
/*
$(".slider").owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
*/