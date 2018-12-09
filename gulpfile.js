'use strict';

const gulp = require("gulp");
const sass = require("gulp-sass");

gulp.task('sass', function () {
    gulp.src('./static/styles/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./static/styles/css'));
});

gulp.task('sass-watch', function () {
    gulp.watch('./static/styles/scss/*.scss', ['sass']);
});