<template>
  <div class="aboutSwiper">
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="swiper-slide q swiper-lazy" v-for="post in goodsLists" :style="{backgroundImage:'url('+post.img+')',height:screenHeight + 'px'}" >
          <!-- <img :data-src="post.img" class="swiper-lazy"> -->
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
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
  props: { goodsLists: { type: Array } },

  data() {
    if (typeof window !== 'undefined') {
      return {
        items: [{
          img: Aimg,
          url: 'about'
        }, {
          img: Bimg,
          url: 'app'
        }],
        screenHeight: document.body.clientHeight,
        screenWidth: document.body.clientWidth,

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
    }
  },

  mounted() {
        this.screenHeight=document.documentElement.clientHeight,
       this.screenWidt=document.documentElement.clientWidth,
    console.log(this.screenHeight)
  }
}

</script>
<style lang="scss" scoped>
.aboutSwiper {
  height: 3.2rem;
  width: 7.5rem;
  margin: 0 auto;

  .swiper-slide {
    text-align: center;
/*    height: 3.2rem;
    width: 7.5rem;*/
    background:center no-repeat;
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
 .swiper-slide-active{
-webkit-animation:fadeInRight 1s .2s ease both;
-moz-animation:fadeInRight 1s .2s ease both;}
@-webkit-keyframes fadeInRight{
0%{opacity:0;
-webkit-transform:translateX(20px)}
100%{opacity:1;
-webkit-transform:translateX(0)}
}
@-moz-keyframes fadeInRight{
0%{opacity:0;
-moz-transform:translateX(20px)}
100%{opacity:1;
-moz-transform:translateX(0)}
}
}

</style>
