// webpack.mix.js

let mix = require('laravel-mix');

mix
   .options({
      // processCssUrls: false // disables rewriting URLs and copying into dist/images/
   });
   .js('src/app.js', 'dist')
   .sass('src/app.scss', 'dist')
  //  .setPublicPath('dist');