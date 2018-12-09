'use strict';

const gulp = require("gulp");
const sass = require("gulp-sass");
const ts = require('gulp-typescript');



gulp.task('sass', function () {
    gulp.src('./static/styles/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./static/styles/css'));
});

gulp.task('ts', function () {
    return gulp.src('./static/scripts/ts/*.ts')
               .pipe(ts({
                            noImplicitAny: true,
                            outFile: 'bundle.js'
                        }))
               .pipe(gulp.dest('./static/scripts/js'));
});

gulp.task('sass-watch', function () {
    gulp.watch('./static/styles/scss/*.scss', ['sass']);
});

gulp.task('ts-watch', function () {
    gulp.watch('./static/scripts/ts/*.ts', ['ts']);
});