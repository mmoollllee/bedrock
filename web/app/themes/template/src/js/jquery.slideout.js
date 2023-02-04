
function closeSlideout() {
   document.body.classList.remove('slideout-open');
   jQuery('#wrapper').off('click')
}
export default () => {

   jQuery('#navtoggle').on('click', () => {
      if (document.body.classList.contains('slideout-open')) {
         closeSlideout();
         return false
      }
         document.body.classList.add('slideout-open');
         setTimeout(() => {
            jQuery('#wrapper').on('click', function () {
               closeSlideout();
            })
         },500)
   })

   jQuery('#responsivemenu a, #navclose, #responsivemenu button').on('click', () => {
      closeSlideout();
   })

}