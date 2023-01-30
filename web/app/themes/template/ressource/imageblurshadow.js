function imageblurshadow() {
   /*
	elements = jQuery("main figure:not('.hidden')").find("img");
	elements.each(function() {
		self = jQuery(this);
		self.wrap('<span class="blurshadow"></span>');
		self.clone().addClass('blured').prependTo(self.parent())
	}); */

   elements = jQuery('a.button')
   elements.each(function () {
      self = jQuery(this)
      self.wrapInner('<span></span>')
   })
}
