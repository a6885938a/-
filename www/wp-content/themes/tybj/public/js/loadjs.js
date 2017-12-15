    $(function() {
    	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {} else {
    		$('#video').append('<source src="//qiniu.tybj-food.com/video_p1.mp4" type="video/mp4" -webkit-playsinline=true; />')
    	}
    });