const gulp = require('gulp');//gulp本体

//scss
const sass = require('gulp-dart-sass');//Dart Sass はSass公式が推奨 @use構文などが使える
const plumber = require("gulp-plumber"); // エラーが発生しても強制終了させない
const notify = require("gulp-notify"); // エラー発生時のアラート出力
const browserSync = require("browser-sync"); //ブラウザリロード


// 入出力するフォルダを指定
// const srcBase = './source';
const srcBase = './';
const assetsBase = './work';
//const distBase = './output';
const distBase = './';
const serverBase = 'http://vdon.local/';


const srcPath = {
  'scss': assetsBase + '/scss/**/*.scss',
  // 'html': srcBase + '/**/*.html',
  // 'php': srcBase + '/**/*.php'
  'html': srcBase + '*.html',
  'php': srcBase + '*.php'
};

const distPath = {
  'css': distBase + '/css/',
  // 'html': distBase + '/',
  // 'php': distBase + '/'
};

/**
 * sass
 *
 */
const cssSass = () => {
  return gulp.src(srcPath.scss, {
    sourcemaps: true
  })
    .pipe(
      //エラーが出ても処理を止めない
      plumber({
        errorHandler: notify.onError('Error:<%= error.message %>')
      }))
    .pipe(sass({ outputStyle: 'expanded' })) //指定できるキー expanded compressed
    .pipe(gulp.dest(distPath.css, { sourcemaps: './' })) //コンパイル先
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'Sassをコンパイルしました！',
      onLast: true
    }))
}


/**
 * html
 */
const html = () => {
  return gulp.src(srcPath.html)
    .pipe(gulp.dest(distPath.html))
}

/**
 * php
 */
 const php = () => {
  return gulp.src(srcPath.php)
    .pipe(gulp.dest(distPath.php))
}

/**
 * ローカルサーバー立ち上げ
 */
const browserSyncFunc = () => {
  browserSync.init(browserSyncOption);
}

const browserSyncOption = {
  server: distBase
  // server: serverBase
}
/**
 * リロード
 */
const browserSyncReload = (done) => {
  browserSync.reload();
  done();
}

// gulp.task('connect-sync', function(done) {
//   connect.server({
//     port:80,
//     base:'./'
//   }, function (){
//     browser({
//       proxy: 'http://vdon.local/'
//       // proxy: 'http://name.local/' Local
//       // proxy: 'localhost:8888/name' MAMP
//     });
//   });
//   done();
// });

// gulp.task('reload', function(done) {
//   browser.reload();
//   done();
// });


/**
 *
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
  gulp.watch(srcPath.scss, gulp.series(cssSass))
  gulp.watch(srcPath.html, gulp.series(html, browserSyncReload))
  gulp.watch(srcPath.php, gulp.series(php, browserSyncReload))
}

/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 */
exports.default = gulp.series(
  //  gulp.parallel(html, php, cssSass),
   gulp.parallel(cssSass),
   gulp.parallel(watchFiles, browserSyncFunc)
 );
