const iframes = document.querySelectorAll("iframe[data-src]");

iframes.forEach(function (iframe) {
   const src = iframe.getAttribute('data-src');
   const srcName = iframe.getAttribute('data-src-name') ?? toLocation(src).hostname;

   let message =
      'Diese Inhalte werden extern geladen von <i class="iframe-privacy--source">' + srcName + '</i>.<br />Durch das Aktivieren dieses Inhalts werden Daten wie Ihre IP-Adresse an den externen Server übertragen. Weitere Informationen entnehmen Sie bitte unserer <a href="/datenschutz/" title="Datenschutzerklärung lesen">Datenschutzerklärung</a>.'

   let button = '<button class="btn btn-primary confirm"><span>Inhalte laden</span></button>'

   // if (srcName == 'Youtube' || srcName == 'Vimeo' || srcName == 'www.youtube.com') {
   //    button = '<button class="btn btn-primary confirm"><i class="bi bi-play-circle-fill"></i> Inhalte laden</button>'
   // }

   iframe.setAttribute('data-privacy-iframe', 'true');

   // Wrap iFrame with .iframe-privacy--wrapper
   const wrapper = document.createElement('div');
   wrapper.classList.add('iframe-privacy--wrapper');
   iframe.parentNode.insertBefore(wrapper, iframe);
   wrapper.appendChild(iframe);

   // Insert .iframe-privacy--message with button.confirm
   let messageDiv = document.createElement('div');
   messageDiv.classList.add('iframe-privacy--message');
   messageDiv.innerHTML = button + '<p class="font-80 font-sm-90">' + message + '</p>';
   wrapper.prepend(messageDiv);

   // bind confirm event
   button = messageDiv.querySelector('button.confirm');
   
   button.addEventListener('click', (event) => {
      iframe.setAttribute('src', src);
      messageDiv.remove();
    });

});

function toLocation(url) {
   var a = document.createElement('a')
   a.href = url
   return a
}
