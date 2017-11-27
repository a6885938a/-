<template>
  <div class="mySwiper">
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="swiper-slide" v-for="item in items">
          <!-- v-for="banner in banners" -->
          <!-- <img :src="banner"> -->
     <!--      <swiper-slide> -->
            <nuxt-link :to="item.url">
              <img :data-src="item.img" class="swiper-lazy">
              <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </nuxt-link>
          <!-- </swiper-slide> -->
          <!--  <swiper-slide>
        <nuxt-link to="/about">
          <img :src="banner">
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
           </nuxt-link>
        </swiper-slide> -->
          <!--     <img :src="banner"> -->
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination-bullets"></div>
    </div>
  </div>
</template>
<script>
import Aimg from '../../src/images/01.jpg'
import Bimg from '../../src/images/02.jpg'
import Loading from '../../src/images/loadbg.jpg'

export default {
  data() {
    return {
      items: [{
        img: Aimg,
        url: 'about'
      }, {
        img: Bimg,
        url: 'app'
      }],
      // imgs:[
      //          Aimg,Bimg
      //              ],
      //         urls:['about','app'],
      swiperOption: {
        autoplay: 2500,
        autoplayDisableOnInteraction: false,
        initialSlide: 1,
        loop: true,
        preloadImages: 'https://www.thgo8.com/public/index/images/logo1.jpg',
        lazyLoading: true,
        pagination: '.swiper-pagination',
        onSlideChangeEnd: swiper => {
          // console.log('onSlideChangeEnd', swiper.realIndex)
        }
      }
    }
  },

  // mounted() {
  //   console.log('app init')
  //   setTimeout(() => {
  //  // this.banners.push( Bimg)
  //     console.log('banners update')
  //   }, 3000)
  //   console.log(
  //     'This is current swiper instance object', this.mySwiper, 
  //     'It will slideTo banners 3')
  //   this.mySwiper.slideTo(3)
  // }
}

</script>
<style lang="scss" scoped>
.mySwiper {
  height: 3.2rem;
  width: 7.5rem;
  margin: 0 auto;

  .swiper-slide {
    text-align: center;
    height: 3.2rem;
    width: 7.5rem;
    background: #000;
    font-size: 38px;
    font-weight: 700;
    background-color: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .swiper-pagination {
    .swiper-pagination-bullet {
      background-color: red;
    }
  }
}

</style>
