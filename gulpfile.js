'use strict';

var gulp = require('gulp');
// var sass = require('gulp-sass');
// var sourcemaps = require('gulp-sourcemaps');
// var concat = require('gulp-concat');
// var cleanCSS = require('gulp-clean-css');
// var util = require('gulp-util');
// var gulpif = require('gulp-if');
var plugins = require('gulp-load-plugins')();

var config = {
    assetsDir: 'app/Resources/assets',
    sassPattern: 'sass/**/*.scss',
    prod: !!plugins.util.env.prod,
    sourceMaps: !plugins.util.env.prod
};

gulp.task('sass', function () {
    gulp.src(config.assetsDir+'/'+config.sassPattern)
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.init()))
        .pipe(plugins.sass())
        .pipe(plugins.concat('main.css'))
        .pipe(config.prod ? plugins.cleanCss() : plugins.util.noop())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.write('.')))
        .pipe(gulp.dest('web/css'));
});

gulp.task('watch', function () {
    gulp.watch(config.assetsDir+'/'+config.sassPattern, ['sass'])
});

gulp.task('default', ['sass', 'watch']);
