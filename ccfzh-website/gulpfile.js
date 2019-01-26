'use-strict';

// utils
const argv = require('yargs');
const segregate = require('gulp-watch');

// general processors
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const ftp = require('vinyl-ftp');
const sequence = require('run-sequence');
const bsync = require('browser-sync');

// image processors
const imagemin = require('gulp-imagemin');

// css processors
const postcss = require('gulp-postcss');
const autoprefixer = require('gulp-autoprefixer');
const lost = require('lost');
// const smartImport = require('postcss-smart-import');
// const cssnext = require('postcss-cssnext');
const sass = require('gulp-sass');
const nano = require('gulp-cssnano');
const flexbug = require('postcss-flexbugs-fixes');

// js processors
const webpack = require('webpack-stream');

const env = {
  prod: argv.production || false,
  staging: argv.staging || false,
  dev: argv.dev || true,
  distPath: './dpi-spine',
  devPath: 'A:/dev/vagrant-local/www/wordpress-default/wp-content/themes',
  devUrl: 'http://local.wordpress.dev/'
};

/**
* Styles
*/
const plugins = [
  lost(),
  flexbug()
];

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

gulp.task('styles', () => gulp.src('./src/styles/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(postcss(plugins))
    .pipe(autoprefixer({browsers: browserSupport}))
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
* Migrate php
*/
const phpSrc = './src/**/*.php';
const phpBase = {base: './src'};

gulp.task('migrate', () => gulp.src(phpSrc, phpBase)
    .pipe(segregate(phpSrc, phpBase))
    .pipe(gulp.dest(env.distPath))
);

/**
* Migrate dist onto vvv
*/
const distSrc = './dpi-spine/**/*';
const distBase = {base: './dpi-spine'};

gulp.task('vvv', () => gulp.src(distSrc, distBase)
    .pipe(segregate(distSrc, distBase))
    .pipe(gulp.dest(env.devPath + '/dpi-spine'))
    .pipe(bsync.stream())
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
* Local deployment
*/
gulp.task('bsync', () => bsync.init({proxy: env.devUrl}));

/**
* Ftp deployment
*/
gulp.task('ftp', function() {

  const ftpConfig = {
    user: '',
    password: '',
    host: '',
    port: '21',
    remoteFolder: './public_html/wp-content/themes',
    glob: ['./dpi-spine/**']
  }

  const connection = ftp.create({
      host: ftpConfig.host,
      port: ftpConfig.port,
      user: ftpConfig.user,
      password: ftpConfig.password,
      parallel: 10,
      log: function(err) {
        console.log(err);
      },
      debug: function(debug) {
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
  gulp.watch('./src/styles/**/*.scss', ['styles']);

  // js scripts
  gulp.watch('./src/scripts/js/**/*.js', ['js']);

  //php
  gulp.watch('./src/**/*.php', ['migrate']);

  // images
  gulp.watch('./src/assets/images/*', ['images']);

  // icons
  gulp.watch('./src/assets/icons/*', ['icons']);

  // dev dist
  if (env.dev) {
    gulp.watch('./dpi-spine/**/*', ['vvv']);
  }
});

/**
* Gulp commands
*/
gulp.task('build', ['styles', 'js', 'images', 'icons', 'migrate', 'screenshot']);

gulp.task('build-watch', ['build', 'watch']);

gulp.task('dev', ['build', 'bsync', 'vvv', 'watch']);

gulp.task('deploy', ['sequence']);

gulp.task('default', ['dev']);
