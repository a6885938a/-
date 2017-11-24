<template>
  <div>
   <nuxt-link to="/page">123321</nuxt-link>
    <TopNav/>
    <Swiper/>
    <Cate :cate_name="posts" v-on:changeAct="changeAct"/>
 <CateGoods ref="categoods" v-on:changeIsData="changeIsData"/>
  </div>
</template>
<script>
import Logo from '~/components/Logo.vue'
import TopNav from '../components/index/TopNav.vue'
import Swiper from '../components/index/Swiper.vue'
import Cate from '../components/index/Cate.vue'
import CateGoods from '../components/index/CateGoods.vue'


// import Model from '../components/index/Model.vue'
import axios from 'axios'


export default {
data(){
  return {
     scrollTop: '',
     scrollHeight:'',
     clientHeight:'',
    isDataing:false

  }
},
methods:{
 menu() {
    this.scrollTop = this.getScrollTop();
 this.scrollHeight=this.getScrollHeight();
 this.clientHeight=this.getClientHeight();
 // console.log(this.scrollTop);
 // console.log(this.scrollHeight);
// console.log(this.isDataing);
// console.log(this.scrollHeight);
    if ( this.clientHeight + this.scrollTop === this.scrollHeight&&this.isDataing=== false) {
      // console.log('test');
      this.isDataing = true;
          console.log();
this.$refs.categoods.getMoreData()
    
    
    }
   },
   changeIsData(val){

this.isDataing=val
   },
  changeAct:function(id){
this.$refs.categoods.changeId(id)
this.$refs.categoods.changeLoad(true)
  },
    getScrollTop(){
          var scrollTop = 0;
          if (document.documentElement && document.documentElement.scrollTop) {
            scrollTop = document.documentElement.scrollTop;
          } else if (document.body) {
            scrollTop = document.body.scrollTop;
          }
          return scrollTop;
      },
            getClientHeight() {
      
          var windowHeight = 0;
          if (document.compatMode === "CSS1Compat") {
            windowHeight = document.documentElement.clientHeight;
          } else {
            windowHeight = document.body.clientHeight;
          }

          return windowHeight;
     
      },
            getScrollHeight (){
      
          var scrollHeight = 0,
            bodyScrollHeight = 0,
            documentScrollHeight = 0;
          if (document.body) {
            bodyScrollHeight = document.body.scrollHeight;
          }
          if (document.documentElement) {
            documentScrollHeight = document.documentElement.scrollHeight;
          }
          scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
          return scrollHeight;
   
      }
       

},

  mounted() {
   window.addEventListener('scroll', this.menu)
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
     var writer= new ObjStory(null,'all','全部','http://www.tybj-food.com/wp-content/themes/tybj/public/images/i_all.png');
    return axios.get('https://www.tybj-food.com/?json=get_category_index')
      .then((res) => {
       res.data.categories.unshift(writer)
        return { posts: res.data.categories}
      })
  },  
  created() {

  },

  components: {
    TopNav,
    Swiper,
    Cate,
    CateGoods
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
