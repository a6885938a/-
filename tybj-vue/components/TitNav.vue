<template>
  <div id="naxBox" ref="nav" class='th-nav wbox rel headroom show-top-pannel'  :style="{position: 'fixed',}">
    <!-- <div class="opa1" :style="{ webkitMaskImage:'url(' +post.description+')'}" >12</div> -->
    <!-- <nuxt-link to="/">Back to the home page</nuxt-link> -->
    <a class="class th-nav-back" @click="go()"></a>
    <LogoText :ml='0.5' :isDisplay="isDisplay"/>
    <div class="th-nav-title of bg">{{title?title:''}}</div>
    <TrBtn ref="TrBtn"/>
  </div>
</template>
<script>
import TrBtn from '~/components/TrBtn.vue'
import LogoText from '~/components/LogoText.vue'
export default {
  props: {title:{type:String},isDisplay:{type:String} },

  data() {
    return {
      y: 0,
      td: '',
      fix:100,
      scrollTop: '',
      scrollHeight: '',
      clientHeight: '',
      navHeight: '',
      fixtop: 0,
      isT: 0,
      ToShow: false

    }
  },
  methods:{
    scroll(){
      this.scrollTop = this.getScrollTop();
      this.scrollHeight = this.getScrollHeight();
      this.clientHeight = this.getClientHeight();


      setTimeout(() => { this.isT = this.scrollTop; }, 0);
      // let naxBox = document.getElementById('naxBox').clientHeight;
      let naxBoxWrap = document.getElementById('naxBox')
      // let headHeight = document.getElementById('headHeight').clientHeight;
      let fixHeight = 100
      let classVal = naxBoxWrap.getAttribute("class")
      classVal = classVal.concat('hide-top-pannel')
      if (fixHeight < this.scrollTop && this.isT < this.scrollTop) {
        this.$refs.TrBtn.changeToShow(false)
        naxBoxWrap.classList.remove("show-top-pannel")
        setTimeout(() => { naxBoxWrap.classList.add("hide-top-pannel") }, 0);
      } else if (this.isT > this.scrollTop) {
        naxBoxWrap.classList.remove("hide-top-pannel")
        setTimeout(() => { naxBoxWrap.classList.add("show-top-pannel") }, 0);
      }
    },
    getScrollTop() {
      var scrollTop = 0;
      if (document.documentElement && document.documentElement.scrollTop) {
        scrollTop = document.documentElement.scrollTop;
      } else if (document.body) {
        scrollTop = document.body.scrollTop;
      }
      return scrollTop;
    },
    getClientHeight() {

      var windowHeight = 0;
      if (document.compatMode === "CSS1Compat") {
        windowHeight = document.documentElement.clientHeight;
      } else {
        windowHeight = document.body.clientHeight;
      }

      return windowHeight;
    },
    getScrollHeight() {
      var scrollHeight = 0,
        bodyScrollHeight = 0,
        documentScrollHeight = 0;
      if (document.body) {
        bodyScrollHeight = document.body.scrollHeight;
      }
      if (document.documentElement) {
        documentScrollHeight = document.documentElement.scrollHeight;
      }
      scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
      return scrollHeight;
    },

    go() {
      window.history.go(-1)
     
    },
 
  },
  mounted() {
    window.addEventListener('scroll', this.scroll)
  },
    destroyed() {
    window.removeEventListener('scroll', this.scroll)
  },
  created() {
    // console.log(this.$refs.nav.style.color);
  },
  components: {
    LogoText,TrBtn
  }

}

</script>
