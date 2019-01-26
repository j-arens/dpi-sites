// general
const gulp = require('gulp');
const argv = require('yargs');
const segregate = require('gulp-watch');
const named = require('vinyl-named');

// css processors
const postcss = require('gulp-postcss');
const next = require('postcss-cssnext');
const nano = require('gulp-cssnano');
const flexbug = require('postcss-flexbugs-fixes');
const namespace = require('./postcss-namespace');
const cssImport = require('postcss-import');

// js processors
const webpack = require('webpack-stream');

// image processors
const imagemin = require('gulp-imagemin');

const env = {
  version: '1.0.0',
  dev: argv.dev || false,
  devPath: '',
  devURL: ''
};


/**
* JS
*/
gulp.task('js', () => gulp.src('./source/js/**/*.js')
    .pipe(named())
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest(`./distribution/dpi-ppf-${env.version}/js`))
);

/**
 * CSS
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
    next({
        browsers: browserSupport,
        features: {
            rem: false,
            customProperties: {
                strict: false
            }
        }
    }),
    flexbug(),
    namespace()
];

gulp.task('styles', () => gulp.src(['./source/css/**/*.css', '!./source/css/_base.css'])
    .pipe(postcss(plugins))
    .pipe(nano({zindex: false, reduceIdents: false}))
    .pipe(gulp.dest(`./distribution/dpi-ppf-${env.version}/css`))
);

/**
 * Images
 */
gulp.task('images', () => gulp.src('./source/images/*.+(jpg|jpeg|gif|png|svg)')
    .pipe(imagemin())
    .pipe(gulp.dest(`./distribution/dpi-ppf-${env.version}/images`))
);

/**
* Dist
*/
gulp.task('dist', () => gulp.src('./source/**/*.+(php|json|txt|lock)', {base: './source'})
    .pipe(gulp.dest(`./distribution/dpi-ppf-${env.version}`))
);

/**
* Migrate to local vagrant install
*/
const distSrc = `./distribution/dpi-ppf-${env.version}/**/*`;
const distBase = {base: `./distribution/dpi-ppf-${env.version}`};

gulp.task('migrate-vagrant', () => gulp.src(distSrc, distBase)
    .pipe(segregate(distSrc, distBase))
    .pipe(gulp.dest(env.devPath + `/dpi-ppf-${env.version}`))
);

/**
* Watch commands
*/
gulp.task('watch', () => {
  gulp.watch('./source/css/**/*.css', ['styles']);
  gulp.watch('./source/**/*.php', ['dist']);
  gulp.watch('./source/js/**/*.js', ['js']);

  if (env.dev) {
    gulp.watch('./src/**/*', ['build']);
  }
});

/**
* Gulp commands
*/
gulp.task('build', ['styles', 'js', 'images', 'dist']);

gulp.task('build-watch', ['build', 'watch'])

gulp.task('dev', ['build', 'migrate-vagrant']);

gulp.task('dev-watch', ['dev', 'watch']);

gulp.task('default', ['dev-watch']);