/* eslint-disable no-multi-spaces, key-spacing, import/no-extraneous-dependencies */

// ----------------------------------------------------------------------------------------
// Plugins
// ----------------------------------------------------------------------------------------

const gulp         = require('gulp');
const sass         = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps   = require('gulp-sourcemaps');
const browserSync  = require('browser-sync');
const cleancss     = require('gulp-clean-css');
const plumber      = require('gulp-plumber');
const rename       = require('gulp-rename');
const clean        = require('gulp-clean');
const gutil        = require('gulp-util');
const browserify   = require('browserify');
const source       = require('vinyl-source-stream');
const babelify     = require('babelify');
const watchify     = require('watchify');
const uglify       = require('gulp-uglify');
const buffer       = require('vinyl-buffer');
const flatten      = require('gulp-flatten');
const runSequence  = require('run-sequence');


// ----------------------------------------------------------------------------------------
// Settings
// ----------------------------------------------------------------------------------------


const src = {
  sass     : 'src/scss/**/*.scss',
  sassroot : 'src/scss/style.scss',
  top      : 'src/*',
  html     : 'src/*.html',
  img      : 'src/img/**/*',
  js       : 'src/js/**/*',
  fonts    : 'src/scss/vendor/font-awesome/**/*',
  mainjs   : 'src/js/main.js',
  vendorjs : 'src/js/vegndor/*.js',
  php      : './**/*.php',
  files      : ['./*.{txt,ico,png,php}', 'css/**/*', 'components/**/*',
              'includes/**/*', 'js/**/*', 'style.css'],
};

const prod = {
  prod     : 'prod',
  css      : 'css',
  top      : '../../../../prod',
  js       : 'js',
  mainjs   : 'js',
  img      : 'img',
  vendorjs : 'js/vendor',
  fonts    : 'fonts',
};


// ----------------------------------------------------------------------------------------
// Tasks
// ----------------------------------------------------------------------------------------


// Task: Sass
// sourcemaps, compile, minify, rename, move to dist
gulp.task('sass', () => {
  gulp.src(src.sassroot)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleancss())
    .pipe(rename({ basename: 'main', suffix: '.min' }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(prod.css))
    .pipe(browserSync.reload({ stream: true }));
});

// Task: Sass Prod
// Production ready sass
gulp.task('sass-prod', () => {
  gulp.src(src.sass)
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleancss())
    .pipe(rename({ basename: 'main', suffix: '.min' }))
    .pipe(gulp.dest(prod.css));
});


function bundleJs(bundler) {
  return bundler.bundle()
    .pipe(source(src.mainjs))
    .pipe(buffer())
    .pipe(gulp.dest(prod.mainjs))
    .pipe(rename('bundle.js'))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(prod.mainjs))
    .pipe(browserSync.reload({ stream:true }));
}

// Task: Browserify + Watchify
// Browserify will watch the dev.js file.
// Babel is used to allow for es2015, and specifically ES6 Modules.
gulp.task('watchify', () => {
  const args = {
    entries: [src.mainjs],
    debug: true,
    cache: {},
    packageCache: {},
  };

  const bundler = watchify(browserify(src.mainjs, args)
    .transform(babelify, { presets: ['es2015'] }));

  bundleJs(bundler);

  bundler.on('update', () => {
    bundleJs(bundler);
  });
});


// Task: Browserify without watchify
// Will compile JS, but still provide sourcemaps
gulp.task('browserify', () => {
  const bundler = browserify(src.mainjs, { debug: true })
    .transform(babelify, { presets: ['es2015'] });

  return bundleJs(bundler);
});

// Browserify without sourcemaps (or watchify)
// No sourcemaps. Used for prod, etc
gulp.task('browserify-prod', () => {
  const bundler = browserify(src.mainjs).transform(babelify, { presets: ['es2015'] });

  return bundler.bundle()
    .pipe(source(src.mainjs))
    .pipe(buffer())
    .pipe(rename('bundle.js'))
    .pipe(uglify())
    .pipe(gulp.dest(prod.mainjs));
});

// task ensures task is done before browser reload
gulp.task('reload', (done) => {
  browserSync.reload();
  done();
});

// Task: Watch
gulp.task('watch', ['watchify', 'browserSync', 'sass'], () => {
  gulp.watch(src.sass, ['sass']);
  gulp.watch(src.html, ['html']);
  gulp.watch(src.php, ['reload']);
});

// Task: BrowserSync
gulp.task('browserSync', () => {
  browserSync({
    proxy: 'http://dvw.dev:8888/',
    notify: {
      styles: {
        top: 'auto',
        bottom: '0',
      },
    },
  });
});

// Task: Build
gulp.task('build', (callback) => {
  runSequence('clean',
              ['sass-prod', 'browserify-prod'],
              callback);
});

// Task: prod
// Creates a production-ready folder with theme
gulp.task('prod', ['prod-clean', 'sass-prod'], () => {
  gulp.src(src.files, { base: '.' })
    .pipe(plumber())
    .pipe(gulp.dest(prod.top))
    .pipe(gulp.dest(prod.prod))
    .on('error', gutil.log);
});

// Task: prod-clean
// Deletes everything in the prod folder.
gulp.task('prod-clean', () => {
  gulp.src(`${prod.prod}/*`, { read: false })
    .pipe(clean());
});

// Task: Default (launch server and watch files for changes)
gulp.task('default', ['watch'], () => {});
