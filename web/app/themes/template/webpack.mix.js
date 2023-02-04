const mix = require('laravel-mix');


mix
  .setPublicPath('./public')
  .browserSync('zahnarztkorn.test/');

mix
  .sass('src/scss/main.scss', '.')
  .sass('src/scss/editor.scss', '.')
  .sass('src/scss/backend.scss', '.')
  .sass('builder/scss/builder.scss', '.')
  .sass('builder/scss/builder-restrict.scss', '.')
  .options({
    processCssUrls: false,
  });

mix
  .js('src/js/app.js', '.')
  .js('src/js/backend.js', '.')
  .autoload({ jquery: ['$', 'window.jQuery'] })
  // .extract();
