<template>
   <div class='th-nav wbox rel'>
<!-- <div class="opa1" :style="{ webkitMaskImage:'url(' +post.description+')'}" >12</div> -->
			<a class="class th-nav-back" href="javascript:history.go(-1);"></a>
   <!-- <img class="logo" src="../../src/images/logo.png"/> -->
            <div class="th-nav-title of bg">天园饼家</div>
            </div>
        
</template>
<script>
	export default {
methods:{
gohistory(){
	window.history.go(-1)
}

}
}
</script>


