import { Fancybox, Carousel } from "@fancyapps/ui";
import { Autoplay } from "@fancyapps/ui/dist/carousel.autoplay.esm.js";
Carousel.Plugins.Autoplay = Autoplay;

export default () => {

   Fancybox.bind('[data-fancybox], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]', {
      Thumbs: {
         autoStart: false,
      },
      on: {
         caption: function (fancybox, carousel, slide) {
            // TODO: Do this without jQuery
            // if (jQuery(this).closest('figure').find('figcaption').html()) {
            //    return jQuery(this).closest('figure').find('figcaption').html()
            // } else {
            //    var caption = jQuery(this).attr('data-caption') || jQuery(this).attr('title') || ''
            //    if (jQuery(this).attr('data-caption') == "") {
            //       caption = ''
            //    }
            //    caption = caption.length ? caption : ''
            //    return caption
            // }
         },
      },
      // Carousel: {
      //    on: {
      //    change: (that) => {
      //       SliderFree.slideTo(myCarousel.findPageForSlide(that.page), {
      //          friction: 0,
      //       });
      //    },
      // },
   });

   Fancybox.bind('a[href*="youtube.com/watch?v"]');
   Fancybox.bind('a[href*="vimeo.com/"]');


   const AutoSliderEls = document.querySelector(".carousel-auto");
   if (AutoSliderEls) {
      const AutoSlider = new Carousel(AutoSliderEls, {
         infinite: true,
         slidesPerPage: 1,
         center: false,
         Navigation: false,
         Dots: false,
         Autoplay: {
            timeout: 3000,
          },
      });
   }

   const SliderFreeEls = document.querySelector(".carousel-free");
   var SliderFree;
   if (SliderFreeEls) {
      SliderFree = new Carousel(SliderFreeEls, {
         infinite: true,
         center: true,
         Navigation: {
            prevTpl: '<i class="icon-arrow-left"></i>',
            nextTpl: '<i class="icon-arrow-right"></i>',
         },
         Dots: false,
         dragFree: false,
         Autoplay: false
         // Autoplay: {
         //    timeout: 4000,
         //  },
      });
   }

   const refreshSlider = setInterval(() => {
      if(SliderFree) {
         SliderFree.updatePage();
         console.log('slider refresehd')
         clearInterval(refreshSlider);
      }
   }, 1000);

   document.onreadystatechange = () => {
      if (document.readyState === 'complete') {
         SliderFree.updatePage();
         clearInterval(refreshSlider);
      }
   };

}
