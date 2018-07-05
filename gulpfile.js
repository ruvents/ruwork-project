'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    suppressError = function (error) {
        console.log(error.toString());
        this.emit('end');
    },
    postcss = require('gulp-postcss'),
    concat = require('gulp-concat'),
    del = require('del'),
    addsrc = require('gulp-add-src');

gulp.task('clean', function () {
    return del.sync([
        'public/build/{css,fonts,js}'
    ]);
});

gulp.task('scss', function () {
    return gulp
        .src('assets/scss/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .on('error', suppressError)
        .pipe(postcss([require('autoprefixer'), require('postcss-object-fit-images')]))
        .pipe(cssnano({zindex: false}))
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('css', {cwd: 'public/build'}))
        .pipe(livereload());
});

gulp.task('scripts', function () {
    return gulp
        .src([
            'node_modules/@ruwork/frujax/frujax.js',
            'vendor/ruwork/frujax-bundle/Resources/public/frujax_part.js',
            'vendor/ruwork/frujax-bundle/Resources/public/frujax_hide_form_errors.js',
            'assets/scripts/app.js'
        ])
        .pipe(concat('app.js'))
        .pipe(addsrc('assets/scripts/metrics.js'))
        .pipe(gulp.dest('js', {cwd: 'public/build'}));
});

gulp.task('watch', function () {
    livereload.listen();

    gulp.watch('assets/scss/**/*.scss', ['scss']);
    gulp.watch('assets/scripts/**/*.js', ['scripts']);
});

gulp.task('default', ['clean', 'watch', 'scss', 'scripts']);

gulp.task('build', ['scss', 'scripts']);
