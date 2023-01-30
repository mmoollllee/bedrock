var mgCookieBannerStrings = {
   allCookiesdeleted: 'Alle Cookies wurden erfolgreich gelöscht.',
};

/**
 * Save a value to the cookiebanner Cookie
 * @param {String || Array} cvalue The value to be toggled
 */
 function setCookieBannerCookie(cvalue) {
   var ccurrent = getCookieBannerCookie() || [];
 
   cvalue = Array.isArray(cvalue) ? cvalue : [cvalue];
   
   for (var i = 0; i < cvalue.length; i++) {
      var item = cvalue[i];
      
      // Get index of current value in current cookie
      var index = ccurrent.indexOf(item);
      // and push or splice from ccurrent
      if (index === -1) {
         ccurrent.push(item);
      } else {
         ccurrent.splice(item, 1);
      }
   }
   
   var domain = window.location.hostname;
   var exdays = 365;
   var d = new Date();
   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
   var expires = "expires="+d.toUTCString();
   document.cookie = "cookiebanner=" + cvalue.join('|') + ";" + expires + ";path=/;samesite=lax;domain=" + domain;
 }
 
 /**
 * Get values from Cookie 
 * @returns {Array}
 */
 function getCookieBannerCookie() {
   var name = "cookiebanner=";
   var ca = document.cookie.split(';');
   for(var i = 0; i < ca.length; i++) {
     var c = ca[i];
     while (c.charAt(0) == ' ') {
       c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
       return c.substring(name.length, c.length).split('|');
     }
   }
   return false;
 }
 
 /**
 * Delete all Cookies from this page
 */
 function deleteAllCookies() {
  var cookies = document.cookie.split("; ");
  for (var c = 0; c < cookies.length; c++) {
    var d = window.location.hostname.split(".");
    while (d.length > 0) {
      var cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
      var p = location.pathname.split('/');
      document.cookie = cookieBase + '/';
      while (p.length > 0) {
        document.cookie = cookieBase + p.join('/');
        p.pop();
      }
      d.shift();
    }
  }
   window.localStorage.clear()
   alert(mgCookieBannerStrings.allCookiesdeleted);
 }
 
 
 /**
 * Initalise enabled services
 * @param {Array} ccookie Current Cookie Data with services to be enabled
 */
 function runServices(ccookie) {
    if (ccookie && ccookie.includes('analytics')) {
       if ( typeof googleanalytics === 'function' ) {
          googleanalytics();
       }
       if ( typeof googletagmanager === 'function' ) {
          googletagmanager();
       }
    }
    if (ccookie && ccookie.includes('functional')) {
       if ( typeof privacyFrameDisable === 'function' ) {
          privacyFrameDisable();
       }
    } else {
       if ( typeof privacyFrameInit === 'function' ) {
          privacyFrameInit();
       }
    }
 }
 
 /**
 * (Re-)open the Cookie Banner with saved preferences if available
 */
 function showCookieBanner() {
 
   var cookiebannerEl = jQuery("#cookie-banner");
   var ccookie = getCookieBannerCookie();
 
   if (ccookie) {
      ccookie.forEach(function(i) {
         cookiebannerEl.find('input[value=' + i + ']').prop('checked', 'checked');
      })
   }
 
   cookiebannerEl.removeClass("hide");
 }
 
 
 window.addEventListener("load", function () {
   
   var ccookie = getCookieBannerCookie();
 
  if (!ccookie) {
      showCookieBanner();
 
      /**
       * Hide Privacy Controls on Privacy-Page.
       * Privacy Controls might look like this:
       * <h3>Data collection</h3>
       * <p>Click the following button to edit your settings and enable or disable different services we use for a better user experience</p>
       * <div id="cookie-banner--reopen">
       *   <p>
       *     <a href="#" title="Cookie & Service Settings">Click to change settings.</a>
       *   </p>
       * </div>
       */
      jQuery("#consent-in, #consent-out, .cookie-banner--reopen").hide();
 
  }
  runServices(ccookie);
 
  /**
   * Bind Event to Control Button on Privacy Page
   */
  jQuery("#cookie-banner--reopen a").click(function (e) {
    e.preventDefault();
    showCookieBanner();
   })
   
   /**
    * Bind Event to Submit Button
    */
   jQuery("#cookie-banner--submit").click(function (e) {
      e.preventDefault();
      ccookie = [];
      jQuery("#cookie-banner").find("input").each(function() {
         if (jQuery(this).is(':checked')) {
            ccookie.push(jQuery(this).val())
         }
      })
      setCookieBannerCookie(ccookie);
      jQuery("#cookie-banner").addClass("hide is-collapsed");
      runServices(ccookie);
   });
   
   /**
    * Bind Event to Allow All Button
    */
   jQuery("#cookie-banner--submit-all").click(function (e) {
      e.preventDefault();
      ccookie = [];
      jQuery("#cookie-banner").find("input").each(function() {
         ccookie.push(jQuery(this).val())
      })
      setCookieBannerCookie(ccookie);
      jQuery("#cookie-banner").addClass("hide is-collapsed");
      runServices(ccookie);
   });
 
   
   /**
    * Bind Event to Settings Button
    */
   jQuery(".cookie-banner--settings").click(function (e) {
      e.preventDefault();
      jQuery("#cookie-banner").toggleClass("is-collapsed");
   });
 
   
   /**
    * Bind Event to Reset Button
    */
   jQuery("#cookie-banner--reset").click(function (e) {
      e.preventDefault();
      deleteAllCookies();
      jQuery(this).attr("disabled", "disabled")
   });
 
 
 });
 