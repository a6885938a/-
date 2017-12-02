<template>
  <div>
    <!-- <a  href="javascript:"  class="class th-nav-back" @click="go()">123</a> -->
    <!-- <nuxt-link to="/page">123321</nuxt-link> -->
    <TitNav ref="nav" :fixtop='fixtop' :isDisplay="'block'" />
    <main style="padding-top: .6rem; background: #eee;">
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
            <div class="recommend" v-if="showRecommend">
            <div class="app-pd-wp" style="position: relative;">
              <h2>相关推荐</h2>
              <div class="hor-list">
                <ul>
                  <nuxt-link :to="{name: 'page-id',params:{ id: post.id }}" v-for="post in recommendData" :key="post.id">
                    <li>
                      <div class="info-img">
                        <img v-lazy="post.attachments.length>0?'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src='+post.attachments[0].url+'&h=200&w=300&zc=1':'../images/loadbg.jpg'" />
                      </div>
                      <div class="info-bar">
                        <div class="pro-title">{{post.title}}</div>
                        <div class="e-numb">
                          <span class="e-price">{{post.categories[0].title}}</span>
                          <span class="watch"><span class="ico">阅</span>{{post.custom_fields.post_views_count?parseInt(post.custom_fields.post_views_count):'1'}}</span>
                        </div>
                      </div>
                    </li>
                  </nuxt-link>
                </ul>
              </div>
              <!-- <p id="PullDown" v-html='pullDownTips[updatapullDown]'></p> -->
              <!--    <img  v-lazy="https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=http://img.tybj-food.com/2016/10/IMG_8694.jpg&h=200&w=300&zc=1" /> -->
            </div>
          </div>
    </main>
  </div>
</template>
<style>


</style>
<script>
import axios from 'axios';

import TitNav from '~/components/TitNav.vue'


export default {
  head() {
    return {
      title: this.post.title,
    }
  },
  data() {
    return {
      post: [],
      recommendData: [],
      showRecommend:false,
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

  // async asyncData({ params }) {
  //   const postData = () => {
  //     return axios.get(`https://www.tybj-food.com/?json=1&p=${+params.id}`);
  //   }
  //   const recommendData = () => {
  //     return axios.get(`https://www.tybj-food.com/?json=get_category_posts&category_id=${+params.id}`)
  //   }
  //   return axios.all([postData(),recommendData()])
  //     .then(axios.spread((postRespdata,recommend) => {
  //       return { post: postRespdata.data.post,recommend:recommend.data.post,}
  //     }));
  // },

  async asyncData({ params }) {
    let { data } = await axios.get(`https://www.tybj-food.com/?json=1&p=${+params.id}`)
    return { post: data.post }
  },
  methods: {
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
    getRecommendData(id){
      return axios.get('https://www.tybj-food.com/?json=get_category_posts&category_id='+id)
          .then((res) => {
   let newArr = res.data.posts.filter((item) => {
          return item.id !== this.post.id; //id9为媒体报道
        });
   if(newArr.length>0)
            {
  this.showRecommend=true;
              this.recommendData=newArr
}

            // console.log(this.recommendData);
          })
    }

  },
  mounted() {
    // window.addEventListener('scroll', this.scroll)
  },
  destroyed() {
    // window.removeEventListener('scroll', this.scroll)

  },
  components: {
    TitNav
  },
  created() {
    // console.log(this.post.categories[0].id);
    // 
this.getRecommendData(this.post.categories[0].id);
console.log(this.recommendData);
  },

}

</script>
