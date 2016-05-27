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

app.addStyles = function (paths, filename) {
    gulp.src(paths)
        .pipe(plugins.plumber())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.init()))
        .pipe(plugins.sass())
        .pipe(plugins.concat(filename))
        .pipe(config.prod ? plugins.cleanCss() : plugins.util.noop())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.write('.')))
        .pipe(gulp.dest('web/css'));
};

app.addScripts = function (paths, filename) {
    gulp.src(paths)
        .pipe(plugins.plumber())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.init()))
        .pipe(plugins.concat(filename))
        .pipe(config.prod ? plugins.uglify() : plugins.util.noop())
        .pipe(plugins.if(config.sourceMaps, plugins.sourcemaps.write('.')))
        .pipe(gulp.dest('web/js'));
};

gulp.task('styles', function () {
    app.addStyles([
        config.bowerDir + '/bootstrap/dist/css/bootstrap.css',
        config.assetsDir+'/'+config.sassPattern
    ], 'main.css');
});

gulp.task('scripts', function () {
    app.addScripts([
        config.bowerDir+'/jquery/dist/jquery.js',
        config.bowerDir+'/bootstrap/dist/js/bootstrap.js',
        config.assetsDir+'/js/main.js'
    ], 'app.js');
});

gulp.task('watch', function () {
    gulp.watch(config.assetsDir+'/'+config.sassPattern, ['styles']);
    gulp.watch(config.assetsDir+'/js/**/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts', 'watch']);
