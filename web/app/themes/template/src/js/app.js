/**
 * External Dependencies
 */

import { ConsentControl, ConsentMessage } from 'consent-control'
import bodyScroll from './jquery.body-scroll'; 
import hashScroll from './jquery.hash-scroll'; 
import menuTouchHover from './jquery.menu-touch-hover';
import slideout from './jquery.slideout';
import Fancybox from './fancybox';

$(() => {
  bodyScroll();
  hashScroll();
  menuTouchHover();
  slideout();
  Fancybox();


  const iframes = document.querySelectorAll(
    'iframe[data-src-name="Google Maps"]'
  )
  iframes.forEach((e) => {
      ConsentMessage.new(
        'functional',
        e,
        {
          template: {
            strings: {
               buttonLabel: 'Google Map laden',
            },
      
            main: `<div class="consent-message"><button class="button confirm">{buttonLabel}</button><p>{message}</p></div>`,
          }
        }
      )
  })
});
 