<template>
   <div class='th-nav wbox rel'>
<!-- <div class="opa1" :style="{ webkitMaskImage:'url(' +post.description+')'}" >12</div> -->
 <!-- <nuxt-link to="/">Back to the home page</nuxt-link> -->
			<a  href="javascript:"  class="class th-nav-back" @click="go()"></a>
   <!-- <img class="logo" src="../../src/images/logo.png"/> -->
            <div class="th-nav-title of bg">天园饼家</div>
            </div>
        
</template>
<script>
	export default {

methods:{
	go () {
      this.$router.go(-1)
    }
	}

}
</script>


