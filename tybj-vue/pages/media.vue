<template>
  <div>
    <TitNav ref="nav" :title="'媒体报道'" />
    <div class="w app-pd-wp" style="padding-top:1rem;">
      <div class="hor-list media">
        <ul>
         <MediaLi/>
          <li v-for="(post,index) in posts" :key="index">
             <nuxt-link :to="{name: 'page-id',params:{ id: post.id }}" class="mediaTit">
 
       <span class="flexLeft" >{{post.title}}</span><span class="tr">{{post.date}}</span>

   
             </nuxt-link>
          <video width="100%" height="100%" controls="controls">
  <source :src="post.excerpt" type="video/mp4">
</video>

         </li>

         </ul>
         </div>
     </div>
  </div>
</template>
<script>
import TitNav from '~/components/TitNav.vue'
import MediaLi from '~/components/media/MediaLi.vue'
import axios from 'axios';
export default {
   beforeCreate() {
    if (typeof window !== 'undefined') {
     document.getElementsByTagName("body")[0].className="mediaBody";
}

    },
      beforeDestroy() {
            if (typeof window !== 'undefined') {
       window.document.body.removeAttribute("class","mediaBody");
     }
    },
data () {
      return {
        // datas:[{"title":'1',"url":'http://p068hy9em.bkt.clouddn.com/12.mp4'},{"title":'2',"url":'https://www.tybj-food.com/wp-content/themes/tybj/dist/images/video_p1.mp4'}],
      }
    },
    head () {
    return {
      title: '媒体报道',
    }
  },
      async asyncData({ params }) {
    let { data } = await axios.get(`https://www.tybj-food.com/?json=get_category_posts&category_id=9`)//媒体报道的分类目录为9
    return { posts: data.posts }
  },
    created() {
    // console.log(this.post);
  },
  components: {
    TitNav
  }
}
</script>
<style>
  video{
  background: #000;
}
</style>
