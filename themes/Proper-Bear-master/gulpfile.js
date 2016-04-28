// Include gulp and plugins
var gulp = require('gulp'),

    rename = require('gulp-rename'),
    bower = require('gulp-bower'),
    browserSync = require('browser-sync'),
    filter = require('gulp-filter'),
    plumber = require('gulp-plumber'),
    onError = function (err) {  
      console.log(err);
      this.emit('end')
    },

// Assets
    mainBowerFiles = require('main-bower-files'),
    svgSprite = require('gulp-svg-sprite'),

// Scripts
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    jshint = require('gulp-jshint'),

// Styles
    compass = require('gulp-compass'),
    minifyCSS = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer');

module.exports = gulp;


/**************
 * Assets
 **************/

// Bower task
gulp.task('bower', function() { 
    return bower()
         .pipe(gulp.dest('bower_components/')) 
});

// Concatenate and minify third-party Bower css using main-bower-files
gulp.task('bower-minify-css', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.css'))
        .pipe(concat('thirdparty.css'))
        .pipe(gulp.dest('_/css/'))
        .pipe(rename('thirdparty.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('_/css/'));
});

// Concatenate and minify third-party Bower scripts using main-bower-files
gulp.task('bower-minify-js', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.js'))
        .pipe(concat('thirdparty.js'))
        .pipe(gulp.dest('_/js/'))
        .pipe(rename('thirdparty.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('_/js/'));
});

// Concatenate SVGs
gulp.task('svg', function(){

    svgConfig = {
        mode: {
            symbol: {
                prefix: 'svg-$s',
                inline: true,
                dest: './'
            }
        }
};
    return gulp.src('./_/svg/src/**/*.svg')
    .pipe(svgSprite( svgConfig ))
    .pipe(gulp.dest('_/'));
});

/**************
 * Scripts
 **************/

// Lint Task
gulp.task('lint', function() {
    return gulp.src(['_/js/src/map.js', '_/js/src/themefunctions.js' ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src(['_/js/src/**/*.js'])
        .pipe(plumber({
              errorHandler: onError
            }))
        .pipe(concat('themefunctions.js'))
        .pipe(gulp.dest('_/js/'))
        .pipe(uglify('themefunctions.min.js', {
          outSourceMap: true,
          sourceRoot: '../../'
        }))
        .pipe(gulp.dest('_/js/'));
});


/**************
 * Styles
 **************/

// Compile Our Sass/Compass
gulp.task('sass', function() {
    return gulp.src('_/scss/**/*.scss')
        .pipe(plumber({
              errorHandler: onError
            }))
        .pipe(compass({
            config_file: './config.rb',
            css: '.',
            sass: '_/scss'
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'ff 17', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('./'));

});


/**************
 * BrowserSync & Watcher
 **************/

// Browsersync
gulp.task('browser-sync', function() {
    browserSync({
        proxy: "localhost/properbear",
        files: ["style.css", "*.js", "*.php", "*.html"]
    });
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('_/js/src/**/*.js', ['lint', 'scripts']);
    gulp.watch('_/scss/**/*.scss', ['sass']);
    gulp.watch('_/svg/src/**/*.svg', ['svg']);
});

// Default without browser sync
gulp.task('_default_nosync', ['lint', 'sass', 'scripts', 'svg', 'watch']);


// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'svg', 'watch', 'browser-sync']);
