<?php include('include.inc.php');  ?>
<?php
/**
 * Template Name: Article List
 *
 */

/** 如果你需要为该页面引入自定义的脚本的样式表，写在这里,不需要自定义样式就删除下面两行代码 */
//wp_enqueue_script( 'articleList', get_template_directory_uri() . '/articlelist.js' );
wp_enqueue_style( 'articleList', get_template_directory_uri() . '/articlelist.css');

// get_header(); 

/** 配置信息 */

/**
 * 排序字段
 * 可以是none, ID, author, title, date, modified, parent, rand, comment_count, menu_order, meta_value, meta_value_num
 */

$order_by = 'date'; 

/** 升序还是降序，DESC表示降序，ASC表示升序 */
$order = 'DESC';

/** 每页显示多少篇文章 */
$posts_per_page = 10;

/**
 * 只显示或不显示某些目录下的文章,目录ID用逗号分隔，排除目录前面加-
 * 例如排除目录29和30下的文章, $cat = '-29,-30';
 * 只显示目录29和30下的文章, $cat = '29, 30';
 */
$cat = '';

/** 是否只在第一页显示页面内容，false表示只在第一页显示页面内容 */
$show_content = true;
/* 配置结束 **/

/** 获取该页面的标题和内容 */
global $post;
$post_title = $post->post_title;
if( $show_content || $paged == 1  ) $post_content = apply_filters('the_content', $post->post_content);

/** 当前显示的是第几页 */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

/** 用WP_Query获取posts */
$post_list = new WP_Query(
	"posts_per_page=" . $posts_per_page .
	"&orderby=" . $order_by .
	"&order=" . $order .
	"&cat=" . $cat .
	"&paged=" . $paged
);

?>
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
    <link href="/<?=ty_of?>css/newlist.css" rel="stylesheet">
       <link href="/<?=ty_of?>css/newlist.css" rel="stylesheet">
       <link href="/<?=ty_of?>css/articlelist.css" rel="stylesheet">
<style>
	.wp-pagenavi{float: right; }

</style>

</head>

<body class="is-loaded is-scroll">
        <header class="site-header stc">
                <nav class="navbar navbar-theme ">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <div class="navbar-brand-wrap">
                                <a class="navbar-brand" href="index.html"> <img src="/<?=ty_of?>images/logo.png" alt=""> </a>
                            </div>
                        </div>
                        <!-- .navbar-header -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="home"><a href="index.html">首页</a></li>
                                <li class="about"><a href="index.html#about">荣誉产品</a></li>
                                <li class="bri"><a href="index.html#brief_1">走进天园</a></li>
                                <li class="pri  active"><a href="index.html#pricing">天园资讯</a></li>
                                <li class="con"><a href="index.html#contact">联系我们</a></li>
                                <li class="audio-toggle"><a href="#"><i class="fa fa-volume-up"></i></a></li>
                            </ul>
                        </div>
                        <!-- .navbar-collapse -->
                    </div>
                </nav>
            </header>    
             <!--newslist-->

                     <img class="lazy" src="/<?=ty_of?>images/loading.jpg" 
        data-original="<?php echo get_the_post_thumbnail($post->ID, 'thumbnail');
?>"   alt="<?php the_title(); ?>" />   
         <div id="main" class="container mt10">
                <div class="row ">
                    <div class="col-md-9 pd0">
                        <ul class="newleft">
							<?php while ( $post_list->have_posts() ) : $post_list->the_post(); ?>
						
						<?php
						//给文章链接加一个title属性
						$title =  preg_replace("'[\n\r\s\t]'","",strip_tags( get_the_content() )); 
						$title = mb_strimwidth( $title, 0, 160, ' ...');
						?>	
