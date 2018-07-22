'use strict';

var addsrc = require('gulp-add-src'),
    autoprefixer = require('autoprefixer'),
    concat = require('gulp-concat'),
    cssnano = require('gulp-cssnano'),
    del = require('del'),
    gulp = require('gulp'),
    livereload = require('gulp-livereload'),
    postcss = require('gulp-postcss'),
    postcssObjectFitImages = require('postcss-object-fit-images'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('clean', function () {
    return del.sync([
        'public/build/{css,fonts,js}'
    ]);
});

gulp.task('scripts', function () {
    return gulp
        .src([
            'node_modules/@ruwork/frujax/frujax.js',
            'vendor/ruwork/frujax-bundle/Resources/public/frujax_part.js',
            'vendor/ruwork/frujax-bundle/Resources/public/frujax_hide_form_errors.js',
            'vendor/ruwork/reform/Resources/assets/js/file.js',
            'assets/scripts/app.js'
        ])
        .pipe(concat('app.js'))
        .pipe(addsrc('assets/scripts/metrics.js'))
        .pipe(gulp.dest('js', {cwd: 'public/build'}));
});

gulp.task('scss', function () {
    return gulp
        .src('assets/scss/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            autoprefixer,
            postcssObjectFitImages,
        ]))
        .pipe(cssnano({zindex: false}))
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('css', {cwd: 'public/build'}))
        .pipe(livereload());
});
gulp.task('watch', function () {
    livereload.listen();

    gulp.watch('assets/scss/**/*.scss', ['scss']);
    gulp.watch('assets/scripts/**/*.js', ['scripts']);
});

gulp.task('default', ['clean', 'scripts', 'scss', 'watch']);

gulp.task('build', ['scripts', 'scss']);
