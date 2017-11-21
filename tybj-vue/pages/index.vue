<template>
  <div>
    <TopNav/>
    <Swiper/>
    <Cate :cate_name="posts"/>
    <div id="app">
     <p>{{ message }}</p>
      <button v-on:click="reverseMessage">反转字符串</button>
</div>

  
  </div>
</template>
<script>
import Logo from '~/components/Logo.vue'
import TopNav from '../components/index/TopNav.vue'
import Swiper from '../components/index/Swiper.vue'
import Cate from '../components/index/Cate.vue'

// import Model from '../components/index/Model.vue'
import axios from 'axios'


export default {

  data(){
    return{
    message: '菜鸟教程'
    }
  },
    methods: {
    reverseMessage: function () {
          this.message = this.message.split('').reverse().join('')
    }
  },
   asyncData({ req, params }) {
    let newArr=[]
     function ObjStory(id,slug,title,description) //声明对象
     {
        this.ID = id;
        this.slug= slug;
        this.title= title;
        this.description = description;
     }
     var writer= new ObjStory(0,'all','全部','全部');
    return axios.get('https://www.tybj-food.com/?json=get_category_index')
      .then((res) => {
       res.data.categories.unshift(writer)
        return { posts: res.data.categories}
      })
  },
  components: {
    TopNav,
    Swiper,
    Cate
    // Model
  }
}

</script>
<style>
.fade-enter-active {
  transition: all .3s ease;
}

.fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.fade-enter,
.fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}

.container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  /* 1 */
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

</style>
