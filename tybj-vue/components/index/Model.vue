<template>
  <div class="container">
    <h1>Blog</h1>
    <ul>
    
    <li >    {{ username }}</li>
<!--       <li v-for="post in users">
        <nuxt-link :to="{ name: 'posts-id', params: { id: post.id } }">{{ post}}</nuxt-link>
      </li> -->
    </ul>
    <p><nuxt-link to="/">Back to home page</nuxt-link></p>
  </div>
</template>

<script>
import axios from 'axios'

export default {
// data () {
//       return { users:'1'}
//   },
 // return axios.get('./api.json')
 //    .then((res) => {
 //      return { users:'1'}
 //    })

   async asyncData () {
      const asyncData = {};
      await new Promise((resolve, reject) => {
        setTimeout(() => {
          asyncData.username = 'John Smith';
          resolve();
        }, 2000)
      });
      return asyncData;
    }
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