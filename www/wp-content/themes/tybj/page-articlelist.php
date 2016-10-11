<?php
/**
 * Template Name: Article List
 *
 */

/** 如果你需要为该页面引入自定义的脚本的样式表，写在这里,不需要自定义样式就删除下面两行代码 */
//wp_enqueue_script( 'articleList', get_template_directory_uri() . '/articlelist.js' );
wp_enqueue_style( 'articleList', get_template_directory_uri() . '/articlelist.css');

get_header(); 

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

		<!-- 外部的html结构应该替换成自己模板的结构 -->
		<div id="primary">
			<div id="content" role="main">
			
			    <!-- 这里显示的是当前页面的标题和内容，在后台编辑器编辑即可 -->
				<h1 class="entry-title"><?php echo $post_title; ?></h1>
				
				<?php if( $show_content || $paged == 1  ) : ?>
				<div class="entry-content">
					<?php echo $post_content; ?>				
				</div><!-- .entry-content -->
				<?php endif; ?>
				
			<!-- 这里开始，输出文章列表，全局标量被更改-->	
			<?php if ( $post_list->have_posts() ) : ?>
			
			    <!-- 用无序列表显示文章列表 -->
				<div class="entry-content">
					<ul class="article-list">
					<?php while ( $post_list->have_posts() ) : $post_list->the_post(); ?>
						
						<?php
						//给文章链接加一个title属性
						$title =  preg_replace("'[\n\r\s\t]'","",strip_tags( get_the_content() )); 
						$title = mb_strimwidth( $title, 0, 160, ' ...');
						?>			
						<li>
							<!-- 带连接的文章标题 -->
							<span class="post-title">
								<a href="<?php the_permalink() ?>" title="<?php echo $title; ?>" target="_blank"><?php the_title(); ?></a>
							</span>
							<!-- 显示评论数 -->							
							<span class="post-comment"><?php comments_number( '', '1条评论', '%条评论' ); ?></span>
							<!-- 显示发布日期 -->
							<span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>

						</li>
					<?php endwhile; ?>
					</ul>
					
					<!-- 用wp_pagenavi插件分页 -->
					<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $post_list) );  ?>
					
				</div><!-- .entry-content -->
				<!-- 文章列表显示结束 -->
				
				<?php endif; ?>
				
				<?php
				
				/** 如果希望继续显示当前页面的评论等内容，需要将全局变量复位 */				
				wp_reset_postdata();
				?>
				<!-- 显示文章列表完成 -->
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>