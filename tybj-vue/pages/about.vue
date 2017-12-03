<template>
  <div>
    <TitNav ref="nav" :title="''" />
    <Swiper :goodsLists="bannerGoods" />
  </div>
</template>
<script>
import TitNav from '~/components/TitNav.vue'
import Swiper from '../components/about/Swiper.vue'
import Aimg from '../src/images/mediaBg.jpg'


export default {
  data() {
    return {
      bannerGoods: [
      { img: [Aimg] },
           { img: ["http://img.tybj-food.com/2017/11/banner_02.jpg"] } 
      ]
    }
  },
  components: {
    TitNav,
    Swiper,


  }
}

</script>
