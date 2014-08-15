// include gulp and plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload');

// gulp styles task
gulp.task('styles', function() {
  return gulp.src('src/scss/main.scss')
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('assets/styles'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('assets/styles'))
    .pipe(notify({ message: 'Styles task complete' }));
});

// gulp watch and livereolad task
gulp.task('watch', function() {
    gulp.watch('src/scss/**/*.scss', ['styles']);

    var server = livereload();
    gulp.watch(['src/**']).on('change', function(file) {
    server.changed(file.path);
    });

    gulp.start('styles');
});

// gulp default task
gulp.task('default', function() {
    gulp.start('styles');
});