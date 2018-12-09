'use strict';

const gulp = require("gulp");
const sass = require("gulp-sass");
const ts = require('gulp-typescript');
const copy = require('gulp-copy');

const fsRoot = './static';

const librariesRoot = './node_modules';

const srcScripts = `${fsRoot}/scripts/ts`;
const srcStyles = `${fsRoot}/styles/scss`;

const destScripts = `${fsRoot}/scripts/js`;
const destStyles = `${fsRoot}/styles/css`;

gulp.task('sass', function () {
    gulp.src(`${srcStyles}/**/*.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(destStyles));
});

gulp.task('ts', function () {
    return gulp.src(`${srcScripts}/**/*.ts`)
               .pipe(ts({
                            noImplicitAny: true,
                            outFile: 'bundle.js'
                        }))
               .on('error', console.log)
               .pipe(gulp.dest(destScripts));
});

gulp.task('sass-watch', function () {
    gulp.watch('./static/styles/scss/*.scss', ['sass']);
});

gulp.task('ts-watch', function () {
    gulp.watch('./static/scripts/ts/*.ts', ['ts']);
});

gulp.task('build', ['prepare-bootstrap', 'prepare-jquery', 'sass', 'ts']);

gulp.task('prepare-bootstrap', function () {
    return gulp.src(`${librariesRoot}/bootstrap/dist/css/bootstrap.css`)
               .pipe(gulp.dest(destStyles));
});

gulp.task('prepare-jquery', function () {
    return gulp.src(`${librariesRoot}/jquery/dist/jquery.js`)
               .pipe(gulp.dest(destScripts));
});