<img src="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=150&w=200&zc=1" alt="<?php the_title(); ?>" class="thumbnail"/>

 
<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>">
                            <li class="list">
                                <div class="mecc">
                                    <h2 class="mecctitle">
                                 <a href="<?php the_permalink() ?>" target="_blank">
                              <?php the_title(); ?> 
                                </a>
                                 </h2>
                                    <address class="meccaddress">
                                        <time><?php echo esc_html( get_the_date() ); ?></time>
                                        -
                                        <a href="<?php the_permalink() ?>" rel="category tag">个人成长</a> - 阅 1,269 </address>
                                </div>
                                <span class="titleimg ">

        <a href="<?php the_permalink() ?>" target="_blank">

	

         <img class="lazy" src="<?php the_title(); ?>" 
        data-original="<?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID,'Large', true));
echo $thumbnail_image_url[0];
?>"   alt="<?php the_title(); ?>" />   
        
         </a>
        </span>
                                <div class="zuiyao hidden-xs">
                                    <a href="">
                                        <p>你家离公司远不远，你的工资能不能付得起房租，你午饭吃的白菜还是大虾，这都是你个人的事情，跟公司一毛钱关系都没有。公司只为你给公司创造的价值和效益买单，价值越高，薪水越高。人最宝贵的，就是认清自己的价值，一个人的薪水跟职场价值基本上是匹配的..</p>
                                    </a>
                                </div>
                                <div class="clear"></div>
                            </li>
         		<?php endwhile; ?>
                        </ul> <!-- col-md-9 -->
            	<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $post_list) );  ?>
                    </div>
                    <div class="col-md-3 column">
                        <div id="sitebar" class="sitebar-right">
                            <div id="soutab">
                                <form method="get" class="search" action="http://www.ishayou.com/">
                                    <input class="text" type="text" name="s" placeholder=" 请输入关键词" value="">
                                    <input class="butto" value="搜索" type="submit">
                                </form>
                            </div>
                            <div class=" hidden-xs">
                                <span class="tagtitle">整体规划</span>
                                <div id="tagg">
                                    <ul id="menu-%e5%8f%b3%e4%be%a7%e8%8f%9c%e5%8d%95" class="menu">
                                        <li id="menu-item-603" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-603"><a href="http://www.ishayou.com/category/yunyin/marketfenxi">市场分析</a></li>
                                        <li id="menu-item-751" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-751"><a href="http://www.ishayou.com/category/yunyin/yonghuyajiu">用户研究</a></li>
                                        <li id="menu-item-611" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-611"><a href="http://www.ishayou.com/category/yunyin/dingwei">定位/差异化</a></li>
                                        <li id="menu-item-605" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-605"><a href="http://www.ishayou.com/category/yunyin/design">产品/服务设计</a></li>
                                        <li id="menu-item-604" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-604"><a href="http://www.ishayou.com/category/yunyin/yonghu">用户体验</a></li>
                                        <li id="menu-item-845" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-845"><a href="http://www.ishayou.com/category/yunyin/shuju">数据分析</a></li>
                                        <li id="menu-item-118" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-118"><a href="http://www.ishayou.com/category/yunyin/yunyings">运营思维</a></li>
                                    </ul>
                                </div>
                                <div class="sitebar_list">
                                    <h4 class="sitebar_title">随机热文</h4>
                                    <ul class="sitebar_list_ul">
                                        <li><a href="http://www.ishayou.com/805.htm" target="_blank">没有功劳也有苦劳，你是如何看待？</a> </li>
                                         <li><a href="http://www.ishayou.com/805.htm" target="_blank">没有功劳也有苦劳，你是如何看待？</a> </li>
                                          <li><a href="http://www.ishayou.com/805.htm" target="_blank">没有功劳也有苦劳，你是如何看待？</a> </li>
                                          <li><a href="http://www.ishayou.com/805.htm" target="_blank">没有功劳也有苦劳，你是如何看待？</a> </li>
                                          <li><a href="http://www.ishayou.com/805.htm" target="_blank">没有功劳也有苦劳，你是如何看待？</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--newslist-->



		<!-- 外部的html结构应该替换成自己模板的结构 -->
	

            <?php
include dirname(__FILE__).'/footer_t.php'; 
?>

    <?php
    include dirname(__FILE__).'/footer_js.php'; 
    ?>
    <script>    
          $(function() {
      $("img.lazy").show().lazyload({
          effect: "fadeIn",
          threshold :100
          });

  });
    </script>