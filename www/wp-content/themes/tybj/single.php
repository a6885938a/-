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

    <link href="/<?=ty_of?>css/newlist.css" rel="stylesheet">


</head>

<body class="is-loaded is-scroll">
<?php
include dirname(__FILE__).'/header_list.php'; 
?>
 <div id="main" class="container mt10">
                <div class="row ">
                    <div class="col-md-9 act pd0">
                        <div class="newleft">
							<?php
                            // Start the 获取文章次数
                            setPostViews(get_the_ID());
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
//评论模块
			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
			// 	comments_template();
			// }
//文章导航
			// if ( is_singular( 'attachment' ) ) {
			// 	// Parent post navigation.
			// 	the_post_navigation( array(
			// 		'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
			// 	) );
			// } elseif ( is_singular( 'post' ) ) {
			// 	// Previous/next post navigation.
			// 	the_post_navigation( array(
			// 		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
			// 			'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
			// 			'<span class="post-title">%title</span>',
			// 		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
			// 			'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
			// 			'<span class="post-title">%title</span>',
			// 	) );
			// }

			// End of the loop.
		endwhile;
		?>
                        </div> 
                                       <div class="xianguan">
                            <div class="xianguantitle">相关文章！</div>
                            <ul class="pic web-of">
                       

<?php
global $post;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 3,
          'caller_get_posts' => 1
      );
  query_posts($args);
  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>
          <li>
                                    <a href="<?php the_permalink() ?>" target="_blank">
                                        <div class="pic-left goods-pic ">
                                            <img src="http://dev.thgo8.com/public/wapsite/images/footer/foot_03.png" class="attachment-medium wp-post-image" alt="iji">
                                        </div>
                                    </a>
                                    <div class="pic-right">
                                        <a rel="bookmark" href="" title="  <?php the_title(); ?> " class="link" target="_blank">  <?php the_title(); ?> </a>
                                        <address class="xianaddress">
                                            <time>
                                                <?php the_time('Y-n-j'); ?> </time>
                                            阅 <?php get_post_views($post -> ID); ?> </address>
                                    </div>
                                </li>
                        
<?php
    }
  }
  else {
    echo '<li>* 暂无相关文章</li>';
  }
  wp_reset_query();
}
else {
  echo '<li>* 暂无相关文章</li>';
}
?>

                            </ul>
                        </div>
            </div><!-- col-md-9 -->
                <div class="col-md-3 column">
                  <?php
include dirname(__FILE__).'/sitebar.php'; 
?><!-- col-md-3 -->

                    </div>
                    </div>
            </div>
                <!--newslist-->



		<!-- 外部的html结构应该替换成自己模板的结构 -->
	

            <?php
include dirname(__FILE__).'/footer_t.php'; 
?>
   </body>
    </html>
    <?php
    include dirname(__FILE__).'/footer_js.php'; 
    ?>
  <script type="text/javascript">
    $(function() {
        var elm = $('.sitebar_list');
        var startPos = $(elm).offset().top;
        $.event.add(window, "scroll", function() {
            var p = $(window).scrollTop();
            $(elm).css('position', ((p) > startPos) ? 'fixed' : 'static');
            $(elm).css('top', ((p) > startPos) ? '0px' : '');
        });
    });
    </script>
    <script type="text/javascript">
/* <![CDATA[ */
var kodex_posts_likes = {"ajaxurl":"..\/..\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
    <script type='text/javascript' src='../wp-content/plugins/kodex-posts-likes/public/js/kodex-posts-likes-public.js'></script>
    <script>
     //    $('.kodex_button').click(function(){
     //    	console.log(123);
    	// 	$('.kodex_buttons button .icon').removeClass('tgood').addClass('tgood').hide();
    	// });
    	//    $('.kodex_button_active').on('click',function(){
    	// 	$('.kodex_buttons button .icon').removeClass('tgood');
    	// };
    // $('.kodex_button').on('click',function(){
    // 	var like = $('.kodex_like_button').hasClass('kodex_button_active');
    // 	if(like){
    // 		$('.kodex_buttons button .icon').removeClass('tgood');
    // 	}else{
    // 		$('.kodex_buttons button .icon').addClass('tgood');
    // 	}
    // });
    //     $('.kodex_button_active').on('click',function(){
    // 		$('.kodex_buttons button .icon').removeClass('tgood');
    // });

    	
    </script>
        <script type="text/javascript">
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

    } else {
        $('.xianguan .pic').removeClass('web-of').addClass('pc-of');
    }
    </script>
    