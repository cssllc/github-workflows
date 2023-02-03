const mix = require('laravel-mix')
require('@tinypixelco/laravel-mix-wp-blocks')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

mix.setPublicPath('./dist')

mix.browserSync({
  proxy: 'https://growwithom.test',
  host: 'https://growwithom.test',
  open: 'external',
  https: {
    key: '/Users/kenny/.config/valet/Certificates/growwithom.test.key',
    cert: '/Users/kenny/.config/valet/Certificates/growwithom.test.crt',
  },
  files: ['*.php', '**/*.php', '*.js', '**/*.js', '*.js', '**/*.css', '*.css'],
})

mix.sass('resources/assets/styles/app.scss', 'styles').purgeCss({
  whitelist: require('purgecss-with-wordpress').whitelist,
  whitelistPatterns: require('purgecss-with-wordpress').whitelistPatterns,
})

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      vue$: 'vue/dist/vue.esm.js',
      '@': __dirname + '/resources/js/components',
    },
  },
})

mix
  .js('resources/assets/scripts/app.js', 'scripts')
  .js('resources/assets/scripts/customizer.js', 'scripts')
  .blocks('resources/assets/scripts/editor.js', 'scripts')
  .extract()

mix
  .copyWatched('resources/assets/images/**', 'dist/images')
  .copyWatched('resources/assets/fonts/**', 'dist/fonts')

mix.autoload({
  jquery: ['$', 'window.jQuery'],
})

mix.options({
  processCssUrls: false,
})
