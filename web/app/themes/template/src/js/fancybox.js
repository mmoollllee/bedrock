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


   const AutoSliderEls = document.querySelector(".carousel");
   var AutoSlider
   if (AutoSliderEls) {
      AutoSlider = new Carousel(AutoSliderEls, {
         infinite: true,
         center: false,
         dragFree: true,
         Navigation: {
            prevTpl: '<i class="icon-arrow-left"></i>',
            nextTpl: '<i class="icon-arrow-right"></i>',
         },
         Dots: false,
         Autoplay: false,
      });
   }

   const refreshSlider = setInterval(() => {
      if(AutoSlider) {
         AutoSlider.updatePage();
         clearInterval(refreshSlider);
      }
   }, 1000);

   document.onreadystatechange = () => {
      if (document.readyState === 'complete') {
         AutoSlider.updatePage();
         clearInterval(refreshSlider);
      }
   };

}
