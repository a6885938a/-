<template>
  <div>

    <!-- <a  href="javascript:"  class="class th-nav-back" @click="go()">123</a> -->
    <!-- <nuxt-link to="/page">123321</nuxt-link> -->
    <GoNav/>
    <main style="padding-top: .6rem;">
      <article>
        <div class="head">
          <h1 class="title"  >{{post.title}}</h1>
          <div class="info">
            <span class="time js-time">{{post.date}}</span>
            <span class="source js-source">{{post.categories[0].title}}</span>
            <span  @click="fontBig = !fontBig">
            <div class="font" :class="fontBig===true?'big':''" v-if='fontBig'>T小</div>
            <span class="font" :class="fontBig===true?'':'small'" v-else>T大</span>
     </span>
      
          </div>
          <div class="content" :class="{'fontBig':fontBig===true}">
            <div class="excerpt"><p>{{post.excerpt}}</p></div>
            <div class="cover"><img :src="post.attachments[0].url" /></div>
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

import GoNav from '~/components/GoNav.vue'
export default {
  data() {
    return {
      post: [],
      fontBig:false,
       show: true,
            scrollTop: '',
      scrollHeight: '',
      clientHeight: '',
    }
  },
  validate({ params }) {
    return !isNaN(+params.id)
  },
  async asyncData({ params }) {
    // We can use async/await ES6 feature
    let { data } = await axios.get(`https://www.tybj-food.com/?json=1&p=${+params.id}`)
    console.log(data);
    return { post: data.post }
  },
  created() {
    // this.getNewsFn(this.id,this.page)
    console.log(this.post)
  },
  methods: {
       scroll() {
      this.scrollTop = this.getScrollTop();
      this.scrollHeight = this.getScrollHeight();
      this.clientHeight = this.getClientHeight();
      console.log(this.scrollTop);
      // console.log(this.scrollHeight);
      // console.log(this.scrollHeight);
      if (this.clientHeight + this.scrollTop === this.scrollHeight ) {
      }
    },
    go() {
      this.$router.go(-1)
    },
    toggle () {

　　　　　　　　this.fontBig = !this.fontBig;
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
destroyed(){
    window.removeEventListener('scroll', this.scroll)

},
  components: {
    GoNav
  }
}

</script>

<style>
.fadeout-enter-active, .fadeout-leave-active {
  transition: opacity .5s
}
.fadeout-enter, .fadeout-leave-to /* .fade-leave-active in below version 2.1.8 */ {
  opacity: 0
}
  .bounce-enter-active {
  animation: bounce-in 2s;
}
.bounce-leave-active {
  animation: bounce-out 2s;
}
@keyframes bounce-in {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes bounce-out {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(0);
  }
}
</style>
