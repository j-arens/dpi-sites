'use-strict';

// general processors
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
// const browsersync = require('browser-sync').create();

// image processors
const imagemin = require('gulp-imagemin');

// html/php processors
const stripCom = require('gulp-remove-html-comments');
const htmlMin = require('gulp-htmlmin');
const phpMin = require('gulp-php-minify');

// css processors
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('gulp-autoprefixer');
const lost = require('lost');
const pxToRem = require('postcss-pxtorem');
// const uncss = require('gulp-uncss');
const nano = require('gulp-cssnano');
const cmq = require('css-mqpacker');

// js processors
const uglify = require('gulp-uglify');

/**
* Local development tasks - gulp command = 'gulp'
*/

// styles tasks
const devPostProcessors = [
    lost(),
    cmq(),
    pxToRem({
        propWhiteList: []
    }),
];

gulp.task('sass', () => gulp.src('./styles/**/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss(devPostProcessors))
      .pipe(autoprefixer())
      .pipe(nano())
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./'))
);

// watch tasks
gulp.task('watch', function() {
  gulp.watch('./styles/**/*.scss', ['sass']);
});

/**
* Migrate to dist folder tasks - gulp command = 'gulp build'
*/

// html tasks
gulp.task('html-build', () => gulp.src(['./**/*.html', '!node_modules', '!node_modules/**', '!dist', '!dist/**'])
      .pipe(stripCom())
      .pipe(htmlMin({collapseWhitespace: true}))
      .pipe(gulp.dest('./dist'))
);

// php tasks
gulp.task('php-build', () => gulp.src(['./**/*.php', '!dist', '!dist/**'])
       .pipe(stripCom())
      //  .pipe(phpMin())
       .pipe(gulp.dest('./dist'))
);

// styles tasks
const buildPostProcessors = [
    lost(),
    pxToRem({
        propWhiteList: []
    })
];

gulp.task('styles-build', () => gulp.src(['./styles/**/*.scss', '!dist', '!dist/**'])
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss(buildPostProcessors))
      .pipe(combinemq())
      .pipe(autoprefixer())
      .pipe(nano())
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./dist'))
);

//js tasks
gulp.task('js-build', () => gulp.src('./js/**/*.js')
      .pipe(uglify({
        mangle: true,
      }))
      .pipe(gulp.dest('./dist/js/'))
);

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
