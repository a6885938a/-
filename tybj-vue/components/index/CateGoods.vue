<template>
  <div class="w app-pd-wp" style="position: relative;">
    <!-- <p id="PullUp" v-html='loadHtml'  ></p> -->
    <p id="PullUp" v-html='loadHtml' v-if='loading'></p>
    <div class='loadingMeg' v-else='loading'>{{'为你推荐 '+megNum+' 条文章'}}</div>
    <div class=" hor-list">
      <ul v-html='categoods'>
        <!--  <ul>
   {{goodsHtml}}

 </ul> -->
        <!--   <li v-for="post in goodsLists" >
          <a class="upItem">
            <div class="info-img">
              <img class='lazy' :src="post.attachments.length>0?'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src='+post.attachments[0].url+'&h=200&w=300&zc=1':'../images/loadbg.jpg'" />
            </div>
            <div class="info-bar">
       
              <div class="pro-title">{{post.title}}</div>
              <div class="e-numb">
                <span class="e-price">{{post.categories[0].title}}</span>
                <span class='point'>阅 {{parseInt(post.custom_fields.post_views_count)}}</span>
              </div>
            </div>
          </a>
        </li> -->
      </ul>
    </div>
    <p id="PullDown" v-html='pullDownTips[updatapullDown]'></p>
  </div>
  <!-- <div>
  <div @click="getNewsFn">
   123
  </div>
  <div>{{posts}}</div>
  </div> -->
</template>
<style>
.bounce-enter-active {
  animation: bounce-in.5s;
}

.bounce-leave-active {
  animation: bounce-in .5s reverse;
}

@keyframes bounce-in {
  0% {
    height: 0
  }

  100% {
    height: .4rem;
  }
}

</style>
<script>
import axios from 'axios';
export default {
  props: ['goodsLists'],
  // props:{cateGoods:{type:Array}},

  // posts: 'news',
  data() {
     let goodsHtml = '';
        this.goodsLists.forEach((post) => {
          let srcHtml = post.attachments.length > 0 ? 'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=' + post.attachments[0].url + '&h=200&w=300&zc=1' : '../images/loadbg.jpg';
          goodsHtml += '<li><a class="upItem"><div class="info-img"><img class="lazy" src=' + srcHtml + ' /></div><div class="info-bar"><div class="pro-title">' + post.title + '</div><div class="e-numb"><span class="e-price">' + post.categories[0].title + '</span><span class="watch"><span class="ico">阅</span><span>' + parseInt(post.custom_fields.post_views_count) + '</span></span></div></div></a></li>'
        })
    return {
      page: 2,
      id: undefined,
      categoods: goodsHtml,
      goodsHtml: '',
      loadHtml: '<i class="r-gif"></i>刷新成功',
      loading: false,
      megNum: this.goodsLists.length,
      pullDownTips: {
        0: '<i class="r-gif"></i>正在加载',
        1: '没有更多数据了 ',
        2: '已经到底了,别址了',
        3: ''
      },
      updatapullDown: 0



    }
  },

  methods: {

    getNewsFn(id, page) {
      this.page=page
      this.id=id

      let url
      if (id === undefined) {
        url = '/wap/?json=1&page=' + page
      } else {
        url = '/wap/?json=get_category_posts&category_id=' + id + '&page=' + page
      }
      return axios.get(url)
        // .then((data) => data.json())
        .then((res) => {
          // this.page=page++
          this.loading = false
          let posts = res.data.posts
          // console.log(res.data.posts instanceof Array)
          // return this.goodsHtml=posts.map((post,index)=>{
          // return '<div>123</div>'
          // // <div>123</div> 

          // })

          // ------------------forEach_done
          let goodsHtml = '';
          res.data.posts.forEach((post) => {
            let srcHtml = post.attachments.length > 0 ? 'https://www.tybj-food.com/wp-content/themes/tybj/timthumb.php?src=' + post.attachments[0].url + '&h=200&w=300&zc=1' : '../images/loadbg.jpg';
            goodsHtml += '<li><a class="upItem"><div class="info-img"><img class="lazy" src=' + srcHtml + ' /></div><div class="info-bar"><div class="pro-title">' + post.title + '</div><div class="e-numb"><span class="e-price">' + post.categories[0].title + '</span><span class="point">阅 ' + parseInt(post.custom_fields.post_views_count) + '</span></div></div></a></li>'
          })

          // ---------------forEach_done


          // if(this.page===0){
          //   this.goodsHtml
          // }

          if (posts.length > 0) {

            this.$emit('changeIsData', false)
            if (this.page === 1) {
              this.page = this.page + 1
              // console.log(this.page)
              this.categoods = goodsHtml

              if (res.data.posts.length < 10) {
                this.updatapullDown = 1
                // console.log( this.updatapullDown);


              } else {
                this.updatapullDown = 0
              }
            } else { // 加载操作
              this.page = this.page + 1
              if (this.updatapullDown === 0) {
                 console.log(goodsHtml);

                this.categoods = this.categoods.concat(goodsHtml)
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
          //     if(res.data.posts.length===10){
          //       this.updatapullDown=0
          //       console.log(this.updatapullDown)
          //     }else if(res.data.posts.length<10){
          // this.updatapullDown=1
          //     }
          this.loading = false
          this.posts = res.data.posts
          this.megNum = res.data.posts.length
        })
    },
    changeLoad(val) {
      this.page=1
      this.loading = val
      // console.log(this.loading);
    },
    changeId(id) {
      this.id = id
      // this.page = 1
      // this.getNewsFn(id, 1)
    },
    getMoreData() {
      // console.log(this.page)
      this.getNewsFn(this.id, this.page)
    }


    //      getNewsFn(){  
    //   axios.post('https://www.tybj-food.com/?json=1', {
    //     firstName: 'Fred',
    //     lastName: 'Flintstone'
    //   })
    //   .then(function (response) {
    //     console.log(response);
    //   })
    //   .catch(function (response) {
    //     console.log(response);
    //   });
    // }
  },
  created() {
    // this.getNewsFn(this.id,this.page)
    // console.log(this.posts)
  },

}
// https://www.tybj-food.com/?json=1

</script>
