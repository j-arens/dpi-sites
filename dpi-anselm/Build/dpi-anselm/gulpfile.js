//general
var gulp = require('gulp');
var ftp = require('vinyl-ftp');

//css
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('styles', function () {
    return gulp.src('./styles/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
    gulp.watch('./styles/**/*.scss', ['styles']);
});

gulp.task('deploy', function () {
    var conn = ftp.create({
        host: '66.232.99.21',
        user: 'anselm',
        password: 'dpi105074thMA'
    });
    
    var globs = [
        './*.css',
        './*.html',
        './*.php',
        './template-parts/*.php'
    ];
    
    return gulp.src(globs, {base: '.', buffer: false})
            .pipe(conn.newer('/public_html/wp-content/themes/dpi-anselm'))
            .pipe(conn.dest('/public_html/wp-content/themes/dpi-anselm'));
});
    
gulp.task('default', ['styles', 'watch']);