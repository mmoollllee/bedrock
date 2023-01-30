function googletagmanager() {
   var gtm = document.createElement('script');
   gtm.type = 'text/javascript';
   gtm.async = true;
   gtm.src = 'https://www.googletagmanager.com/gtag/js?id=G-XYZ';
   var s = document.getElementsByTagName('script')[0];
   s.parentNode.insertBefore(gtm, s);
   window.dataLayer = window.dataLayer || [];
 
   function gtag() {
     dataLayer.push(arguments);
   }
   gtag('js', new Date());
   gtag('config', 'G-XYZ', {'anonymize_ip': true});
}