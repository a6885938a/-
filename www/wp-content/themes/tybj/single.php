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
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>
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
    <script>    
          $(function() {
      $("img.lazy").show().lazyload({
      	  skip_invisible : false,
          effect: "fadeIn"
          });

  });

    </script>
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