"use strict";

// Global
var gulp = require('gulp');
var path = require('path');
var concat = require("gulp-concat");
//JS
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
// Styles
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var uncss = require('gulp-uncss');
var cssmin = require('gulp-minify-css');
// Sitegen
var prettify = require('gulp-prettify');
var nunjucksRender = require('gulp-nunjucks-render');
// Autowire from bower
var wiredep = require('wiredep').stream;


var UGLIFY = {
  sequences: true, // join consecutive statemets with the “comma operator”
  properties: true, // optimize property access: a["foo"] → a.foo
  dead_code: true, // discard unreachable code
  drop_debugger: true, // discard “debugger” statements
  unsafe: true, // some unsafe optimizations (see below)
  conditionals: true, // optimize if-s and conditional expressions
  comparisons: true, // optimize comparisons
  evaluate: true, // evaluate constant expressions
  booleans: true, // optimize boolean expressions
  loops: true, // optimize loops
  unused: true, // drop unused variables/functions
  hoist_funs: true, // hoist function declarations
  hoist_vars: true, // hoist variable declarations
  if_return: true, // optimize if-s followed by return/continue
  join_vars: true, // join var declarations
  cascade: true, // try to cascade `right` into `left` in sequences
  side_effects: true, // drop side-effect-free statements
  warnings: true, // warn about potentially dangerous optimizations/code
  global_defs: {} // global definitions
};

var UNCSS = {
  html: ['./deploy/index.html'],
  ignore: [
    // /navbar-shrink/,
    // /active/,
  ]
};

var CSS = {
  noAdvanced: true
};

var nunjucksData = require('./util/load-directory.js')('./src/templates-data', {
  currentDir: __dirname,
  type: '.json',
  recursive: true,
  require: true,
});

gulp.task('copy', function () {
  gulp.src('./src/assets/**/*.*')
    .pipe(gulp.dest('./deploy/assets'));
});

gulp.task('css', function () {
  return gulp.src([
      "./src/less/style.less",
    ])
    // .pipe(sourcemaps.init())
    .pipe(less())
    .pipe(autoprefixer({
      browsers: ['> 1%'],
      cascade: false
    }))
    // .pipe(uncss(UNCSS))
    .pipe(cssmin(CSS))
    .pipe(concat('style.min.css'))
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('./deploy/css'));
});


gulp.task('scripts', function () {
  return gulp.src(['./src/js/**/*.js'])
    .pipe(sourcemaps.init())
    .pipe(uglify(UGLIFY))
    .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./deploy/js'));
});

gulp.task('html', function () {
  nunjucksRender.nunjucks.configure(['./src/']);
  return gulp.src('./src/**/*.html')
    .pipe(wiredep())
    .pipe(nunjucksRender(nunjucksData))
    .pipe(prettify({
      ident_size: 2,
      indent_inner_html: true
    }))
    .pipe(gulp.dest('./deploy'));
});

gulp.task('watch', function () {
  gulp.watch('./src/**/*.js', ['scripts', 'wordpress']);
  gulp.watch('./src/**/*.html', ['html']);
  gulp.watch('./src/**/*.less', ['css']);
  gulp.watch('./src/assets/*.*', ['copy']);
});

gulp.task('wordpress', ['copy', 'css', 'html', 'scripts'], function () {
  gulp.src('./src/assets/**/*.*')
    .pipe(gulp.dest('./hs_silesia/assets'));

  gulp.src('./deploy/js/**/*.js')
    .pipe(gulp.dest('./hs_silesia/js'));

  gulp.src('./deploy/css/**/*.css')
    .pipe(gulp.dest('./hs_silesia/css'));
});

gulp.task('compile', ['copy', 'css', 'html', 'scripts', 'wordpress']);


gulp.task('default', ['compile', 'watch']);
