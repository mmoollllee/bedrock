var didLoadSortable = false

jQuery(window).ready(function () {

   textareaSmallRemoveInlineHeight();

   jQuery('#acf-pagebuilder .values')
      .find('.layout')
      .each(function () {
         mg_acf_title_insert(jQuery(this))

         mg_acf_hierarchie(jQuery(this))

         mg_acf_hide_fields(jQuery(this))

         mg_acf_options(jQuery(this))

         jQuery(this).addClass('-collapsed')
      })

   
   if (typeof acf !== 'undefined') {
      acf.add_action('ready', function ($el) {
         jQuery('.mg_acf_span_title').on('click', function (e) {
            jQuery(this).parent().find('.mg_acf_input_title').focusTextToEnd()
         })

         acf.add_action('append', function( $el ){
            mg_acf_title_insert($el)

            mg_acf_hierarchie($el)

            mg_acf_options($el)

            mg_acf_hide_fields($el)
         });
         

         // jQuery('.block-editor-block-list__layout').arrive(
         //    '.acf-builder-title .values .layout',
         //    function () {
         //       mg_acf_title_insert(jQuery(this))

         //       mg_acf_hide_fields(jQuery(this))
         //    },
         // )

         acf.add_action('sortstart', function( $el ){
               console.log('sortstart');
            if (!didLoadSortable) {
               didLoadSortable = true

               var sortableElement = jQuery('#acf-pagebuilder').find('.ui-sortable');

               // fire sortable...
               sortableElement.sortable('option', 'grid', [20, 10]);

               // ... & action
               sortableElement.on('sortactivate', function (event, ui) {
                     console.log('sortactivate');
                     ui.item.on('mousemove', function (event, x) {
                        if (event.which == 1) {
                           var gridSteps = 20;
                           var dragLeftValue = parseInt(jQuery(this).css('left').replace(/px/g, ''));
                           var dragMarginLeftValue = parseInt(Math.round(jQuery(this).css('margin-left').replace(/px/g, '')));
                           var dragHierarchieValue = (dragLeftValue + dragMarginLeftValue) / gridSteps;
                           
                           var inputHierarchieValue = parseInt(jQuery(this).prev().find('.hierarchie input').val())

                           if (dragHierarchieValue >= 0 && dragHierarchieValue <= inputHierarchieValue + 1) {
                              ui.item.find('.hierarchie input').val(dragHierarchieValue)
                           }
                        }
                     })

                     ui.item.on('mouseup', function (event) {
                        var newHierarchieValue = parseInt(ui.item.find('.hierarchie input').val());
                        jQuery(this).attr({'data-hierarchie': newHierarchieValue,})
                     })
                  })
            }
         })

      }, 100)
   }
})

// Adjust Field size
function inputAdjust(elements, offset, min, max) {
   // Initialize parameters
   offset = offset || 0
   min = min || 0
   max = max || Infinity
   elements.each(function () {
      var element = jQuery(this)

      // Add element to measure pixel length of text
      var id = btoa(Math.floor(Math.random() * Math.pow(2, 64)))
      var tag = jQuery('<span id="' + id + '">' + element.val() + '</span>')
         .css({
            display: 'none',
            'font-family': element.css('font-family'),
            'font-size': element.css('font-size'),
         })
         .appendTo('body')

      // Adjust element width on keydown
      function update() {
         // Give browser time to add current letter
         setTimeout(function () {
            // Prevent whitespace from being collapsed
            tag.html(element.val().replace(/ /g, '&nbsp'))

            // Clamp length and prevent text from scrolling
            var size = Math.max(min, Math.min(max, tag.width() + offset))
            if (size < max) element.scrollLeft(0)

            // Apply width to element
            element.width(size)
         }, 0)
      }
      update()
      element.keydown(update)
   })
}

function mg_acf_title_insert(e) {
   e = jQuery(e)
   titleinput = e.find('.title input')
   if (!titleinput.length) {
      return false
   }

   title = titleinput.val()

   titlearea = e.find('.acf-fc-layout-handle')

   if (e.find('.mg_acf_input_title').length) {
      e.find('.mg_acf_input_title').val(title)
   } else {
      jQuery(
         "<div class='mg_acf_top_title_field'><input type='text' class='mg_acf_input_title adjust' value='" +
            title +
            "'></div>",
      ).insertBefore(titlearea)

      //jQuery("<span class='mg_acf_title'>" + title + "</span>").insertAfter(".afc-layout-order");
      // titlearea.find(".acf-fc-layout-order").;
   }

   e.find('.mg_acf_input_title').on('input', function (event) {
      jQuery(this)
         .parents('.layout')
         .find('.title input')
         .val(jQuery(this).val())
   })

   inputAdjust(jQuery('input.adjust'), 10, 100, 500)
}

function mg_acf_options(e) {
   e = jQuery(e)

   elements = e.find('[data-name="aktiv"], [data-name="redaktionell"]')

   elements.each(function () {
      value = jQuery(this).find(".acf-input [id^='acf-field']")
      i = 'data-' + jQuery(this).attr('data-name')

      //e.attr(i, value.prop( "checked" ) );

      value
         .change(function () {
            i = 'data-' + jQuery(this).parents('[data-name]').attr('data-name')

            jQuery(this)
               .parents('.layout')
               .attr(i, jQuery(this).prop('checked'))
         })
         .change()
   })
}

function mg_acf_hierarchie(e) {
   e = jQuery(e)

   hierinput = e.find('.hierarchie input')

   hier = parseInt(hierinput.val())

   e.attr({ 'data-hierarchie': hier })

   hierinput.on('input', function () {
      mg_acf_hierarchie_change(jQuery(this))
   })
}

function mg_acf_title_change(e) {
   e = jQuery(e)

   title = e.val()

   e.parents('.layout').find('.mg_acf_input_title').val(title)
}

function mg_acf_hierarchie_change(e) {
   e = jQuery(e)

   hier = e.val()

   e.parents('.layout').attr({ 'data-hierarchie': hier })
}

function mg_acf_hide_fields(e) {
   e = jQuery(e)

   var hierarchie = e.find('.hierarchie')
   hierarchie.css('display', 'none')

   var title = e.find('.title')
   title.css('display', 'none')
}

;(function ($) {
   $.fn.focusTextToEnd = function () {
      this.focus()
      var $thisVal = this.val()
      this.val('').val($thisVal)
      return this
   }
})(jQuery)


function textareaSmallRemoveInlineHeight() {
   jQuery('.textarea-small').find('textarea').removeAttr('style');
}
