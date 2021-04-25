/* ========================================================================================== */
/*  Gulp
/* ========================================================================================== */

var gulp = require("gulp");

/* ============================== */
/*  Plugins
/* ============================== */

var autoprefixer = require("gulp-autoprefixer"),
	bower = require("./bower.json"),
	concat = require("gulp-concat"),
	cssmin = require("gulp-cssmin"),
	gcmq = require("gulp-group-css-media-queries"),
	header = require("gulp-header"),
	iconfont = require("gulp-iconfont"),
	notify = require("gulp-notify"),
	package = require("./package.json"),
	plumber = require("gulp-plumber"),
	replace = require("gulp-replace"),
	sass = require("gulp-sass"),
	uglify = require("gulp-uglify");

/* ============================== */
/*  Locations
/* ============================== */

var srcRoot = "src/",
	srcSCSS = "src/assets/css/scss/",
	srcCSS = "src/assets/css/",
	srcFonts = "src/assets/fonts/",
	srcImg = "src/assets/img/",
	srcIcons = "src/assets/img/svg/",
	srcJS = "src/assets/js/",
	destRoot = "dist/pecWpTheme/",
	destCSS = "dist/pecWpTheme/assets/css/",
	destFonts = "dist/pecWpTheme/assets/fonts/",
	destImg = "dist/pecWpTheme/assets/img/",
	destJS = "dist/pecWpTheme/assets/js/";

/* ============================== */
/*  Banner
/* ============================== */

var banner = [
	"/* ========================================================================================== */\n" +
		"/*  <%= package.name %>\n" +
		"/*  <%= package.description %>\n" +
		"/*  \n" +
		"/*  Copyright © " +
		new Date().getFullYear() +
		". Released under the <%= package.license %> license.\n" +
		"/*  <%= package.homepage %>\n" +
		"/* ========================================================================================== */\n\n",
].join("\n");

/* ============================== */
/*  HTML
/* ============================== */

function htmlTask() {
	return gulp.src([srcRoot + "**/*.php"]).pipe(gulp.dest(destRoot));
}

/* ============================== */
/*  CSS
/* ============================== */

function cssTask() {
	return gulp
		.src([srcSCSS + "styles.scss"])
		.pipe(
			plumber({
				handleError: function (err) {
					notify.onError("Error: <%= error.message %>");
					this.emit("end");
				},
			})
		)
		.pipe(sass())
		.pipe(
			autoprefixer({
				cascade: false,
			})
		)
		.pipe(gcmq())
		.pipe(cssmin())
		.pipe(
			header(banner, {
				package: package,
			})
		)
		.pipe(gulp.dest(destCSS));
}

/* ============================== */
/*  Icons
/* ============================== */

function iconsTask() {
	return gulp
		.src([srcIcons + "*.svg"])
		.pipe(
			iconfont({
				fontName: "icons",
				normalize: true,
				appendCodepoints: true,
				fontHeight: 1024,
				// appendUnicode: true
			})
		)
		.pipe(gulp.dest(srcFonts + "icons/"));
}

/* ============================== */
/*  Fonts
/* ============================== */

function fontsTask() {
	return gulp.src([srcFonts + "**/*"]).pipe(gulp.dest(destFonts));
}

/* ============================== */
/*  Images
/* ============================== */

function imagesTask() {
	return gulp
		.src([srcImg + "**/*", "!" + srcIcons, "!" + srcIcons + "**/*"])
		.pipe(gulp.dest(destImg));
}

/* ============================== */
/*  JS
/* ============================== */

function jsTask() {
	return gulp
		.src([srcJS + "vendors/**/*.js", srcJS + "scripts.js"])
		.pipe(
			plumber({
				errorHandler: notify.onError("Error: <%= error.message %>"),
			})
		)
		.pipe(concat("scripts.min.js"))
		.pipe(uglify())
		.pipe(
			header(banner, {
				package: package,
			})
		)
		.pipe(gulp.dest(destJS));
}

/* ============================== */
/*  Replace
/* ============================== */

function replaceTask() {
	return gulp
		.src([srcRoot + "functions.php"])
		.pipe(replace(/{{JQUERY_VERSION}}/g, bower.devDependencies.jquery))
		.pipe(gulp.dest(srcRoot));
}

/* ============================== */
/*  Move
/* ============================== */
function moveTask() {
	return gulp
		.src(
			[
				srcRoot + "*.*",
				srcCSS + "*.css",
				srcFonts + "**/*",
				srcImg + "**/*",
				srcJS + "**/*",
				srcRoot + "includes/**/*",
				srcRoot + "option-tree/**/*",
				srcRoot + "page-templates/**/*",
				"!" + srcJS + "vendors/",
				"!" + srcJS + "vendors/**/*",
				"!" + srcJS + "scripts.js",
			],
			{
				base: srcRoot,
			}
		)
		.pipe(gulp.dest(destRoot));
}

/* ============================== */
/*  Build
/* ============================== */

exports.build = gulp.series(
	htmlTask,
	cssTask,
	iconsTask,
	fontsTask,
	imagesTask,
	jsTask,
	replaceTask,
	moveTask
);
