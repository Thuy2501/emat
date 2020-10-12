 var swiper = new Swiper('.slider-emat', {
        slidesPerView: 1,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        centeredSlides: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 1,
            },
        },

        autoplay: {
            delay: 10500,
            disableOnInteraction: false,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var customer = new Swiper('.customer-emat', {
        loop: true,
        slidesPerGroup: 1,
        centeredSlides: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 130,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper2 = new Swiper('.blog-emat', {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        autoplay: {
            delay: 10500,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            '@0.00': {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            '@0.75': {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            '@1.00': {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            '@1.50': {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }

    });

     if ($(window).width() <= 800) {
    
        $(document).ready(function(){
             // $('#navbarNavMenu').mmenu();
              new Mmenu(
                document.querySelector('#navbarNavMenu'),
                {
                    extensions: ['theme-white', 'shadow-page'],
                    counters: true,
                   
                },
               
            );
             $('.removeLogo').click(function(event) {
               $('.LogoEmat').children().hide('700', function() {
                   $(this).addClass('animated  ', 'fadeOutRight');
               });
             });
              $('.mm-wrapper__blocker').click(function (argument) {
                  $('.LogoEmat').children().show('700', function() {
                            $(this).removeClass('fadeOutRight ');
                           $(this).addClass('fadeInRight ');
                       });
                })
            })
       

      }
$('.counter').countUp();

var swiper3 = new Swiper('.slider-class', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2000,
        },
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        breakpoints: {
            '@0.00': {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            '@0.75': {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            '@1.00': {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            '@1.50': {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        }

    });
