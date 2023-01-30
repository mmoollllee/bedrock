/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/jquery.backend-svg.js":
/*!**************************************!*\
  !*** ./src/js/jquery.backend-svg.js ***!
  \**************************************/
/***/ (() => {

var mediaGridObserver = new MutationObserver(function (mutations) {
  for (var i = 0; i < mutations.length; i++) {
    for (var j = 0; j < mutations[i].addedNodes.length; j++) {
      element = jQuery(mutations[i].addedNodes[j]);

      if (element.attr('class')) {
        elementClass = element.attr('class');

        if (element.attr('class').indexOf('attachment') != -1) {
          attachmentPreview = element.children('.attachment-preview');

          if (attachmentPreview.length != 0) {
            if (attachmentPreview.attr('class').indexOf('subtype-svg+xml') != -1) {
              var handler = function (element) {
                jQuery.ajax({
                  url: script_vars.AJAXurl,
                  type: "POST",
                  dataType: 'html',
                  data: {
                    'action': 'svg_get_attachment_url',
                    'attachmentID': element.attr('data-id')
                  },
                  success: function success(data) {
                    if (data) {
                      element.find('img').attr('src', data);
                    }
                  }
                });
              }(element);
            }
          }
        }
      }
    }
  }
});
var attachmentPreviewObserver = new MutationObserver(function (mutations) {
  for (var i = 0; i < mutations.length; i++) {
    for (var j = 0; j < mutations[i].addedNodes.length; j++) {
      var element = jQuery(mutations[i].addedNodes[j]);
      var onAttachmentPage = false;

      if (element.hasClass('attachment-details') || element.find('.attachment-details').length != 0) {
        onAttachmentPage = true;
      }

      if (onAttachmentPage == true) {
        var urlLabel = element.find('label[data-setting="url"]');

        if (urlLabel.length != 0) {
          var value = urlLabel.find('input').val();
          element.find('.details-image').attr('src', value);
        }
      }
    }
  }
});
jQuery(document).ready(function () {
  mediaGridObserver.observe(document.body, {
    childList: true,
    subtree: true
  });
  attachmentPreviewObserver.observe(document.body, {
    childList: true,
    subtree: true
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!***************************!*\
  !*** ./src/js/backend.js ***!
  \***************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _jquery_backend_svg__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./jquery.backend-svg */ "./src/js/jquery.backend-svg.js");
/* harmony import */ var _jquery_backend_svg__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_jquery_backend_svg__WEBPACK_IMPORTED_MODULE_0__);
/**
 * External Dependencies
 */

})();

/******/ })()
;