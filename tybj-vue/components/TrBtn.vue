<template>
          <div class="js-tr">
         
            <div class="jstr-btn" @click="ToShow = !ToShow"></div>
            <ul class="nav-more-list" id="sub-title" v-if="ToShow">
            <li><nuxt-link :to="'/'" class="nav-more-icon home-icon">首页</nuxt-link></li>
            <li><nuxt-link :to="'/media'" class="nav-more-icon media-icon">媒体报道</nuxt-link></li>
            <li><nuxt-link :to="'/about'" class="nav-more-icon about-icon">天园简介</nuxt-link></li>
            <li><nuxt-link :to="'/contact'" class="nav-more-icon contact-icon" >联系我们</nuxt-link></li>
            </ul>
            <!-- <div class="dialog_overlay" :style="{dispaly:ToShow?'block':'none'}"></div> -->
        </div>
</template>
<script>
export default {
     data() {
    return {
      ToShow: false}},
        methods: {
              scroll() {
      this.scrollTop = this.getScrollTop();
      this.scrollHeight = this.getScrollHeight();
      this.clientHeight = this.getClientHeight();
      // console.log(this.scrollTop);
      // console.log(this.scrollHeight);
      // console.log(this.scrollHeight);
      setTimeout(() => { this.isT = this.scrollTop; }, 0);

      let naxBox = document.getElementById('naxBox').clientHeight;
      let naxBoxWrap = document.getElementById('naxBox')
      let headHeight = document.getElementById('headHeight').clientHeight;
      let fixHeight = naxBox + headHeight
      let classVal = naxBoxWrap.getAttribute("class")
      classVal = classVal.concat('hide-top-pannel')


      if (fixHeight < this.scrollTop && this.isT < this.scrollTop) {
        this.ToShow=false;

        naxBoxWrap.classList.remove("show-top-pannel")
        setTimeout(() => { naxBoxWrap.classList.add("hide-top-pannel") }, 0);
      } else if (this.isT > this.scrollTop) {
        naxBoxWrap.classList.remove("hide-top-pannel")
        setTimeout(() => { naxBoxWrap.classList.add("show-top-pannel") }, 0);


      }
    }, getScrollTop() {
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

    }

        },
         mounted
() {
    window.addEventListener('scroll', this.scroll)
  },
  destroyed() {
    window.removeEventListener('scroll', this.scroll)

  },
    }
</script>

