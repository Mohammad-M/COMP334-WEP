
var gulp = require('gulp');
var flatten = require('gulp-flatten');

gulp.task('default',function(){
    return gulp.src('bower_components/**/*min.js')
        .pipe(flatten())
        .pipe(gulp.dest('public/javascripts/'));
});