var gulp = require('gulp');
var $    = require('gulp-load-plugins')();

var sassPaths = [
  'bower_components/foundation-sites/scss',
  'bower_components/motion-ui/src',
  'bower_components/emerald/scss'
];

gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe($.sourcemaps.init())
      .pipe($.sass({
        //outputStyle: 'compressed',
        includePaths: sassPaths
      })
        .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe($.sourcemaps.write('../css'))
    .pipe(gulp.dest('css'));
});

gulp.task('copy-fonts', function() {
  gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
      .pipe(gulp.dest('./fonts'));
  gulp.src('./bower_components/font-awesome/css/**/*.{css,css.map}')
      .pipe(gulp.dest('./css'));
});

gulp.task('buildjs', function() {
  return gulp.src ([
      './bower_components/jquery/dist/jquery.js',
      './bower_components/what-input/what-input.js',
      './bower_components/foundation-sites/dist/foundation.js',
      './js/app.js',
      './js/partials/push-menu.js',
      './js/partials/uthsc.section-nav.js'
      ])
      .pipe($.concat('uthsc.js'))
      .pipe(gulp.dest('./js/dist'))
      .pipe($.uglify())
      .pipe($.rename('uthsc.min.js'))
      .pipe(gulp.dest('./js/dist'));
});

gulp.task('default', ['sass','copy-fonts'], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
