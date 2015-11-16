/*
 * Load required plugins.
 */
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    //cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    sassPath = './src/sass',
    jsPath = './src/js',
    imgPath = './src/images',
    browserSync =  require('browser-sync').create();


/*
 * Define tasks
 */

// Process sass
gulp.task('styles', function () {
    gulp.src(sassPath + '/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(minifycss())
        .pipe(sourcemaps.write('./', {includeContent: false, sourceRoot: '/src/sass'}))
        .pipe(gulp.dest('.'))
        .pipe(livereload())
});

// Process JS files
gulp.task('scripts', function () {
    return gulp.src(jsPath + '/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(sourcemaps.write('./', {includeContent: false, sourceRoot: '/src/js'}))
        .pipe(gulp.dest('./js'))
        .pipe(livereload())
});

// Compress images
gulp.task('images', function () {
    return gulp.src(imgPath + '/**/*')
        .pipe(imagemin({optimizationLevel: 3, progressive: true, interlaced: true}))
        .pipe(gulp.dest('images'))
        .pipe(livereload())
});

// Start browser-sync proxy
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "www.rchelination.dev"
    });
});

// Create the watcher task
gulp.task('watch', function () {
    gulp.watch(sassPath + '/**/*', ['styles']);
    gulp.watch(jsPath + '/**/*', ['scripts']);
    gulp.watch(imgPath + '/**/*', ['images']);
    livereload.listen();
    gulp.watch(['./js/**/*', './src/images/*', './**/*.php', 'style.css']).on('change', livereload.changed);
});


//  Create a default task
gulp.task('default', ['styles', 'scripts', 'images', 'watch'], null);
