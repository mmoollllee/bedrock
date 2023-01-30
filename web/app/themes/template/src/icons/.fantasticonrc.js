module.exports = {
  inputDir: './src/icons/svg', // (required)
  outputDir: './public/fonts', // (required)
  name: 'kohn-icon-font',
  fontTypes: ['ttf', 'woff', 'woff2', 'eot', 'svg'],
  assetTypes: ['css'],
  fontsUrl: './fonts',
  templates: {
    css: './src/icons/icon-font-template.hbs'
  },
  normalize: true,
  descent: 45,
  fontHeight: 1000,
  pathOptions: {
    json: './src/icons/codepoints.json',
    css: './src/scss/main/vendor/_icons.scss'
  }
};