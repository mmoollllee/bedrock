<?php

// add_action( 'wp_enqueue_scripts', function () {
//   wp_enqueue_script( 'cookieconsent-script', get_template_directory_uri() . '/functions/cookiebanner/cookiebanner.js', array('jquery'), false, true );
//   wp_enqueue_script( 'analytics-script', get_template_directory_uri() . '/functions/cookiebanner/analytics.js', array('jquery', 'cookieconsent-script'), false, true );
//   $data = 'var mgCookieBannerStrings = {
//     allCookiesdeleted: "'.__('Alle Cookies wurden erfolgreich gelöscht.', 'wk').'"
//   }';
//   wp_add_inline_script( 'cookieconsent-script', $data, 'after' );
// });

// add_action('wp_footer', cookiebanner_html());

function cookiebanner_html() {
?>
  <aside class="cookie-banner text-center is-collapsed hide" id="cookie-banner">
    <div class="message row bg-white">
        <header class="py-2 col-12">
          <h3><?php _e('Cookies & Dienste', 'mg'); ?></h3>
          <p><?php _e('Diese Webseite nutzt Cookies und externe Dienste.<br /><a href="/datenschutz/">Datenschutzbestimmungen</a> <a href="/impressum/">Impressum</a>', 'mg'); ?></p>
          <button class="collapsed-only cookie-banner--settings button button-small">
            <?php _e('Weitere Informationen', 'mg'); ?>
          </button>
        </header>
        <div class="switches col-12 justify-content-around">
          <div class="custom-control custom-switch col-auto">
              <input id="cookienecessary" disabled="disabled" type="checkbox" checked="" value="necessary"
                class="custom-control-input">
              <label for="cookienecessary" class="custom-control-label">
                <?php _e('Notwendige', 'mg'); ?>
              </label>
              <p class="description">
                <?php _e('Stellt die Funktionalität der Website sicher.', 'mg'); ?>
              </p>
              <ul class="list-unstyled">
                <li>
                    <h4><?php _e('Seiten-Einstellungen', 'mg'); ?></h4>
                    <p class="description">
                      <?php _e('Speichert Ihre Einstellungen in diesem Banner, Cookie <strong>cookiebanner</strong> Speicherdauer 1 Jahr', 'mg'); ?>
                    </p>
                </li>
              </ul>
          </div>
          <div class="custom-control custom-switch col-auto">
              <input id="cookieanalytics" type="checkbox" value="analytics" class="custom-control-input">
              <label for="cookieanalytics" class="custom-control-label">
              <?php _e('Analyse', 'mg'); ?>
              </label>
              <p class="description">
                <?php _e('Erlauben Sie dem Website-Betreiber, das Angebot auf dieser Webseite zu bewerten und zu verbessern.', 'mg'); ?>
              </p>
              <ul class="list-unstyled">
                <li>
                  <h4><?php _e('Google Tag Manager', 'mg'); ?></h4>
                    <p class="description">
                      <?php _e('UA-130587990-1, Cookie <strong>_gat</strong> Speicherdauer 1 Minute', 'mg'); ?>
                    </p>
                </li>
              </ul>
          </div>
          <div class="custom-control custom-switch col-auto">
              <input id="cookiefunctional" type="checkbox" value="functional" class="custom-control-input">
              <label for="cookiefunctional" class="custom-control-label">
                <?php _e('Funktionell', 'mg'); ?>
              </label>
              <p class="description">
                <?php _e('Funktionen für die Darstellung der Inhalte.', 'mg'); ?>
              </p>
              <ul class="list-unstyled">
                <li>
                    <h4>
                      <?php _e('Google Maps', 'mg'); ?>
                    </h4>
                    <p class="description">
                      <?php _e('Stellt eine Karte mit Routenbeschreibung zur Verfügung.', 'mg'); ?>
                    </p>
                </li>
              </ul>
          </div>
        </div>
        <div class="col-12 uncollapsed-only mb-2">
          <button class="btn-link" id="cookie-banner--reset">
            <?php _e('Alle Cookies löschen', 'mg'); ?>
          </button>
        </div>
        <div class="control col-12">
          <button class="cta" id="cookie-banner--submit">
            <?php _e('OK', 'mg'); ?>
          </button>
          <button class="cta" id="cookie-banner--submit-all">
            <?php _e('Alle erlauben', 'mg'); ?>
          </button>

          <div class="w-100 uncollapsed-only"></div>
          <button class="button icon-close uncollapsed-only cookie-banner--settings">
            <?php _e('Schließen', 'mg'); ?>
          </button>
        </div>
    </div>
  </aside>
  <script type="text/javascript">
    var mgCookieBannerStrings = {
        allCookiesdeleted: '<?php _e('Alle Cookies wurden erfolgreich gelöscht.', 'mg'); ?>'
    }
  </script>

<?php
};
