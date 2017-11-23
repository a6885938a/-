<template>
  <div class="w app-pd-wp" style="position: relative;">

   <!-- <p id="PullUp" v-html='loadHtml'  ></p> -->
    <p id="PullUp" v-html='loadHtml'  v-if='loading'></p>

   
    <div class='loadingMeg'  v-else='loading'>{{'为你推荐 '+megNum+' 条文章'}}</div>
      
    <div class=" hor-list">
      <ul>
   {{goodsHtml}}
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

  // posts: 'news',
  data() {
    return {
      page:0,
      goodsLists:[],
goodsHtml:[],
      loadHtml:'<i class="r-gif"></i>刷新成功',
      loading:true,
      megNum:'',
      pullDownTips:{
         0: '<i class="r-gif"></i>正在加载',
            1: '没有更多数据了 ',
            2: '已经到底了,别址了',
            3:''
      },
      updatapullDown:3



    }
  },

  methods: {

    getNewsFn(id,url,page) {
      if(id===undefined){
        url='/wap/?json=1'
      }else{
        url='/wap/?json=get_category_posts&category_id='+id
      }
      return axios.get(url)
     .then((res) => res.json())
        .then((data) => {
this.goodsHtml=res.data.posts.map((post,index)=>{
return (
 '<div>1</div>'
  )
})

if(this.page===0){
  this.goodsHtml
}
            this.$emit('changeIsData',false)
          if(res.data.posts.length===10){
            this.updatapullDown=0
          }else if(res.data.posts.length<10){
      this.updatapullDown=1
          }
          this.loading=false
          this.posts = res.data.posts
this.megNum=res.data.posts.length
        })
    },
    changeLoad(val){
this.loading=val
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
    this.getNewsFn()
    // console.log(this.posts)
  },

}
// https://www.tybj-food.com/?json=1

</script>
