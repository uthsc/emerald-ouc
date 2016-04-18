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
    .pipe(gulp.dest('./-resources/2015/css'));
});

gulp.task('copy-fonts', function() {
  gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
      .pipe(gulp.dest('./-resources/2015/fonts'));
  gulp.src('./bower_components/font-awesome/css/**/*.{css,css.map}')
      .pipe(gulp.dest('./-resources/2015/css'));
});

gulp.task('copy-images', function() {
    gulp.src('./images/*')
        .pipe(gulp.dest('./-resources/2015/images'));
});

gulp.task('copy-vendor-js', function() {
    return gulp.src ([
        './bower_components/jquery/dist/jquery.min.js',
        './bower_components/what-input/what-input.min.js',
        './bower_components/foundation-sites/dist/foundation.min.js'
    ])
        .pipe(gulp.dest('./-resources/2015/js'));
});

gulp.task('buildjs', function() {
  return gulp.src ([
      './js/app.js',
      './js/partials/uthsc.off-canvas.js',
      './js/partials/uthsc.section-nav.js',
      './js/partials/uthsc.safari-bottom-nav-fix.js',
      './js/partials/uthsc.homepage-news.js'
      ])
          .pipe($.concat('uthsc.js'))
          .pipe(gulp.dest('./-resources/2015/js'))
          .pipe($.uglify())
          .pipe($.rename('uthsc.min.js'))
          .pipe(gulp.dest('./-resources/2015/js'));
});

gulp.task('build', ['sass','copy-fonts', 'copy-images', 'copy-vendor-js', 'buildjs']);

gulp.task('default', ['sass','copy-fonts'], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
