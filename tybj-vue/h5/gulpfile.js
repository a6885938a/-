//导入你的所需用的工具包 require('node_modules里对应模块')
var gulp = require('gulp'),
    // sass = require('gulp-sass'), //转换sass用的
    uglify = require('gulp-uglify'), //混淆js
    clean = require('gulp-clean'), //清理文件

    autoprefixer = require('gulp-autoprefixer'), //增加私有变量前缀
    minifycss = require('gulp-minify-css'), //压缩css
    concat = require('gulp-concat'), //合并

    htmlmin = require('gulp-htmlmin')
pump = require('pump'),
    rename = require('gulp-rename'), //重命名

    rev = require('gulp-rev'), //加MD5后缀
    revCollector = require('gulp-rev-collector'),

    base64 = require('gulp-base64'),
    del = require('del'), //也是个删除··· 
    // vinylPaths = require('vinyl-paths'),//操作pipe中文件路径的，加md5的时候用到了
    runSequence = require('run-sequence'), //控制task顺序
    imagemin = require('gulp-imagemin'), //图片压缩
    pngquant = require('imagemin-pngquant'), //png深度压缩（经测试用处不大）
    tinypng = require('gulp-tinypng-compress'), //熊猫深度压缩
    // tinypng = require('gulp-tinypng'),
    cache = require('gulp-cache'), //，在很多情况下我们只修改了某些图片，没有必要压缩所有图片，使用”gulp-cache”只压缩修改的图片，没有修改的图片直接从缓存文件读取（C:UsersAdministratorAppDataLocalTempgulp-cache）
    replace = require('gulp-replace'), //取代插件
    // rev = require('gulp-rev-append'), 
    TY = 'wp-content/themes/tybj/common/',
    HtmlTY = './',
    N_TY = './dist/';

//删除任务
gulp.task('cleanall', function(cb) {
    return gulp.src(N_TY, {
            read: false
        })
        .pipe(clean());
    //监听 '+ ty +'dist
});



/*
运行css
 */

// base64任务
gulp.task('base64', function() {
    return gulp.src(HtmlTY + 'css/*.css') //dist的文件   
        .pipe(base64({
            baseDir: HtmlTY + 'images',
            extensions: ['svg', 'png', /\.jpg#datauri$/i],
            maxImageSize: 5 * 1024, // bytes 图片K数是四写五入，5不包含该5KB
            debug: true
        }))
        .pipe(gulp.dest(N_TY + 'css')); //输出文件夹     
});
//添加替换HTML路径
//Images 根据MD5获取版本号
gulp.task('revImg', function() {
    return gulp.src([HtmlTY + '/images/*.{png,jpg,gif,svg}', N_TY + '/images/*.{png,jpg,gif,svg}'])
        .pipe(rev())
        .pipe(gulp.dest(N_TY + 'images'))
        .pipe(rev.manifest())
        .pipe(gulp.dest(N_TY + 'rev/images'));
});

//CSS里更新引入文件版本号
gulp.task('revCss', function() {
    return gulp.src([N_TY + 'rev/images/*.json', N_TY + 'css/*.css'])
        .pipe(revCollector())
        .pipe(gulp.dest(N_TY + 'css'));
});

//压缩css
gulp.task('minifycss', function() {
    return gulp.src(HtmlTY + 'css/*.css') //压缩的文件
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true,
            remove: false //是否去掉不必要的前缀 默认：true 
        }))
        .pipe(base64({
            baseDir: N_TY + 'images',
            extensions: ['svg', 'png', /\.jpg#datauri$/i],
            maxImageSize: 5 * 1024, // bytes 图片K数是四写五入，5不包含该5KB
            debug: true
        }))
        .pipe(minifycss()) //执行压缩
        .pipe(rev()) //- 文件名加MD5后缀
        .pipe(gulp.dest(N_TY + 'css')) //输出文件夹    
        .pipe(rev.manifest()) //- 生成一个rev-manifest.json
        .pipe(gulp.dest(N_TY + 'rev/css')); //- 将 rev-manifest.json 保存到 rev 目录内       
});


//js压缩任务

gulp.task('uglifyjs', function(cb) {
    return gulp.src(HtmlTY + 'js/*.js')
        .pipe(uglify()) //压缩      
        .pipe(rev()) //- 文件名加MD5后缀
        .pipe(gulp.dest(N_TY + 'js')) //输出文件夹    
        .pipe(rev.manifest()) //- 生成一个rev-manifest.json
        .pipe(gulp.dest(N_TY + 'rev/js')); //- 将 rev-manifest.json 保存到 rev 目录内
});



//增加私有变量前缀
gulp.task('autoprefixer', function() {
    return gulp.src([HtmlTY + 'css/*.css'])
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
    gulp.src([HtmlTY + '/images/*.{png,jpg,gif,svg}'])
        .pipe(cache(imagemin({
            progressive: true, //類型：Boolean 默認：false 無損壓縮jpg圖片
            svgoPlugins: [{
                removeViewBox: false
            }], //不要移除svg的viewbox屬性
            use: [pngquant()] //确保已安装pngquant，使用pngquant深度壓縮png圖片的imagemin插件
        })))
        .pipe(gulp.dest(N_TY + 'images'));
});



//开发构建
gulp.task('dist', function(ck) {
    runSequence(
        'cleanall',
        'revImg',
        'minifycss',
        'revCss', //CSS里更新引入文件版本号
        'uglifyjs', //压缩css,js
        'miniHtml'
    );

});

gulp.task('miniHtml', function() {
    var options = {
        removeComments: true, //清除HTML注释
        collapseWhitespace: true, //压缩HTML

    };
    setTimeout(function() {
        gulp.src([N_TY + 'rev/*/*.json', HtmlTY + '*.html']) //- 读取 rev-manifest.json 文件以及需要进行css名替换的文件
            .pipe(revCollector()) //- 执行文件内css名的替换
            // .pipe(revappend()) //图片版本号  
            .pipe(htmlmin(options))
            .pipe(gulp.dest(N_TY)); //- 替换后的文件输出的目录
    }, 2000)
});