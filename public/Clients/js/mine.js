$(document).ready(function () {
    (
        function(){
            configData = JSON.parse(localStorage.getItem('config')) ?? null;
            if(configData){
                for(let key in configData){
                    if(key === 'background-color'){
                        $('.main-read').css(key, configData[key]);
                        $('.btn-watch-widget').css(key, configData[key]);
                        $('.header').css(key, configData[key]);
                        $('body').css(key, configData[key]);
                    }else{
                        
                        if(key === 'line-height'){
                            $('.wrapper').css(key,configData[key] + '%');
                        }else if(key === 'font-family'){
                            $('.watch-content > p').css(key,configData[key]);
                        }else{
                            $('.wrapper').css(key,configData[key]);
                        }
                    }
                }
            }
        }
    )();
    // Carousel
    // $('.carousel-recomment').owlCarousel({
    //     rtl: false,
    //     loop: true,
    //     margin: 10,
    //     dots: false,
    //     nav: true,
    //     // navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         600: {
    //             items: 3
    //         },
    //         1000: {
    //             items: 3
    //         }
    //     }
    // })

    // $('.owl-next').html('<div class="owl-btn-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>');
    // $('.owl-prev').html('<div class="owl-btn-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>');


    // $('.carousel-high').owlCarousel({
    //     rtl: false,
    //     loop: true,
    //     margin: 10,
    //     dots: false,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         600: {
    //             items: 3
    //         },
    //         1000: {
    //             items: 3
    //         }
    //     }
    // })
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



})
$('.icon-user').on('click', function () {
    $('.box-user').css('display', 'block')
})
$('.modal-user-exit').on('click', function () {
    $('.box-user').css('display', 'none')

})

//  watch
if ($(".select").length > 0) {
    $(".select").select2({
        minimumResultsForSearch: -1,
        width: "100%",
    });
}

const handleConfig = () => {
    let config = JSON.parse(localStorage.getItem('config')) ?? {};

    return {
        addConfig(key, value) {
            if (typeof config === 'string') {
                config = JSON.parse(localStorage.getItem('config'))
            }
            config[key] = value;
        },
        updateConfig(key, value) {
            if (typeof config === 'string') {
                config = JSON.parse(localStorage.getItem('config'))
            }
            config[key] = value;
        },
        storeConfig(key, value) {
            config = JSON.stringify(config);
            localStorage.setItem('config', config);
        }
    }
}

const handleLocal = handleConfig();



$('.color-item').on('click', function () {
    let color = localStorage.getItem('config');
    if (!color) {
        color = $(this).val();
        handleLocal.addConfig('background-color',color);
        handleLocal.storeConfig();
    } else {
        color = $(this).val();
        handleLocal.updateConfig('background-color',color);
        handleLocal.storeConfig();
    }
    $('.main-read').css('background-color', color);
    $('.btn-watch-widget').css('background-color', color);
    $('.header').css('background-color', color);
    $('body').css('background-color', color);
})

$('.font-read').on('change', function () {
    let font = localStorage.getItem('config');

    if (!font) {
        font = $(this).val();
        handleLocal.addConfig('font-family',font);
        handleLocal.storeConfig();
    } else {
        font = $(this).val();
        handleLocal.updateConfig('font-family',font);
        handleLocal.storeConfig();
    }
    $('.watch-content > p').css('font-family', font)
})

$('.exit-conf').on('click', function () {
    $('.config-chapters').css('display', 'none')
})

$('.btn-conf').on('click', function () {
    $('.list-chapters').css('display', 'none')
    $('.config-chapters').css('display', 'revert')

})

$('.exit-chapter').on('click', function () {
    $('.list-chapters').css('display', 'none')
})

$('.btn-chapter').on('click', function () {
    $('.config-chapters').css('display', 'none')
    $('.list-chapters').css('display', 'revert')
})

function btnAdd(elementValue, css, numberAdd, limit, etc = '') {
    let val = $('.' + elementValue).text()
    val = parseInt(val);
    val += numberAdd
    if (val > limit) {
        return false;
    }
    if (localStorage.getItem(`${css}`)) {
        $('.' + 'main-read').css(`${css}`, val);
        handleLocal.updateConfig(`${css}`, val);
        // handleLocal.storeConfig();
        val = val.toString();
        $('.' + elementValue).text(val);
        // localStorage.setItem(`${element}.${css}`, `${val}`);
    } else {
        $('.' + 'main-read').css(css, val + etc)
        console.log(`${css}`);
        handleLocal.addConfig(`${css}`, val);
        handleLocal.storeConfig();
        val = val.toString();
        $('.' + elementValue).text(val);
    }
}
function btnRemove(element, elementValue, css, numberAdd, limit, etc = '') {
    let val = $('.' + elementValue).text()
    val = parseInt(val);
    val -= numberAdd
    if (val < limit) {
        return false;
    }
    if (localStorage.getItem(`${css}`)) {
        $('.' + 'main-read').css(`${css}`, val);
        handleLocal.updateConfig(`${css}`, val);
        val = val.toString();
        $('.' + elementValue).text(val);
    } else {
        $('.' + 'main-read').css(css, val + etc)
        console.log(`${css}`);
        handleLocal.addConfig(`${css}`, val);
        handleLocal.storeConfig();
        val = val.toString();
        $('.' + elementValue).text(val);
    }
}

