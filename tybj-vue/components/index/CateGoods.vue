<template>
<div>
  <div @click="getNewsFn">
   123
  </div>
  <div>{{posts}}</div>
  </div>
</template>
<script>
  import axios from 'axios';  
export default {
  // posts: 'news',
data(){
  return {
posts:''
  }
},

   methods: {
 getNewsFn(){  
  return axios.get('/wap/?json=1')
      .then((res) => {
       this.posts=res.data.status
        // console.log(res.data.status);
    // return { this.posts=res.data.status}
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
created () {
  this.getNewsFn()
    // console.log(this.posts)
  },

}
// https://www.tybj-food.com/?json=1

</script>

