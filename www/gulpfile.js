//导入你的所需用的工具包 require('node_modules里对应模块')
var gulp = require('gulp'),
    sass = require('gulp-sass'), //转换sass用的
    uglify = require('gulp-uglify'), //混淆js
    // clean = require('gulp-clean'),//清理文件
    // notify = require('gulp-notify'),//加控制台文字描述用的
    autoprefixer = require('gulp-autoprefixer'), //增加私有变量前缀
    minifycss = require('gulp-minify-css'), //压缩css
    concat = require('gulp-concat'), //合并
    // fileinclude = require('gulp-file-include'),// include 文件用
    // template = require('gulp-template'),//替换变量以及动态html用
    rename = require('gulp-rename'), //重命名
    // webserver = require('gulp-webserver'),//一个简单的server，用python的SimpleHttpServer会锁文件夹

    // gulpif  = require('gulp-if'),//if判断，用来区别生产环境还是开发环境的
    rev  = require('gulp-rev'),//加MD5后缀
    revCollector = require('gulp-rev-collector'),
    //revReplace = require('gulp-rev-replace'),//替换引用的加了md5后缀的文件名，修改过，用来加cdn前缀
    // addsrc = require('gulp-add-src'),//pipeline中途添加文件夹，这里没有用到
    base64 = require('gulp-base64'),
    del = require('del'), //也是个删除··· 
    // vinylPaths = require('vinyl-paths'),//操作pipe中文件路径的，加md5的时候用到了
    runSequence = require('run-sequence'), //控制task顺序
    imagemin = require('gulp-imagemin'), //图片压缩
    pngquant = require('imagemin-pngquant'), //png深度压缩（经测试用处不大）
    tinypng = require('gulp-tinypng-compress'), //熊猫深度压缩
    // tinypng = require('gulp-tinypng'),
    cache = require('gulp-cache'), //，在很多情况下我们只修改了某些图片，没有必要压缩所有图片，使用”gulp-cache”只压缩修改的图片，没有修改的图片直接从缓存文件读取（C:UsersAdministratorAppDataLocalTempgulp-cache）
    TY = 'wp-content/themes/tybj/common/',
    HtmlTY = 'wp-content/themes/tybj/',
    N_TY = 'wp-content/themes/tybj/dist/';

// cnpm install --save-dev gulp-sass gulp-uglify gulp-minify-css gulp-concat gulp-rename del

//默认任务
gulp.task('default', ['clean'], function() {
    gulp.start('minifycss', 'minifyjs')
});

//监听sass修改任务
gulp.task('watch', function() {
    return gulp.watch(TY + 'css/*.scss', ['sass']);
    //监听 '+ ty +'dist
});

//删除任务
gulp.task('clean', function(cb) {
    del([N_TY + 'css', N_TY + 'js'], cb)
        //监听 '+ ty +'dist
});


//js压缩任务
gulp.task('minifyjs', function() {
    return gulp.src(TY + 'js/*.js')
        //  .pipe(concat('main.js'))
        //合并所有js到main.js    
        //   .pipe(gulp.dest(N_TY + 'js')) //输出main.js到文件夹      
        //    .pipe(rename({ suffix: '.min' })) //rename压缩后的文件名       
        .pipe(uglify()) //压缩      
        .pipe(gulp.dest(N_TY + 'js')); //输出;
});

/*css类*/
/*
运行css
 */
gulp.task('cssup',['cleancss'], function(callback) {
    runSequence('base64', 'autoprefixer', 'minifycss', callback);
});
// 删除css任务
gulp.task('cleancss', function() {
    del([N_TY + 'css'])
        //监听 '+ ty +'dist
});
// scss任务
gulp.task('sass', function() {
    return gulp.src(TY + 'css/*.scss') //获取该任务需要的文件
        .pipe(sass()) //该任务调用的模块
        .pipe(gulp.dest(N_TY + 'css')); //将在'+ ty +'dist文件生成
});
// base64任务
gulp.task('base64', function () {
    return gulp.src(TY + 'css/*.css') //压缩的文件   
        .pipe(base64({
            baseDir: N_TY + 'images',
            extensions: ['svg', 'png', /\.jpg#datauri$/i],
            maxImageSize: 5*1024, // bytes 图片K数是四写五入，5不包含该5KB
            debug: true
        }))
        .pipe(gulp.dest(N_TY + 'css')); //输出文件夹     
});
//添加替换HTML路径
gulp.task('rev', function() {
    gulp.src([N_TY + 'rev/*.json', HtmlTY + 'sx.html'])   //- 读取 rev-manifest.json 文件以及需要进行css名替换的文件
        .pipe(revCollector())                                   //- 执行文件内css名的替换
        .pipe(gulp.dest(HtmlTY));                     //- 替换后的文件输出的目录
});

//压缩css
gulp.task('minifycss', function() {
    return gulp.src(N_TY + 'css/*.css') //压缩的文件   
        .pipe(minifycss()) //执行压缩
        .pipe(rev()) //- 文件名加MD5后缀
        .pipe(gulp.dest(N_TY + 'css'))//输出文件夹    
        .pipe(rev.manifest())  //- 生成一个rev-manifest.json
        .pipe(gulp.dest(N_TY + 'rev'));     //- 将 rev-manifest.json 保存到 rev 目录内       
});
//增加私有变量前缀
gulp.task('autoprefixer', function() {
    return gulp.src([N_TY + 'css/*.css'])
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true,
            remove: true //是否去掉不必要的前缀 默认：true 
        }))
        //输出到dist文件夹
        .pipe(gulp.dest(N_TY + 'css'));
});
/*css类*/

/*img类*/
//压缩图片
gulp.task('imagemin', function() {
    gulp.src([TY + '/images/*/*.{png,jpg,gif,svg}', TY + '/images/*.{png,jpg,gif,svg}'])
        .pipe(cache(imagemin({
            progressive: true, //類型：Boolean 默認：false 無損壓縮jpg圖片
            svgoPlugins: [{ removeViewBox: false }], //不要移除svg的viewbox屬性
            use: [pngquant()] //确保已安装pngquant，使用pngquant深度壓縮png圖片的imagemin插件
        })))
        .pipe(gulp.dest(N_TY + 'images'));
});

//熊猫压缩图片
gulp.task('tinypng', function() {
    gulp.src(TY + '/images/*.{png,jpg}')
        //     gulp.src([TY + '/images/*/*.{png,jpg,gif,svg}', TY + '/images/*.{png,jpg,gif,svg}'])
        .pipe(tinypng({ //cache功能失效
            key: '8H_dmCos-qKlGxBstOLtfH0jye4xY7mF', //每月500张限额
            sigFile: 'images/.tinypng-sigs',
            log: true
        }))
        .pipe(gulp.dest(N_TY + 'images'));
});
/*img类*/

//用了gulp-cache，原来10来分钟的事情，几十秒就搞定了。用了小半年，一直也没什么问题。gulp-cache的原理是 监控到图片被改变了，替换了，才去压缩。在一般的使用场景都不会有问题，但如果仅仅是改变了图片名字，则不会被替换。eg： 把2016.png改成2017.png,压缩出来的结果图片为2016.png。
gulp.task('cleanCash', function(done) {
    return cache.clearAll(done);
});
