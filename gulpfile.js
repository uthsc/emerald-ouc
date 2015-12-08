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
  gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,eof,svg}')
      .pipe(gulp.dest('./fonts'));
  gulp.src('./bower_components/font-awesome/css/**/*.{css,css.map}')
      .pipe(gulp.dest('./css'));
});

gulp.task('default', ['sass','copy-fonts'], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
