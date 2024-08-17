"use strict";
document.addEventListener("DOMContentLoaded", function () {

 

// Company slider
      let heroServiceSlider = document.querySelector('.hero-service-carousel');
    if(heroServiceSlider){
      const swiper = new Swiper(heroServiceSlider, {
        loop: true,
        speed:12000,
        autoplay: {
          delay:1,
        },
        spaceBetween: 24,

        slidesPerView: 1,
   
        clickable: true,
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          300: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          350: {
            slidesPerView: 1.3,
            spaceBetween: 10,
          },
          450: {
            slidesPerView:1.5,
            spaceBetween: 10,
          },
          700: {
            slidesPerView:2,
            spaceBetween: 10,
          },
          1100: {
            slidesPerView: 3,
            spaceBetween: 24,
            centeredSlides: true,
          },
        }
      });
    }

     // expert-slider-carousel
     let expertSliderImg = document.querySelectorAll('.expert-slider-carousel');
     expertSliderImg && expertSliderImg.forEach(function(expertSliderImg) {
       var swiper = new Swiper(expertSliderImg, {
        loop: true,
        slidesPerView: 1,
        slidesToShow: 1,
        paginationClickable: true,
        spaceBetween: 12,
         navigation: {
           nextEl: expertSliderImg.querySelector('.ara-next'),
           prevEl: expertSliderImg.querySelector('.ara-prev'),
         },
         
       });
     });

          // expert-slider-carousel
          let expertSlider2 = document.querySelectorAll('.expert2-slider-carousel');
          expertSlider2 && expertSlider2.forEach(function(expertSlider2) {
            var swiper = new Swiper(expertSlider2, {
             loop: true,
             slidesPerView: 1,
             centeredSlides: false,
             spaceBetween: 24,
             navigation: true,
             scrollbar: {
              el: ".swiper-scrollbar",
            },
            breakpoints: {
  
              600: {
                slidesPerView:2,
                spaceBetween: 10,
              },
              950: {
                slidesPerView: 3,
                spaceBetween: 24,
                centeredSlides: true,
              },
              1300: {
                slidesPerView: 4,
                spaceBetween: 24,
        
              },
            }
            });
          });


          // expert-slider-carousel
          let homeFourHeroSlider = document.querySelectorAll('.home-four-slider-carousel');
          homeFourHeroSlider && homeFourHeroSlider.forEach(function(homeFourHeroSlider) {
            var swiper = new Swiper(homeFourHeroSlider, {
              direction: "vertical",
             loop: true,
             slidesPerView: 4,
             speed:10000,
             autoplay: {
               delay:1,
             },

             breakpoints: {
              0: {
                slidesPerView:13,
                spaceBetween: 10,
              },
              350: {
                slidesPerView:11,
                spaceBetween: 10,
              },

              400: {
                slidesPerView:9,
                spaceBetween: 10,
              },
              500: {
                slidesPerView:8,
                spaceBetween: 10,
              },
              620: {
                slidesPerView:7,
                spaceBetween: 10,
              },
  
              880: {
                slidesPerView:6,
                spaceBetween: 10,
              },
              1150: {
                slidesPerView: 5,
                spaceBetween: 24,
                centeredSlides: true,
              },
              1500: {
                slidesPerView: 4,
                spaceBetween: 24,
        
              },
            }
            });
          });

          // Home theree testimonial slider
      let homeThreeTestimonial = document.querySelector('.home3-testimonial-carousel');
      if(homeThreeTestimonial){
        const swiper = new Swiper(homeThreeTestimonial, {
          loop: true,
          autoplay: {
            delay:3000,
          },
          spaceBetween: 24,
          slidesPerView: 1,
          clickable: true,
          navigation: {
            nextEl: homeThreeTestimonial.querySelector('.ara-next'),
            prevEl: homeThreeTestimonial.querySelector('.ara-prev'),
          },
          pagination: {
            el: ".swiper-pagination",
            clickable:true,
          },
          breakpoints: {
            0: {
              slidesPerView: 1,
              spaceBetween: 24,
            },
            768: {
              slidesPerView:2,
              spaceBetween: 24,
            },
            992: {
              slidesPerView:2,
              spaceBetween: 100,
            },
          }
        });
      }



               // home four testimonial-carousel
     let testimonial4 = document.querySelectorAll('.testimonial4-slider-carousel');
     testimonial4 && testimonial4.forEach(function(testimonial4) {
       var swiper = new Swiper(testimonial4, {
        loop: true,
        slidesPerView: 1,
        slidesToShow: 1,
        paginationClickable: true,
        spaceBetween: 12,
         navigation: {
           nextEl: testimonial4.querySelector('.ara-next'),
           prevEl: testimonial4.querySelector('.ara-prev'),
         },
         
       });
     });




     // expert-slider-carousel
     let loginSlider1 = document.querySelectorAll('.login-slider1-carousel');
     loginSlider1 && loginSlider1.forEach(function(loginSlider1) {
       var swiper = new Swiper(loginSlider1, {
         direction: "vertical",
        loop: true,
        slidesPerView: 1,
        speed:10000,
        autoplay: {
          delay:1,
          reverseDirection:true,
        },

        breakpoints: {
         0: {
           slidesPerView:1,
           spaceBetween: 10,
         },
         
         700: {
           slidesPerView: 2.2,
   
         },
       }
       });
     });

          // expert-slider-carousel
          let loginSlider2 = document.querySelectorAll('.login-slider2-carousel');
          loginSlider2 && loginSlider2.forEach(function(loginSlider2) {
            var swiper = new Swiper(loginSlider2, {
              direction: "vertical",
              reverse:"true",
             loop: true,
             slidesPerView: 1,
             speed:10000,
             autoplay: {
               delay:1,
             },
             breakpoints: {
              0: {
                slidesPerView:1,
              },
              700: {
                slidesPerView: 2.2,
              },
            }
            });
          });



           //initialize aos
AOS.init()

});