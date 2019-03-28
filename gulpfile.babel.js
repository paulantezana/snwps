// Load Gulp...of course
import { src, dest, task, watch, series, parallel } from 'gulp';

// CSS related plugins
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';

import browserify from 'browserify';
import plumber from 'gulp-plumber';
import babelify from 'babelify';
import source from 'vinyl-source-stream';
import buffer from 'vinyl-buffer';
import jsmin from 'gulp-jsmin';
import imagemin from 'gulp-imagemin';

import browserSync from 'browser-sync';

// var babelify     = require( 'babelify' );
// var source       = require( 'vinyl-source-stream' );
// var buffer       = require( 'vinyl-buffer' );
// var stripDebug   = require( 'gulp-strip-debug' );

// Utility plugins
import sourcemaps from 'gulp-sourcemaps';
// var notify       = require( 'gulp-notify' );
// var plumber      = require( 'gulp-plumber' );
// var options      = require( 'gulp-options' );
// var gulpif       = require( 'gulp-if' );

const reloadFiles = [
	'./assets/js/*.js',
	'./assets/css/*.css',
	'./**/*.php'
];
const proxyOptions = {
	proxy: 'localhost:81',
	notify: false
};
const imageminOptions = {
    progressive: true,
    optimizationLevel: 3, // 0-7 low-high
    interlaced: true,
    svgoPlugins: [{ removeViewBox: false }]
};
const wpPotOptions = {
    domain: 'kenai',
    package: 'kenai',
    lastTranslator: 'Jonathan MirCha <jonmircha@gmail.com>'
};

function browser_sync() {
	browserSync.init(reloadFiles, proxyOptions);
}

function reload(done) {
	browserSync.reload();
	done();
}

function css(done) {
	src( [ './src/scss/*.scss' ] )
		.pipe( sourcemaps.init() )
		.pipe( sass({
			errLogToConsole: true,
			outputStyle: 'compressed'
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
		// .pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( dest( './assets/css' ) )
		.pipe( browserSync.stream() );
	done();
};

var jsFiles      = [ 'admin.js', 'app.js', 'editor.js', 'login.js' ];

function scripts(done) {
	jsFiles.map( function( entry ) {
		return browserify({
			entries: ['./src/scripts/' + entry]	
		})
			.transform(babelify)
			.bundle()
			.on('error', err => console.log(err.message))
			.pipe( source( entry ) )
			.pipe( buffer() )
			.pipe(sourcemaps.init())
			.pipe( sourcemaps.write( './' ) )
			.pipe(jsmin())
			.pipe(dest("./assets/js"))
			.pipe( browserSync.stream() );
	});
	done();
};

function triggerPlumber( src_file, dest_file ) {
	return src( src_file )
		.pipe( plumber() )
		.pipe( dest( dest_file ) );
}

function images() {
	return triggerPlumber( './src/raw/**/*.{png,jpg,jpeg,gif,svg}', './assets/images' );
};

function watch_files() {
	watch('./src/scss/**/*.scss', series(css,reload));
	watch('./src/scripts/**/*.js', series(scripts,reload));
	watch('./src/raw/**/*.*', series(images,reload));
	// watch(jsWatch, series(js, reload));
}

task("default", parallel(browser_sync, watch_files));