var gulp          = require('gulp');

var less          = require('gulp-less');
var autoprefixer  = require('gulp-autoprefixer');
var cleanCSS      = require('gulp-clean-css');
var headerComment = require('gulp-header-comment');

var babel         = require('gulp-babel');
var browserify    = require('browserify');
var source        = require('vinyl-source-stream');
var uglify        = require('gulp-uglify');

var rename        = require('gulp-rename');
var runSequence   = require('run-sequence');
var browserSync   = require('browser-sync').create();
var rev           = require('gulp-rev');
var revDel        = require('rev-del');


// Compile Less.
gulp.task('compile-css', function() {
    return gulp.src('./less/style.less')
    .pipe(less()).on('error', console.log.bind(console))
    .pipe(autoprefixer())
    .pipe(rename('style.css'))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

// Compile JS with Babel.
gulp.task('es6-commonjs', function() {
    return gulp.src('./js/script.js')
    .pipe(babel())
    .pipe(gulp.dest('./'))
});
// Browserify the result of above to make it usable in browsers.
gulp.task('browserify-js', function() {
    return browserify({
        entries: ['./script.js']
    }).bundle()
    .pipe(source('./script.js'))
    .pipe(gulp.dest('./'))
})


// Minify the compiled CSS.
gulp.task('optimise-css', function() {
    return gulp.src('./style.css')
    .pipe(cleanCSS())
    // Temporary work-around until CleanCSS API works properly with gulp-clean-css.
    // Need CSS comments to give WordPress theme information.
    // https://github.com/scniro/gulp-clean-css/issues/58
    .pipe(headerComment(`
        Theme Name: Linearsky  WordPress Theme
        Author: Marcus Powell
        Version: 1.0.0
    `))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./'));
});

// Minify the compiled JS.
gulp.task('optimise-js', function() {
    return gulp.src('./script.js')
    .pipe(uglify())
    .pipe(rename('script.min.js'))
    .pipe(gulp.dest('./'));
});


// Live reloading.
gulp.task('browser-sync', function() {
    // Should be .../site-name/wp-content/themes/theme-name/gulpfile.js
    // So get 4th from last value of the full path to get 'site-name'.
    var sitename = __dirname.split('/').splice(-4, 1)[0];

    browserSync.init({
        proxy: 'http://192.168.0.81:351'
    });
});

// Version assets and create a new asset manifest file.
gulp.task('manifest', function() {
    gulp.src(['./style.css', './style.min.css', './script.js', './script.min.js'], {base: './'})
	.pipe(rev())
	.pipe(gulp.dest('./'))
	.pipe(rev.manifest('manifest.json'))
	.pipe(revDel('manifest.json'))
	.pipe(gulp.dest('./'));
});


// Build/compile all assets.
gulp.task('build', function(callback) {
    runSequence(
        'compile-css',
        'es6-commonjs',
        'browserify-js',
        callback
    );
});

// Build/compile all assets ready for production.
gulp.task('prod', function(callback) {
    runSequence(
        'compile-css',
        'optimise-css',
        'es6-commonjs',
        'browserify-js',
        'optimise-js',
        'manifest',
        callback
    );
});


// Watch files and live reload browser.
gulp.task('watch', ['browser-sync'], function() {
    gulp.watch('./less/**/*.less', ['compile-css']);
    gulp.watch('./js/script.js', ['es6-commonjs', 'browserify-js']);
});
// Watch files without browser sync.
gulp.task('watch-nbs', function() {
    gulp.watch('./less/**/*.less', ['compile-css']);
    gulp.watch('./js/script.js', ['es6-commonjs', 'browserify-js']);
});
