<template>
  <div id="naxBox" ref="nav" class='th-nav wbox rel headroom show-top-pannel'  :style="{position: 'fixed',}">
    <!-- <div class="opa1" :style="{ webkitMaskImage:'url(' +post.description+')'}" >12</div> -->
    <!-- <nuxt-link to="/">Back to the home page</nuxt-link> -->
    <a class="class th-nav-back" @click="go()"></a>
    <LogoText :ml='0.5' :isDisplay="isDisplay"/>
    <div class="th-nav-title of bg">{{title?title:''}}</div>
    <TrBtn/>
  </div>
</template>
<script>
import TrBtn from '~/components/TrBtn.vue'
import LogoText from '~/components/LogoText.vue'
export default {
  props: { fixtop: { type: Number },title:{type:String},isDisplay:{type:String} },

  data() {
    return {
      y: 0,
      td: '',
      fix:100
    }
  },
  methods: {
    init() {

    },

    go() {
      window.history.go(-1)
      // this.$router.go(-1)
    },
 
  },
  mounted() {

    this.init();

  },
  created() {
    // console.log(this.$refs.nav.style.color);
  },
  components: {
    LogoText,TrBtn
  }

}

</script>
