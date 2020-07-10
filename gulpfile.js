// var combineMq = require('gulp-combine-mq');
// const fs = require("fs");
// const postcss = require("postcss");

const postcss    = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const mqpacker = require("css-mqpacker");
const gulp = require('gulp');
const sass = require('gulp-sass');

const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify')
const include = require('gulp-include') // could also use browserify
const livereload = require('gulp-livereload');



// CSS paths
var scssFiles = 'sass/**/*.scss',
    cssDest = '';


// Watch .scss files
gulp.task('styles', function () {

    return gulp.src(scssFiles)
    //.pipe(sourcemaps.init())
    .pipe(sass({includePaths: ['node_modules/foundation-sites/scss'], outputStyle: 'compressed', errLogToConsole: true}).on('error', sass.logError))
    // .pipe(sourcemaps.write({includeContent: false})) //, sourceRoot: scssFiles
    // .pipe(sourcemaps.init({loadMaps: true}))
    // .pipe(sourcemaps.write('../maps')) //, {sourceRoot: scssFiles}
    .pipe(autoprefixer())
    .pipe(gulp.dest(cssDest))
    .pipe(livereload());
});

// gulp.task('combineMq', function () {
//     return gulp.src('.css')
//     .pipe(combineMq({
//         beautify: false
//     }))
//     .pipe(gulp.dest('tmp'));
// });

gulp.task('mq', () => {

  return gulp.src('style.css')
    //.pipe( sourcemaps.init() )
    .pipe( postcss([
      require("autoprefixer"),
      require('postcss-prettify'),
      //autoprefixer({browsers: ['last 2 versions']}),
      mqpacker({
        sort: true
      })




    ]) )
    //.pipe( sourcemaps.write('.') )
    .pipe( gulp.dest('tmp/') )
})

// Watch and compile CSS and JS
gulp.task('watch', function () {

    // listen on port 8889
    // make sure this port is used in the browser middleware
    // <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':8889/livereload.js?snipver=1"></' + 'script>')</script>

    livereload.listen(35729);

    //gulp.watch('./**/*.php', livereload.reload); //

    // Watch .scss files
    gulp.watch([scssFiles], ['styles']);


});

// Build task
gulp.task('build', ['styles']);   //, 'scripts', 'watch'

// Default task
gulp.task('default', ['build']);
