PHP

<?php
/**
 * 日期归档，显示某个日期发布的文章
 * @package Tanhaibo.net
 * @subpackage tanhaibonet
 * @since tanhaibonet 4.1
 */
get_header();
?>

<div id="container">
	<div class="loopcontainer">			
		<div class="tag-description">
			<div class="tag-title">
				<?php if ( is_day() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tanhaibonet' ) ) ); ?>
				<?php elseif ( is_year() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tanhaibonet' ) ) ); ?>
				<?php else : _e( 'Blog Archives', 'tanhaibonet' ); ?>
				<?php endif; ?></div><!-- .tag-title -->
			<div class="tag-content">温馨提示：这是按照文章的发布日期排列显示的，您可以在浏览器的地址栏以天、以月份或者以年份的格式输入您想要查看的日期的文章。例如2013年1月发布的文章，就输入“tanhaibo.net/2013/01”。</div><!-- .tag-content -->
		</div><!-- .tag-description -->
			
		<?php get_template_part( 'loop', 'archive' ); ?>

	</div><!-- .loopcontainer -->
	<?php get_pagenav(); ?>
</div><!-- #container -->

<?php get_categorybar(); ?>
<?php get_footer(); ?>
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
<?php
/**
 * 日期归档，显示某个日期发布的文章
 * @package Tanhaibo.net
 * @subpackage tanhaibonet
 * @since tanhaibonet 4.1
 */
get_header();
?>
 
<div id="container">
	<div class="loopcontainer">			
		<div class="tag-description">
			<div class="tag-title">
				<?php if ( is_day() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tanhaibonet' ) ) ); ?>
				<?php elseif ( is_year() ) : printf( __( '<span>%s发布的所有文章</span>', 'tanhaibonet' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tanhaibonet' ) ) ); ?>
				<?php else : _e( 'Blog Archives', 'tanhaibonet' ); ?>
				<?php endif; ?></div><!-- .tag-title -->
			<div class="tag-content">温馨提示：这是按照文章的发布日期排列显示的，您可以在浏览器的地址栏以天、以月份或者以年份的格式输入您想要查看的日期的文章。例如2013年1月发布的文章，就输入“tanhaibo.net/2013/01”。</div><!-- .tag-content -->
		</div><!-- .tag-description -->
			
		<?php get_template_part( 'loop', 'archive' ); ?>
 
	</div><!-- .loopcontainer -->
	<?php get_pagenav(); ?>
</div><!-- #container -->
 
<?php get_categorybar(); ?>
<?php get_footer(); ?>