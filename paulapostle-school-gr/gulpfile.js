'use-strict';

// general processors
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');

// image processors
const imagemin = require('gulp-imagemin');

// css processors
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('gulp-autoprefixer');
const lost = require('lost');
const pxToRem = require('postcss-pxtorem');
const nano = require('gulp-cssnano');

// js processors
const uglify = require('gulp-uglify');

/**
* Local development tasks - gulp command = 'gulp'
*/

// styles tasks
gulp.task('sass', () => {
  const postProcessors = [
      lost(),
      pxToRem({
          propWhiteList: []
      })
  ];
 return gulp.src('./styles/**/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss(postProcessors))
      .pipe(autoprefixer())
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./'))
});

// watch tasks
gulp.task('watch', function() {
  gulp.watch('./styles/**/*.scss', ['sass']);
});

/**
* Migrate to dist folder tasks - gulp command = 'gulp build'
*/

// html tasks
gulp.task('html-build', () => {
  return gulp.src(['./**/*.html', '!node_modules', '!node_modules/**', '!dist', '!dist/**'])
      .pipe(gulp.dest('./dist'))
});

// php tasks
gulp.task('php-build', () => {
  return gulp.src(['./**/*.php', '!dist', '!dist/**'])
       .pipe(gulp.dest('./dist'))
});

// styles tasks
gulp.task('styles-build', () => {
  var postProcessors = [
      lost(),
      pxToRem({
          propWhiteList: []
      })
  ];
 return gulp.src(['./styles/**/*.scss', '!dist', '!dist/**'])
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss(postProcessors))
      .pipe(autoprefixer())
      .pipe(nano())
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./dist'));
});

//js tasks
gulp.task('js-build', () => {
  return gulp.src('./js/**/*.js')
      .pipe(uglify({
        mangle: true,
      }))
      .pipe(gulp.dest('./dist/js/'))
});

// image tasks
gulp.task('images-build', () => {
  return gulp.src(['./images/*', '!dist', '!dist/**'])
       .pipe(imagemin())
       .pipe(gulp.dest('./dist/images/'))
});

/**
* Gulp commands
*/

// local serve
gulp.task('serve', ['sass', 'watch']);

// build task
gulp.task('build', ['html-build', 'php-build', 'styles-build', 'js-build', 'images-build']);

// default task
gulp.task('default', ['serve']);
