<template>
  <div>
    <!-- <a  href="javascript:"  class="class th-nav-back" @click="go()">123</a> -->
    <!-- <nuxt-link to="/page">123321</nuxt-link> -->
    <GoNav/>
    <main>
      <article>
        <div class="head">
          <h1 class="title">{{post.title}}</h1>
          <div class="info">
            <span class="time js-time">{{post.date}}</span>
            <span class="source js-source">{{post.categories[0].title}}</span>
          
            <span class="font" v-if='fontBig' @click='isBig()'> <transition name="bounce">T小</transition></span>
 

            <span class="font" v-else='fontBig' @click='isBig()'><transition name="bounce">T大</transition></span>
   
          </div>
          <div class="content" :class="{'fontBig':fontBig===true}  ">
            <div class="excerpt"><p>{{post.excerpt}}></p></div>
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
      fontBig:false
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
    go() {
      this.$router.go(-1)
    },
    isBig () {
　　　　　　　　this.fontBig = !this.fontBig;
console.log('test');
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

  },

  components: {
    GoNav
  }
}

</script>

<style>
  .bounce-enter-active {
  animation: bounce-in 2s;
}
.bounce-leave-active {
  animation: bounce-out 2s;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
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
