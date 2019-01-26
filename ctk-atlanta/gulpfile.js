'use-strict';

// node
const path = require('path');

// utils
const argv = require('yargs');
const segregate = require('gulp-watch');
const ftp = require('vinyl-ftp');
const sequence = require('run-sequence');
const bsync = require('browser-sync');

// general processors
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');

// image processors
const imagemin = require('gulp-imagemin');

// css processors
const postcss = require('gulp-postcss');
const next = require('postcss-cssnext');
const ant = require('postcss-ant');
const cssImport = require('postcss-easy-import');
const nano = require('gulp-cssnano');
const flexbug = require('postcss-flexbugs-fixes');

// js processors
const webpack = require('webpack-stream');

const env = {
  dev: argv.dev || true,
  prod: argv.production || false,
  staging: argv.staging || false,
  distPath: './dpi-spine',
  // devPath: '/home/josh/dev/vvv/www/wordpress-develop/public_html/src/wp-content/themes',
  devPath: 'C:/Users/DPI/Desktop/dev/wordpress/ctk-atlanta/wp-content/themes',
  // devPath: '/home/josh/dev/vagrant-local/www/wordpress-default/public_html/wp-content/themes',
  // devUrl: 'http://src.wordpress-develop.dev/'
  devUrl: 'localhost'
}

/**
* Styles
*/

const browserSupport = [
  "Android 2.3",
  "Android >= 4",
  "Chrome >= 20",
  "Firefox >= 24",
  "Explorer >= 8",
  "iOS >= 6",
  "Opera >= 12",
  "Safari >= 6"
];

const plugins = [
  cssImport(),
  ant(),
  next({
    browsers: browserSupport,
    features: {
      rem: false,
      customProperties: {
        strict: false
      }
    }
  }),
  flexbug()
];

gulp.task('styles', () => gulp.src('./src/styles/style.css')
    .pipe(sourcemaps.init())
    .pipe(postcss(plugins))
    .pipe(nano({discardComments: false, zindex: false}))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(env.distPath))
);

/**
* Javascript
*/
gulp.task('js', () => gulp.src('./src/scripts/js/main.js')
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest(env.distPath + '/scripts/js'))
)

gulp.task('es5-js', () => gulp.src('./src/scripts/js/*.es5.js')
    .pipe(gulp.dest(env.distPath + '/scripts/js'))
);

/**
* Images
*/
gulp.task('images', () => gulp.src('./src/assets/images/*.+(jpg|jpeg|gif|png|svg)')
    .pipe(imagemin())
    .pipe(gulp.dest(env.distPath + '/assets/images'))
);

/**
* Icons
*/
gulp.task('icons', () => gulp.src('./src/assets/icons/*.+(jpg|jpeg|gif|png|svg)')
    .pipe(imagemin())
    .pipe(gulp.dest(env.distPath + '/assets/icons'))
);

/**
* Fonts
*/
// gulp.task('fonts', () => gulp.src('./src/assets/fonts/**/*.+(ttf|woff|woff2|eot|svg)')
//     .pipe(gulp.dest(env.distPath + '/assets/fonts'))
// );

/**
* Migrate php
*/
const phpSrc = './src/**/*.php';
const phpBase = {base: './src'};

gulp.task('migrate', () => gulp.src(phpSrc, phpBase)
    .pipe(segregate(phpSrc, phpBase))
    .pipe(gulp.dest(env.distPath))
);

/**
* Theme screenshot
*/
gulp.task('screenshot', () => gulp.src('./src/screenshot.png')
    .pipe(gulp.dest(env.distPath))
);

/**
* Synchronous actions
*/
gulp.task('sequence', () => sequence(
  'styles',
  'js',
  'images',
  'icons',
  'migrate',
  'screenshot',
  'ftp'
));

/**
* Browsersync init
*/
gulp.task('bsync', () => bsync.init({proxy: env.devUrl}));

/**
* Local deployment
*/
const distSrc = './dpi-spine/**/*';
const distBase = {base: './dpi-spine'};

gulp.task('localDeploy', () => gulp.src(distSrc, distBase)
    .pipe(segregate(distSrc, distBase))
    .pipe(gulp.dest(env.devPath + '/dpi-spine'))
    .pipe(bsync.stream())
);

/**
* Ftp deployment
*/
gulp.task('ftp', function() {

  const ftpConfig = {
    user: '',
    password: '',
    host: '',
    port: '',
    remoteFolder: './public_html/wp-content/themes',
    glob: ['./dpi-spine/**']
  }

  const connection = ftp.create({
      host: ftpConfig.host,
      port: ftpConfig.port,
      user: ftpConfig.user,
      password: ftpConfig.password,
      parallel: 10,
      log(err) {
        console.log(err);
      },
      debug(debug) {
        console.log(debug);
      }
    });

  return gulp.src(ftpConfig.glob, {base: '.', buffer: false})
             .pipe(connection.newer(ftpConfig.remoteFolder))
             .pipe(connection.dest(ftpConfig.remoteFolder))
});

/**
* Watch tasks
*/
gulp.task('watch', function() {
  // styles
  gulp.watch('./src/styles/**/*.css', ['styles']);

  // js scripts
  gulp.watch('./src/scripts/js/**/*.js', ['js']);

  //php scripts
  gulp.watch('./src/scripts/php/**/*.php', ['migrate']);

  // images
  gulp.watch('./src/assets/images/*', ['images']);

  // icons
  gulp.watch('./src/assets/icons/*', ['icons']);

  // dev dist
  if (env.dev) {
    gulp.watch('./dpi-spine/**/*', ['localDeploy']);
  }
});

/**
* Synchronous actions
*/
gulp.task('sync', function() {
  sequence(
    'styles',
    'js',
    'es5-js',
    'images',
    'icons',
    'migrate',
    'screenshot',
    'ftp'
  )
});

/**
* Gulp commands
*/
gulp.task('build-styles', ['styles']);

gulp.task('build', ['styles', 'js', 'es5-js', 'images', 'icons', 'migrate', 'screenshot']);

gulp.task('build-watch', ['build', 'watch']);

gulp.task('dev', ['build', 'bsync', 'localDeploy', 'watch']);

gulp.task('deploy', ['sequence']);

gulp.task('default', ['dev']);
