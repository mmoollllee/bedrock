import 'jquery-on-screen';

function scrollto(target) {
   var position = jQuery(target).offset()
   //position = jQuery("[name='"+target.split("#")[1]+"']").offset();

   jQuery(window.opera ? 'html' : 'html, body').animate(
      {
         scrollTop: position.top + 'px',
      },
      500,
   )

   jQuery('body')
      .stop()
      .animate(
         {
            scrollTop: position.top + 'px',
         },
         500,
      )
}

export default function() {
   jQuery("a[href*='#'][href!='#']").on("click", function (e) {
      var target = jQuery(this).attr('href').split('#')
      if (
         target[0] == '' ||
         window.location.href.split('#')[0] == target[0] ||
         window.location.pathname == target[0]
      ) {
         e.preventDefault()
         scrollto('#' + target[1])
      }
   })

   var hash = window.location.hash
   if (hash) {
      setTimeout(function () {
         window.scrollTo(0, 0), scrollto(hash);
         jQuery("#wrapper").css({"position": "static"});
         setTimeout(function() {
            jQuery("#wrapper").css({"position": "relative"});
         },100)
      }, 200)
   }
}