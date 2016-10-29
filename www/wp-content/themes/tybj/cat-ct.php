<?php include('include.inc.php');  ?>
<?php $category = get_the_category();//定义分类目录?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>传统礼饼</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="assets/img/favicon.ico">
    <?php include('header_css.php');?>
    <link href="/<?=ty_of?>css/newlist.css" rel="stylesheet">
       <link href="/<?=ty_of?>css/articlelist.css" rel="stylesheet">
</head>
<body class="is-loaded is-scroll">
<?php
include dirname(__FILE__).'/header_list.php'; 
?>
   
        <main class="site-main-1">
                <div class="product bn-dec">
                    <img src="/<?=ty_of?>images/ct/ct-banner.jpg" class="hidden-xs">
                    <div class="container section">
                        <div class="row">
                            <div class="header-text text-center  col-md-8 col-md-offset-2">
                                <p>
                                喜饼是婚嫁的传统食品 </br>
                                    尽管时下婚礼形式越来越不拘一格，但买喜饼，送喜饼，仍是不少新人的“规定动作”。</br>
                                    在馅料口味上，传统的喜饼大体分为四种：</br>
                                    西樵大饼、核桃酥、鸡蛋糕、红菱、白菱、龙凤喜饼</br>
                                    如今随着岁月变迁，又出现了五仁馅、冬蓉、豆蓉、叉烧等的新鲜口味。</br>
                                    这些传统风味的喜饼，一直以来，都较受长辈们喜爱。</br>
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section ">
                    <div class="container">
                                 <div class="row bn-det split--left">
                            <div class=" col-sm-push-6 col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter right over 2s">
                                <div class="col-inner clearfix ">
                                    <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="images/loading.jpg" data-original="images/ct/hts.jpg">
                                </div>
                            </div>
                            <div class="col-sm-pull-6 col-sm-6 pd50">
                                <div class="col-inner">
                                    <div class="section-heading ">
                                        <h3>核桃酥</h3>
                                    </div>
                                    <!-- .section-heading -->
                                    <div class="section-content" style="text-align:left;">
                                        <p>传统糕点核桃酥并非核桃为材料，而是因貌似核桃而得名。我们采用优质面粉，原只新鲜鸡蛋，加上独特的烘焙技术，才能做出 充满历史风味的核桃酥。外层松脆可口，入口即化，回味无穷。
                                        </p>
                                        <p><a href="" class="btn">了解更多</a></p>
                                    </div>
                                    <!-- .section-content -->
                                </div>
                            </div>
                        </div>
                        <div class="row bn-det split--right">
                            <div class="col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter left over 2s">
                                <div class="col-inner clearfix ">
                                    <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="images/loading.jpg" data-original="images/ct/lpb.jpg">
                                </div>
                            </div>
                            <div class="col-sm-6 pd50">
                                <div class="col-inner">
                                    <div class="section-heading ">
                                        <h3>老婆饼</h3>
                                    </div>
                                    <!-- .section-heading -->
                                    <div class="section-content" style="text-align:left;">
                                        <p>起源自广东潮州点心老婆饼，外皮烤成诱人的金黄色，里头一层层的油酥薄如棉纸，酥松得不得了，一咬下去碎屑便掉了满地，每一口都尝得到蜜糖般的香甜滋味！老婆作的饼　受到老板青睐！</p>
                                        <p><a href="" class="btn">了解更多</a></p>
                                    </div>
                                    <!-- .section-content -->
                                </div>
                            </div>
                        </div>
                    <?php if (have_posts()) :$ashu_i=0; ?>
                    <?php setPostViews(get_the_ID());//设置获取阅读数在主循环
                global $query_string;
                 query_posts($query_string . "&order=ASC&cat=6");
                    while (have_posts()) : the_post();$ashu_i++; 
                    ?>
                
                    <?php if($ashu_i==1){ ?>
                        <div class="row bn-det split--left">
                            <div class=" col-sm-push-6 col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter right over 2s"> 
                            <?php }  else { ?>
                               <div class="row bn-det split--right">
                 <div class="col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter left over 2s">
                   <?php } ?>
                                <div class="col-inner clearfix ">
                                    <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="/<?=ty_of?>images/loadbg.jpg"  data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=500&w=500&zc=1"">
                                </div>
                            </div>
                            <div class="col-sm-pull-6 col-sm-6 pd50">
                                <div class="col-inner">
                                    <div class="section-heading ">
                                        <h3><?php the_title(); ?> </h3>
                                    </div>
                                    <!-- .section-heading -->
                                    <div class="section-content" style="text-align:left;">
                                        <p><?php the_excerpt() ?></p>
                                        <p><a href="<?php the_permalink() ?>" class="btn">了解更多</a></p>
                                    </div>
                                    <!-- .section-content -->
                                </div>
                            </div>
                        </div>
             <?php endwhile; ?>  
                <?php endif; ?>
                        </div>
            </main>
  




	

            <?php
            include dirname(__FILE__).'/footer_t.php'; 
            ?>
    </body>
    </html>
            <?php
            include dirname(__FILE__).'/footer_js.php'; 
            ?>
 <script src='/<?=ty_of?>js/newlist.js'></script>