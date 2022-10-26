const mix = require('laravel-mix');

mix.js('./resources/js/app.js', 'public/js');

mix.vue();

mix.postCss('./resources/css/app.css', 'public/css', [
    require('tailwindcss'),
]);

mix.webpackConfig(require('./webpack.config'));
