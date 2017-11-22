<template>
  <div class="w app-pd-wp">
    <p id="PullUp">刷新成功</p>

    <div class=" hor-list">
      <ul>
        <li v-for="post in posts">
          <a class="upItem">
            <div class="info-img">
              <img class='lazy' :src="post.attachments[0].url" />
            </div>
            <div class="info-bar">
              <div class="pro-title">{{post.title}}</div>
                <div class="e-numb">
                <span class="e-price">{{post.categories[0].title}}</span>
          <span class='point'>阅 {{parseInt(post.custom_fields.post_views_count)}}</span>
                </div>
            </div>
          </a>
        </li>

    
      </ul>
    </div>
    <p id="PullDown">正在加载</p>

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
  // posts: 'news',
  data() {
    return {
      posts: ''
    }
  },

  methods: {
    getNewsFn() {
      return axios.get('/wap/?json=1')
        .then((res) => {
          this.posts = res.data.posts
         
        })
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
