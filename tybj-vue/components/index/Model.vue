<template>
    <section class="container">
      <div>{{testMsg}}</div>
      <!--       <li v-for="post in users">
        <nuxt-link :to="{ name: 'posts-id', params: { id: post.id } }">{{ post}}</nuxt-link>
      </li> -->
    </section>
</template>
<script>

import api from '../../static/js/api.js'

export default {

  asyncData({}) {

    return api.getAreas()
      .then((res) => {
        console.log(res.data)
        return {testMsg:res.data}
      })
  },
  data(){
    return{
    }
  }
//   data(){
//     return{
// testMsg:2 
//     }
//   }
  // data () {
  //    return axios.get('./api.json')
  //    .then((res) => {
  //      return { titles: res.data }
  //    })
  //  }
  // data () {
  //       return { users:'1'}
  //   },
  // return axios.get('./api.json')
  //    .then((res) => {
  //      return { users:'1'}
  //    })

  // async asyncData () {
  //    const asyncData = {};
  //    await new Promise((resolve, reject) => {
  //      setTimeout(() => {
  //        asyncData.username = 'John Smith';
  //        resolve();
  //      }, 2000)
  //    });
  //    return asyncData.username;
  //  }
  //   return axios.get('https://jsonplaceholder.typicode.com/posts')
  //     .then((res) => {
  //       return { users: '2'}
  //       // console.log(res.data.slice(0, 5));
  //     })
  // },
  // created () {
  //     console.log(this.users)
  //     // console.log(this.msg)
  //   }
  // data () {
  //   let { data } = await axios.get('https://jsonplaceholder.typicode.com/posts')
  //     return { users:data.title}
  // }
  // 

  // data () {
  //   // return axios.get('https://jsonplaceholder.typicode.com/posts')
  //   //   .then((res) => {
  //   //     return { posts: 1}
  //   //   })
  // }

}

</script>
<style scoped>
.container {
  width: 70%;
  margin: auto;
  text-align: center;
  padding-top: 100px;
}

ul {
  list-style-type: none;
  padding: 0;
}

ul li {
  border: 1px #ddd solid;
  padding: 20px;
  text-align: left;
}

ul li a {
  color: gray;
}

p {
  font-size: 20px;
}

a {
  color: #41B883;
}

</style>
