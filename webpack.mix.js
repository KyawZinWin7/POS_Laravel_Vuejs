const mix = require('laravel-mix')
const fs = require('fs')
try {
  fs.rmdirSync('public/build', { recursive: true })
} catch (error) {
  //
}

mix
  .setPublicPath('public/build')
  .js('resources/js/app.js', 'js')
  .vue({ version: 2 })
  .sass('resources/sass/app.scss', 'css')
  .version()
  .webpackConfig({
    output: {
      filename: '[name].js',
      chunkFilename: '[name].js',
    },
    optimization: {
      splitChunks: {
        chunks: 'async',
        minSize: 300000,
        minRemainingSize: 0,
        maxSize: 500000,
        minChunks: 1,
      },
    },
    resolve: {
      extensions: ['.js', '.vue'],
      alias: {
        '@': __dirname + '/resources/js',
      },
    },
    module: {
      rules: [
        {
          enforce: 'pre',
          exclude: /node_modules/,
          loader: 'eslint-loader',
          test: /\.(js|vue|html)?$/,
          options: {
            fix: true,
          },
        },
      ],
    },
  })
