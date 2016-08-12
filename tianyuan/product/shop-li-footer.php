<!--回到顶部-->
<div class="returntop">
  <div id="rocket-to-top">
    <div style="opacity:0;display:block;" class="level-2"></div>
    <div class="level-3"></div>
  </div>
</div>
<div id="rocket-wrap-lit" class="visible-xs">
  <div id="rocket-lit" style="display: block;"></div>
</div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script> 
<script src='http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js'></script> 
<script src='../js/totop.js'></script> <!--回到顶部-->
<script src="../js/jquery.qrcode.min.js"></script><!--二维码--> 
<script src="../js/stickUp.min.js"></script> 

<script type="text/javascript"> 
$(document).ready(function(){ 
	$(".qrcode").hover(function(){
$(".qrcode").toggleClass("on-hover");
});
	$('#output').qrcode(window.location.href);
});

</script> 
<script type="text/javascript">
      jQuery(function($) {
        $(document).ready( function() {
          $('.stick-wrapper').stickUp({
                     
                        itemClass: 'menuItem',
                        itemHover: 'active',
                        topMargin: 'auto'
                      });

        });
      });
    </script>
