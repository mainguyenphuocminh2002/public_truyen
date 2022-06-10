// Carousel
$('.owl-carousel').owlCarousel({
    rtl:false,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

// Circle

const cp1 = new CircleProgress('.progress-1', {
    value: 70,
    max: 100,
})
const cp2 = new CircleProgress('.progress-2', {
    value: 60,
    max: 100,
})
const cp3 = new CircleProgress('.progress-3', {
    value: 90,
    max: 100,
})

// sign in // sign up
$(document).ready(function(){
    $('.icon-user').on('click',function () {
        $('.box-user').css('display','block')
    })
    $('.modal-user-exit').on('click',function () { 
        $('.box-user').css('display','none')

     })
})