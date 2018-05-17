var gulp            = require('gulp'),
    inject          = require('gulp-inject'),
    htmlclean       = require('gulp-htmlclean'),
    sass            = require('gulp-sass'),
    cleanCSS        = require('gulp-clean-css'),
    concat          = require('gulp-concat'),
    uglify          = require('gulp-uglify'),
    sourcemaps      = require('gulp-sourcemaps'),
    autoprefixer    = require('gulp-autoprefixer'),
    bs              = require('browser-sync'),
    del             = require('del');

var paths = {
    // creating
    src:        'src/**/*',
    srcHTML:    'src/**/*.php',
    srcSCSS:    'src/scss/*.scss',
    srcCSS:     'src/**/*.css',
    srcJS:      'src/js/*.js',
    srcIMG:     'src/img/*',
    // testing
    tmp:        'tmp',
    tmpIndex:   'tmp/**/*.php',
    tmpCSSdir:  'tmp/css',
    tmpCSS:     'tmp/css/*.css',
    tmpJSdir:   'tmp/js',
    tmpJS:      'tmp/js/*.js',
    tmpIMG:     'tmp/img/*',
    tmpIMGdir:  'tmp/img',
    // production
    dist:       'dist',
    distIndex:  'dist/**/*.php',
    distCSSdir: 'dist/css',
    distCSS:    'dist/css/*.css',
    distJSdir:  'dist/js',
    distJS:     'dist/js/*.js',
    distIMG:    'dist/img'
};

var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded'
};

// development tasks
gulp.task('browser-sync', ['inject'], function(){
    bs.init({
        injectChanges: true,
        proxy:  'login.local',
        host:   'login.local',
        open:   'external',
        port:   3000,
        notify: false
    });
});

gulp.task('html', function(){
    return gulp.src(paths.srcHTML)
        .pipe(htmlclean())
        .pipe(gulp.dest(paths.tmp))
        .pipe(bs.reload({stream: true}))
});

gulp.task('sass', function(){
    return gulp.src(paths.srcSCSS)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write('/maps'))
        .pipe(bs.reload({stream: true}))
        .pipe(gulp.dest(paths.tmpCSSdir))
});

gulp.task('css', function(){
    return gulp.src(paths.srcCSS)
        .pipe(concat('style.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.tmpCSSdir))
});

gulp.task('js', function(){
    return gulp.src(paths.srcJS)
        .pipe(concat('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.tmpJSdir))
});

gulp.task('img', function(){
    return gulp.src(paths.srcIMG)
        .pipe(gulp.dest(paths.tmpIMGdir))
});

gulp.task('copy', ['html', 'sass', 'css', 'js', 'img']);

gulp.task('inject', ['copy'], function(){
    var css = gulp.src(paths.tmpCSS);
    var js = gulp.src(paths.tmpJS);
    return gulp.src(paths.tmpIndex)
        .pipe(inject(css, {relative: true}))
        .pipe(inject(js, {relative: true}))
        .pipe(gulp.dest(paths.tmp));
});

gulp.task('watch', ['browser-sync'], function(){
    gulp.watch(paths.src, ['inject']);
    gulp.watch("./src/sass/*.scss", ['style']);
    gulp.watch("*.php").on('change', bs.reload);
});

gulp.task('default', ['watch']);

// production tasks
gulp.task('html:dist', function(){
    return gulp.src(paths.srcHTML)
      .pipe(htmlclean())
      .pipe(gulp.dest(paths.dist));
});

gulp.task('css:dist', function(){
    return gulp.src(paths.tmpCSS)
      .pipe(concat('style.min.css'))
      .pipe(cleanCSS())
      .pipe(gulp.dest(paths.distCSSdir));
});

gulp.task('js:dist', function(){
    return gulp.src(paths.srcJS)
      .pipe(concat('script.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest(paths.distJSdir));
});

gulp.task('img:dist', function(){
    gulp.src(paths.tmpIMG)
        .pipe(gulp.dest(paths.distIMG))
});

gulp.task('copy:dist', ['html:dist', 'css:dist', 'js:dist', 'img:dist']);

gulp.task('inject:dist', ['copy:dist'], function(){
    var css = gulp.src(paths.distCSS);
    var js = gulp.src(paths.distJS);
    return gulp.src(paths.distIndex)
        .pipe(inject(css, {relative: true}))
        .pipe(inject(js, {relative: true}))
        .pipe(gulp.dest(paths.dist));
});

// gulp build - for production
gulp.task('build', ['inject:dist']);

// gulp clean - for committing
gulp.task('clean', function(){
    del([paths.tmp, paths.dist]);
});