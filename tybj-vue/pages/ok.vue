<template>
    <section class="container">
      <div>{{testMsg}}</div>
      <!--       <li v-for="post in users">
        <nuxt-link :to="{ name: 'posts-id', params: { id: post.id } }">{{ post}}</nuxt-link>
      </li> -->
    </section>
</template>
<script>

import api from '../static/js/api.js'

export default {

  asyncData({params}) {

    return api.getAreas()
      .then((res) => {
        return {testMsg:res.data}
      })
  },
  data(){
    return{
    }
  }

}

</script>
<style>
  .container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
</style>