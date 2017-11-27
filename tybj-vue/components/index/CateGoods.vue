<template>
  <div class="w app-pd-wp" style="position: relative;" >
    <!-- <p id="PullUp" v-html='loadHtml'  ></p> -->
    <p id="PullUp" v-html='loadHtml' v-if='loading'></p>
    <div class='loadingMeg' v-else='loading'>{{'为你推荐 '+megNum+' 条文章'}}</div>
    <div class=" hor-list">
         <ul>
         <nuxt-link :to="{name: 'page-id',params:{ id: post.id }}" v-for="post in goodsHtml" :key="post.id">
          <li>
            <div class="info-img">
     
   <!-- <img class='lazy'   :src="https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=http://img.tybj-food.com/2016/10/IMG_8694.jpg&h=200&w=300&zc=1" /> -->

              <img  v-lazy="post.attachments.length>0?'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src='+post.attachments[0].url+'&h=200&w=300&zc=1':'../images/loadbg.jpg'" />
            </div>
            <div class="info-bar">
       
              <div class="pro-title">{{post.title}}</div>
              <div class="e-numb">
                <span class="e-price">{{post.categories[0].title}}</span>
                <span class="watch"><span class="ico">阅</span>{{parseInt(post.custom_fields.post_views_count)}}</span>
              </div>
            </div>
        </li>
   </nuxt-link>

      </ul>
    </div>
    <p id="PullDown" v-html='pullDownTips[updatapullDown]'></p>
<!--    <img  v-lazy="https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=http://img.tybj-food.com/2016/10/IMG_8694.jpg&h=200&w=300&zc=1" /> -->
  </div>
  <!-- <div>
  <div @click="getNewsFn">
   123
  </div>
  <div>{{posts}}</div>
  </div> -->
</template>

<script>
import axios from 'axios';


export default {
  props: ['goodsLists'],

  // props:{cateGoods:{type:Array}},

  // posts: 'news',
  data() {
     // let goodsHtml = '';
     //    this.goodsLists.forEach((post) => {
     //      let srcHtml = post.attachments.length > 0 ? 'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=' + post.attachments[0].url + '&h=200&w=300&zc=1' : '../images/loadbg.jpg';
     //      goodsHtml += '<li><a class="upItem"><div class="info-img"><img class="lazy" src=' + srcHtml + ' /></div><div class="info-bar"><div class="pro-title">' + post.title + '</div><div class="e-numb"><span class="e-price">' + post.categories[0].title + '</span><span class="watch"><span class="ico">阅</span><span>' + parseInt(post.custom_fields.post_views_count) + '</span></span></div></div></a></li>'
     //    })
    return {
      page: 2,
      id: undefined,
      // categoods: goodsHtml,
      goodsHtml: this.goodsLists,
      loadHtml: '<i class="r-gif"></i>刷新成功',
      loading: false,
      megNum: this.goodsLists.length,
      pullDownTips: {
        0: '<i class="r-gif"></i>正在加载',
        1: '没有更多数据了 ',
        2: '已经到底了,别址了',
        3: ''
      },
      updatapullDown: 0,




    }
  },

  methods: {
    getNewsFn(id, page) {
      this.page=page
      this.id=id

      let url
      if (id === undefined) {
        url = 'https://www.tybj-food.com/?json=1&page=' + page
      } else {
        url = 'https://www.tybj-food.com/?json=get_category_posts&category_id=' + id + '&page=' + page
      }
      return axios.get(url)
        .then((res) => {
          // this.page=page++
          this.loading = false
          let posts = res.data.posts
          if (posts.length > 0) {
            this.$emit('changeIsData', false)
            if (this.page === 1) {
              this.page = this.page + 1
          
this.goodsHtml=posts
              if (res.data.posts.length < 10) {
                this.updatapullDown = 1
              } else {
                this.updatapullDown = 0
              }
            } else { // 加载操作
              this.page = this.page + 1
              if (this.updatapullDown === 0) {
          this.goodsHtml = this.goodsHtml.concat(posts)
                if (posts.length < 10) {
                  this.updatapullDown = 1
                }
              } else {
                this.updatapullDown = 0

              }
            }

          } else if (res.data.posts.length === 0) {
            this.updatapullDown = 2;
            this.$emit('changeIsData', true)
          }
          this.loading = false
          this.posts = res.data.posts
          this.megNum = res.data.posts.length
        })
    },
    changeLoad(val) {
      this.page=1
      this.loading = val
    },
    changeId(id) {
      this.id = id
    },
    getMoreData() {
      this.getNewsFn(this.id, this.page)
    }
 
  },
  created() {
  },

}
</script>
