var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');

//css
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('gulp-autoprefixer');
var lost = require('lost');
var pxToRem = require('postcss-pxtorem');


//styles tasks
gulp.task('styles', function() {
    var postProcessors = [
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
        .pipe(gulp.dest('./'));
});

//watch tasks
gulp.task('watch', function() {
   gulp.watch('./styles/**/*.scss', ['styles']); 
});

gulp.task('default', ['styles', 'watch']);