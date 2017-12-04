<template>
<div>

  <div class="contactSwiper">

    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <!-- <div class="swiper-slide" v-for="post in goodsLists"  > -->
              <!-- <img :src="post.img" > -->

<div class="swiper-slide swiper-lazy" v-for="post in goodsLists" :style="{backgroundImage:'url('+post.img+')',height:screenHeight + 'px'}" style="backgroundColor:'#000'">

        </div>
      </div>
      <div class="swiper-pagination swiper-pagination-bullets"></div>
    </div>
  </div>
  </div>
</template>
<script>
import Aimg from '../../src/images/01.jpg'
import Bimg from '../../src/images/02.jpg'
import Loading from '../../src/images/loadbg.jpg'

export default {
  props: { goodsLists: { type: Array } },

  data() {
    if (typeof window !== 'undefined') {
      let _this = this;
      return {
        items: [{
          img: Aimg,
          url: 'about'
        }, {
          img: Bimg,
          url: 'app'
        }, {
          img: Aimg,
          url: 'app'
        }, {
          img: Bimg,
          url: 'app'
        }, {
          img: Aimg,
          url: 'app'
        }],
        screenHeight: document.body.clientHeight,
        screenWidth: document.body.clientWidth,

        swiperOption: {
              autoplay: 2500,
              speed:2500,
         loop: true,
          lazyLoading: true,
               effect : 'fade',
          slidesPerView: 'auto',
          centeredSlides: true,
          pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true
          },


        }
      }
    }
  },

  mounted() {
    this.screenHeight = document.documentElement.clientHeight
      this.screenWidth = document.documentElement.clientWidth
  }
}

</script>
<style lang="scss" scoped>
.contactSwiper {

  margin: 0 auto;
  .swiper-slide {
    text-align: center;
    /*    height: 3.2rem;
    width: 7.5rem;*/
    background: center no-repeat;
    background-size: cover;
    /*background: #000;*/
    font-size: 38px;
    font-weight: 700;
    background-color: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .swiper-pagination {
    display: none;
    .swiper-pagination-bullet {
      background-color: red;
    }
  }
  .swiper-slide-active {
    -webkit-animation: fade 1s .2s ease both;
    -moz-animation: fade 1s .2s ease both;
  }

}

</style>
