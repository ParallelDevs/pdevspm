'use strict';

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

var config = {
    assetsDir : 'app/Resources/assets',
    bowerDir : 'vendor/bower_components',
    sassPattern: 'sass/**/*.scss',
    prod: !!plugins.util.env.prod,
    sourceMaps: !plugins.util.env.prod
};

var app = {};

app.styles = function (paths, outputFilename) {
    gulp.src(paths)
        .pipe(plugins.plumber())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.init()))
        .pipe(plugins.sass())
        .pipe(plugins.concat(outputFilename))
        .pipe(config.prod ? plugins.cleanCss() : plugins.util.noop())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.write('.')))
        .pipe(gulp.dest('web/css'));
};

gulp.task('styles', function () {
    app.styles([
        config.bowerDir + '/bootstrap/dist/css/bootstrap.css',
        config.assetsDir+'/'+config.sassPattern
    ], 'main.css');
});

gulp.task('watch', function () {
    gulp.watch(config.assetsDir+'/'+config.sassPattern, ['styles'])
});

gulp.task('default', ['styles', 'watch']);
