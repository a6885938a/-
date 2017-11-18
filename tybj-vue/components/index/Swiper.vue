<template>
<div class="mySwiper">
  <div v-swiper:mySwiper="swiperOption">
    <div class="swiper-wrapper">
      <div class="swiper-slide" v-for="banner in banners">
        <img :src="banner">
        <!-- <img src="../../src/images/logo.png"/> -->
        <!-- <img src="../../src/images/a.png"/> -->

        <!-- <img src="/images/01.jpg"/> -->

        <!-- <img src="../../src/images/01.jpg"/> -->
      </div>
    </div>
    <div class="swiper-pagination swiper-pagination-bullets"></div>
  </div>
  </div>
</template>
<script>
import Aimg from '../../src/images/a.png'
// import Bimg from '../../src/images/03.jpg'
// import Loading from 'src/images/loadbg.jpg'

  export default {
    data () {
      return {
      banners: [
      // '../../src/images/01.jpg',
      'https://img.thgo8.com/assets/users/08/31/157f387836a51db8a57a47d411f9337af7b74b48.jpg',
   Aimg,
   // Bimg
        // Aimg,Bimg 
        ],
        swiperOption: {
          autoplay: 5000,
          initialSlide: 1,
          loop: true,
          pagination: '.swiper-pagination',
          onSlideChangeEnd: swiper => {
            console.log('onSlideChangeEnd', swiper.realIndex)
          }
        }
      }
    },
    mounted() {
      console.log('app init')
      setTimeout(() => {
     this.banners.push('')
        console.log('banners update')
      }, 3000)
      console.log(
        'This is current swiper instance object', this.mySwiper, 
        'It will slideTo banners 3')
      this.mySwiper.slideTo(3)
    }
  }
</script>



<style lang="scss" scoped>
  .mySwiper{
    height: 3.2rem;
    width:7.5rem;
    .swiper-slide {
      text-align: center;
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