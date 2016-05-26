'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var util = require('gulp-util');
var gulpif = require('gulp-if');

var config = {
    assetsDir: 'app/Resources/assets',
    sassPattern: 'sass/**/*.scss',
    prod: !!util.env.prod,
    sourceMaps: !util.env.prod
};

gulp.task('sass', function () {
    gulp.src(config.assetsDir+'/'+config.sassPattern)
        .pipe(gulpif(config.sourceMaps, sourcemaps.init()))
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(config.prod ? cleanCSS() : util.noop())
        .pipe(gulpif(config.sourceMaps, sourcemaps.write('.')))
        .pipe(gulp.dest('web/css'));
});

gulp.task('watch', function () {
    gulp.watch(config.assetsDir+'/'+config.sassPattern, ['sass'])
});

gulp.task('default', ['sass', 'watch']);
