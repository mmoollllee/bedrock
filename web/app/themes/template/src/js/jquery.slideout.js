
function closeSlideout() {
   document.body.classList.remove('slideout-open');
   jQuery('#wrapper').off('click')
}
export default () => {

   jQuery('#navtoggle').on('click', () => {
         document.body.classList.add('slideout-open');
         setTimeout(() => {
            jQuery('#wrapper').on('click', function () {
               closeSlideout();
            })
         },1000)
   })

   jQuery('#responsivemenu a, #navclose, #responsivemenu button').on('click', () => {
      closeSlideout();
   })

}