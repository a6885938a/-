<template>
  <div>
    <!-- <a  href="javascript:"  class="class th-nav-back" @click="go()">123</a> -->
    <!-- <nuxt-link to="/page">123321</nuxt-link> -->
    <TitNav ref="nav" :fixtop='fixtop' :isDisplay="'block'"/>
    <main style="padding-top: .6rem;">
      <article>
        <div class="head">
          <div id="headHeight">
            <h1 class="title returnLeft">{{post.title}}</h1>
            <div class="info returnLeft">
              <span class="time">{{post.date}}</span>
              <span class="source">{{post.categories[0].title}}</span>
              <span @click="fontBig = !fontBig">
            <div class="font" :class="fontBig===true?'big':''" v-if='fontBig'>T小</div>
            <span class="font" :class="fontBig===true?'':'small'" v-else>T大</span>
              </span>
            </div>
          </div>
          <div class="content" :class="{'fontBig':fontBig===true}">
            <div class="excerpt">
              <p>{{post.excerpt}}</p>
            </div>
            <div class="cover"><img :src="post.attachments.length>0?post.attachments[0].url:''" /></div>
            <div v-html="this.strReplace(post.content)"></div>
          </div>
        </div>
      </article>
    </main>
  </div>
</template>
<style>


</style>
<script>
import axios from 'axios';

import TitNav from '~/components/TitNav.vue'
export default {
      head () {
    return {
      title: this.post.title,
    }
  },
  data() {
    return {
      post: [],
      fontBig: false,
      show: true,
      scrollTop: '',
      scrollHeight: '',
      clientHeight: '',
      navHeight: '',
      fixtop: 0,
      isT: 0
    }
  },
  validate({ params }) {
    return !isNaN(+params.id)
  },
  async asyncData({ params }) {
    let { data } = await axios.get(`https://www.tybj-food.com/?json=1&p=${+params.id}`)
    return { post: data.post }
  },
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
      let naxBoxWrap=document.getElementById('naxBox')
      let headHeight = document.getElementById('headHeight').clientHeight;
      let fixHeight = naxBox + headHeight
let classVal=naxBoxWrap.getAttribute("class")
    classVal=classVal.concat('hide-top-pannel')


    if (fixHeight < this.scrollTop && this.isT < this.scrollTop) {

       naxBoxWrap.classList.remove("show-top-pannel")
      setTimeout(() => { naxBoxWrap.classList.add("hide-top-pannel")},0);
      } else if (this.isT > this.scrollTop) {
       naxBoxWrap.classList.remove("hide-top-pannel")
      setTimeout(() => { naxBoxWrap.classList.add("show-top-pannel")},0);


}
    },
    go() {
      this.$router.go(-1)
    },
    strReplace(str) {
      let strReplace = str.replace(/([a-z]+)="[\s\S]+?"/ig, function(a, b, c, d) {
        if (b === 'height') {
          return '';
        } else if (b === 'width') {
          return '';
        }
        return a;
      });
      return strReplace
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

    }



  },
  mounted() {
    window.addEventListener('scroll', this.scroll)
  },
  destroyed() {
    window.removeEventListener('scroll', this.scroll)

  },
  components: {
    TitNav,
  },
  created() {
   
  },

}

</script>
