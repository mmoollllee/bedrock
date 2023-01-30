export default function() {
   var element = $('#header .menu>li>a');
   element.on('touchstart', function(e) {
      var parent = $(this).parent();
      if (!parent.hasClass('is-hover')) {
         e.preventDefault();
         $('body').find('.is-hover').removeClass('is-hover');
         parent.addClass('is-hover');
         $("#header").addClass('is-hover');
      }
   });
   $('body').on('click', function() {
      $(this).find('.is-hover').removeClass('is-hover');
   })
}
