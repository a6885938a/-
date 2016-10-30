<?php include('include.inc.php');  ?>
<?php $category = get_the_category();//定义分类目录?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>天园月饼</title>
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
                    <img src="/<?=ty_of?>images/yb/yb-banner.jpg" class="hidden-xs">
                     <div class="container section">
                        <div class="row">
                            <div class="header-text text-center  col-md-8 col-md-offset-2">
                                <p>月饼是久负盛名的中国传统小吃之一，中秋节节日食俗。</br>
                                月饼圆又圆，又是合家分吃，象征着团圆和睦，在中秋节这一天是必食之品。</br>古代月饼被作为祭品于中秋节所食。</br>据说中秋节吃月饼的习俗于唐朝开始。</br>北宋之时，在宫廷内流行，但也流传到民间，当时俗称“小饼”和“月团”。</br>
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                             <div class="" style="background:url(/<?=ty_of?>images/yb/bg.jpg);">
                        <div class=" services">
        
                            <ul class="row bn-det">
                                        <?php if (have_posts()) :$ashu_i=0; ?>
                    <?php setPostViews(get_the_ID());//设置获取阅读数在主循环
                global $query_string;
                 query_posts($query_string . "&order=ASC&cat=8");
                    while (have_posts()) : the_post();$ashu_i++; 
                    ?>
                                <li class="col-xs-12 col-sm-6 col-md-4 op0 " data-scroll-reveal="enter top over 1s ">
                                    <a href="prescription ">
                                        <div class="goods-pic">
                                            <figure><img class="lazy" src="/<?=ty_of?>images/loadbg.jpg"  data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=250&w=250&zc=1""></figure>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                        <p><a href="<?php the_permalink() ?>" class="btn">了解更多</a></p>
                                    </a>
                                </li>
                        
                   <?php endwhile; ?>  
                <?php endif; ?>
                            </ul>
   
                        </div>
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