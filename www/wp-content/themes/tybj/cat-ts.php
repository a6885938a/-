<?php include('include.inc.php');  ?>
<?php $category = get_the_category();//定义分类目录?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>特色手信</title>
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
                    <img src="/<?=ty_of?>images/sx/sx-banner.jpg" class="hidden-xs">
                </div>
                <div class="section ">
                    <div class="container">
                    <?php if (have_posts()) :$ashu_i=0; ?>
                    <?php setPostViews(get_the_ID());//设置获取阅读数在主循环
                global $query_string;
                 query_posts($query_string . "&order=ASC&cat=8");
                    while (have_posts()) : the_post();$ashu_i++; 
                    ?>
                    <?php if($ashu_i%2 ==0){ ?>
                        <div class="row bn-det split--left">
                            <div class=" col-sm-push-6 col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter right over 2s"> 
                                <div class="col-inner clearfix ">
                                    <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="/<?=ty_of?>images/loadbg.jpg"  data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=500&w=500&zc=1"">
                                </div>
                            </div>
                            <div class="col-sm-pull-6 col-sm-6 pd50">
                              <?php }  else { ?>
                               <div class="row bn-det split--right">
                 <div class="col-sm-6 m-b-60-xs-max p-r-60-md-min op0" data-scroll-reveal="enter left over 2s">
                 <div class="col-inner clearfix ">
                                    <img class="img-responsive float-l-sm-min m-x-auto-xs-max lazy " src="/<?=ty_of?>images/loadbg.jpg"  data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=500&w=500&zc=1"">
                                </div>
                            </div>
                             <div class="col-sm-6 pd50">
                   <?php } ?>
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