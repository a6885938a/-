<?php include('include.inc.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>西樵天园饼家</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="assets/img/favicon.ico">
    <?php include('header_css.php');  ?>
     <link rel='stylesheet' href='<?=ty_of?>css/tybj.css<?=version?>'>
     <link rel="stylesheet" type="text/css" href="<?=ty_of?>css/swiper.min.css">
</head>

<body class="is-loaded">
    <div class="site">
        <div class="site-canvas1">
            <?php include('header_t.php'); ?>
            <!-- .site-header -->
            <main class="site-main-1">
                <!--change-->
                <div id="home" class="section block-primary position-r align-c-xs-max" style="  overflow: hidden;">
                    <div class="video_play" style="   -webkit-filter:brightness(.7);filter: brightness(0.7);">
                        <video id="video1" autoplay loop muted="muted" poster="<?=ty_of?>images/video_img.jpg" webkit-playsinline />
                        <source src="<?=ty_of?>images/video_p1.mp4" type="video/mp4" -webkit-playsinline=true; />
                        </video>
                    </div>
                    <div class="container">
                        <div class="row row-table">
                            <div class="col-sm-12">
                                <div class="col-inner op0" data-scroll-reveal="enter left over 1.5s " style=" margin-top:-40px;">
                                    <div class="section-heading ">
                                        <h1 style=" text-align:center;"><img style="width:100%;padding:0 8%" src="<?=ty_of?>images/wenzi.png" ></h1>
                                    </div>
                                    <!-- .section-heading -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #home -->
                <!-- #about -->
                <div id="about" class="section p-a-0 align-c">
                    <div class="product" style="position: relative;">
                        <div class="container">
                            <div class="col-md-12 column">
                                <div class="hor-view" style="float:left;margin-right:10px; margin-bottom:10px;">
                                    <a href="ct.html" >
                                        <div class="grid">
                                            <div class="figure">
                                                <figure class="effect-apollo">
                                                    <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/01.jpg" alt="img18">
                                                    <figcaption>
                                                        <h2>传统 <span>喜饼</span></h2>
                                                        <p>西樵大饼
                                                            <br/>鸡蛋糕
                                                            <br/>核桃酥
                                                            <br/>老婆饼
                                                            <br/>莲蓉皮蛋酥
                                                            <br/>叉烧酥
                                                            <br/>红菱、白菱
                                                            <br/>龙凤喜饼
                                                        </p>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hor-gap"></div>
                                <div class="r ver-view" style="float:left;">
                                    <a href="sx.html" style="margin-bottom:10px;">
                                        <div class="grid">
                                            <div class="figure">
                                                <figure class="effect-apollo">
                                                    <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/02.jpg" alt="img18">
                                                    <figcaption class="li2">
                                                        <h2 style="float:right; width:60px;"> <span>特产手信</span></h2>
                                                        <p>鸡仔饼
                                                            <br/>杏仁饼
                                                        </p>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="yb.html" style="margin-bottom:10px;">
                                        <div class="grid">
                                            <div class="figure">
                                                <figure class="effect-apollo">
                                                    <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/03.jpg" alt="img18">
                                                    <figcaption>
                                                        <h2><span>月饼系列</span></h2>
                                                        <p>双黄莲蓉
                                                            <br/>单黄莲蓉
                                                            <br/>麒麟松子
                                                            <br/>水果月饼
                                                        </p>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pre-bg"></div>
                    </div>
                </div>
                <!-- #about -->
                <!-- #brief_1 -->
                <div id="brief_1" class="section block-default align-c-xs-max">
                    <div class="container">
                        <div class="row ">  
               

       
                                <div class="section-heading " style="text-align:center;padding-bottom: 50px; ">
                                        <h2>走进天园</h2>
                                        <h5>Company Profile</h5>
                                    </div>
                   
                            <div class="col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter left over 2s">
                                <div class="col-inner clearfix ">
                                    <div class="swiper-container swiper">
                                        <!--          图片尺寸555-373 -->
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/w-1.jpg">
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/w-2.jpg">
                                            </div>
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination swiper-pagination"></div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <!-- <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="images/loading.jpg" data-original="images/jjbg.jpg"> -->
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="col-inner">

                            
                                 <!--    <div class="section-heading ">
                                        <h2>走进天园</h2>
                                        <h5>Company Profile</h5>
                                    </div> -->
                                    <!-- .section-heading -->
                                    <div class="section-content" style="text-align:left;">
                                        <p>天园饼家始建于清光绪二十四（1898年），是首家制作正宗西樵大饼的饼坊，至今已鼎承六代之传承，逾百年历史之久，并荣膺“非物质文化遗产”西樵大饼传承人。</p>
                                        <p>天园饼家主经营传统西樵大饼、鸡蛋糕、核桃酥、月饼、龙凤礼饼、鸡仔饼、嫁女饼等更是中外驰名，产品远销海内外。</p>
                                    </div>
                                    <!-- .section-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #brief_2 -->
                <div id="pricing" class="section block-warning align-c">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-inner">
                                    <div class="section-heading">
                                        <a href="<?php $comment_count = get_post(110)->guid; 
                                        echo $comment_count;?> " class="color:#333;">
                                            <h2>天园资讯</h2>
                                            <h5>News  Information Customers</h5>
                                            <h6>更多>></h6>
                                        </a>
                                    </div>
                                    <div class="section-content m-t-60-sm-min services">

                <?php global $post; $categories = get_the_category(); //函数获取分类ID好
                foreach ($categories as $category){
                 ?>
                <ul class="row"  >
                <?php $posts = get_posts('numberposts=6&orderby=post_date&date='. $category->term_id);
                 foreach($posts as $post){
                ?>
                <li class="col-xs-12 col-sm-6 col-md-4 op0" data-scroll-reveal="enter top over 1s ">
                    <a href="<?php the_permalink(); ?>">
                        <div class="goods-pic">
                            <figure><img class="lazy"  src="<?=ty_of?>images/loading.jpg"   data-original="<?php echo catch_that_image() ?>" ></figure>
                        </div>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </li>
                <?php } ?>                    
                </ul>
                <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contact" class="section block-default">
                    <div class="container">
                        <div class="section-heading text-center">
                            <h2>联系我们</h2>
                            <h5>Contact Us</h5>
                        </div>
                        <div class="row section-content m-t-60-sm-min">
                            <div class="col-sm-6 col-md-5">
                                <div class="col-inner">
                                    <div class="icon-box _left">
                                        <div class="icon-box-media" data-scroll-reveal="enter left over 1s and move 20px"> <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/picture/cook_1.png" alt=""> </div>
                                        <div class="icon-box-heading">
                                            <h4>销售热线</h4>
                                        </div>
                                        <div class="icon-box-content font-sub"> <span><a style="color:#313131;"href="tel:0757-86896293">0757-86896293</a></span>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="icon-box _left">
                                        <div class="icon-box-media" data-scroll-reveal="enter left over 1s and move 20px after 0.2s"> <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/picture/cook_2.png"> </div>
                                        <div class="icon-box-heading">
                                            <h4>邮箱地址</h4>
                                        </div>
                                        <div class="icon-box-content font-sub font-italic"> <span>309781301@qq.com </span>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="icon-box _left">
                                        <div class="icon-box-media" data-scroll-reveal="enter left over 1s and move 20px after 0.4s"> <img class="lazy" src="<?=ty_of?>images/loading.jpg" data-original="<?=ty_of?>images/picture/cook_3.png"> </div>
                                        <div class="icon-box-heading">
                                            <h4>工厂店址</h4>
                                        </div>
                                        <div class="icon-box-content font-sub"> <span>佛山市南海区西樵镇樵北中学西侧200米</span> </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
                            <div class="col-sm-6 col-md-offset-1 m-t-60-xs-max hidden-xs" style="width:550px;height:350px;border:#ccc solid 1px;  padding:0;" id="dituContent"> </div>
                        </div>
                    </div>
                </div>
                <!-- #contact -->
            </main>
            <!-- .site-main -->
            <?php
include dirname(__FILE__).'/footer_t.php'; 
?>
            <!-- .site-footer -->
        </div>
    </div>
    <!--回到顶部-->
    <div class="returntop">
        <div id="rocket-to-top">
            <div style="opacity:0;display:block;" class="level-2"></div>
            <div class="level-3"></div>
        </div>
    </div>
    <div id="rocket-wrap-lit" class="visible-xs">
        <div id="rocket-lit"></div>
    </div>

            <!-- .site-footer -->
        </div>
      <script src='<?=ty_of?>js/scrollReveal.min.js'></script>
    <?php
    include dirname(__FILE__).'/footer_js.php'; 
    ?>
    <script src='<?=ty_of?>js/bd-map.js'></script>
    <script src="<?=ty_of?>js/swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: 4000,
        autoplayDisableOnInteraction: false,
        loop: true
    });
    </script>
</body>

</html>
