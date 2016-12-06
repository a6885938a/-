//导入你的所需用的工具包 require('node_modules里对应模块')
var gulp = require('gulp'),
    sass = require('gulp-sass'), //转换sass用的
    uglify = require('gulp-uglify'),//混淆js
    // clean = require('gulp-clean'),//清理文件
    // notify = require('gulp-notify'),//加控制台文字描述用的
    // buffer = require('vinyl-buffer'),
    // less = require('gulp-less'),//转换less用的
    // autoprefixer = require('gulp-autoprefixer'),//增加私有变量前缀
    minifycss = require('gulp-minify-css'), //压缩css
    concat = require('gulp-concat'),//合并
// fileinclude = require('gulp-file-include'),// include 文件用
// template = require('gulp-template'),//替换变量以及动态html用
    rename = require('gulp-rename'),//重命名
// webserver = require('gulp-webserver'),//一个简单的server，用python的SimpleHttpServer会锁文件夹
// imagemin = require('gulp-imagemin'),//图片压缩
// gulpif  = require('gulp-if'),//if判断，用来区别生产环境还是开发环境的
// rev  = require('gulp-rev'),//加MD5后缀
// revReplace = require('gulp-rev-replace'),//替换引用的加了md5后缀的文件名，修改过，用来加cdn前缀
// addsrc = require('gulp-add-src'),//pipeline中途添加文件夹，这里没有用到

     del = require('del'),//也是个删除··· 
// vinylPaths = require('vinyl-paths'),//操作pipe中文件路径的，加md5的时候用到了
// runSequence = require('run-sequence');//控制task顺序
// 
     ty = 'wp-content/themes/tybj/';
//默认任务
gulp.task('default', ['clean'], function() {
    gulp.start('minifycss', 'minifyjs')
});
// scss任务
gulp.task('sass', function() {
    return gulp.src(''+ ty +'css/*.scss') //获取该任务需要的文件
        .pipe(sass()) //该任务调用的模块
        .pipe(gulp.dest(''+ ty +'dist/css')); //将在'+ ty +'dist文件生成
});

//监听sass修改任务
gulp.task('watch1', function() {
    return gulp.watch(''+ ty +'css/*.scss', ['sass']);
    //监听 '+ ty +'dist
});

//删除任务
gulp.task('clean', function(cb) {
    del([''+ ty +'dist/css',''+ ty +'dist/js'],cb)
        //监听 '+ ty +'dist
});

//js压缩任务
gulp.task('minify-js', function() {
   return gulp.src(''+ ty +'js/*.js')
   .pipe(concat('main.js')) 
   //合并所有js到main.js    
   .pipe(gulp.dest(''+ ty +'dist/js'))    //输出main.js到文件夹      
   .pipe(rename({suffix: '.min'}))   //rename压缩后的文件名       
   .pipe(uglify())    //压缩      
   .pipe(gulp.dest(''+ ty +'dist/js'));  //输出;
});

//压缩css
gulp.task('minifycss', function() {   
    return gulp.src(''+ ty +'css/*.css') //压缩的文件   
    .pipe(minifycss())   //执行压缩
   .pipe(gulp.dest(''+ ty +'dist/css')) ;  //输出文件夹     
});