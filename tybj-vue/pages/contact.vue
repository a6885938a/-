<template>
  <div>
    <TitNav ref="nav" :title="'联系我们'" :rgba="'rgba(255, 255, 255, 0)'" />
    <div class="textWrap" :style="{height:screenHeight + 'px',width:screenWidth + 'px'}"></div>
<div class="mapFooter"><a href="http://map.baidu.com/mobile/webapp/place/detail/qt=ninf&wd=西樵天园&c=138&searchFlag=bigBox&version=5&exptype=dep&src_from=webapp_all_bigbox&uid=e101510c45a227b08af15dfd&industry=cater&qid=12142460488701111055/showall=1&detail_from=list&vt=map/?fromhash=1"><i class="dd-icon"></i>一键导航到店</a></div>
    <div class="cantactText">
      <ul class="ver-view">
        <li><a href="tel:0757-86896293" class="tel-icon"><span class="f36">订饼热线</span></br><span>0757-86896293 </span></a></li>
        <li><a class="email-icon"><span class="f36">邮箱地址</span></br><span>309781301@qq.com  </span></a></li>
        <li><a class="address-icon"><span class="f36">天园店址</span></br><span>佛山市南海区西樵镇樵北中学西侧200米</span></a></li>
      </ul>
    </div>
    <Swiper :goodsLists="bannerGoods" />
  </div>
</template>
<script>
import TitNav from '~/components/TitNav.vue'
import Swiper from '../components/contact/Swiper.vue'
import Aimg from '../src/images/con_b1.jpg'
import Bimg from '../src/images/con_b2.jpg'
import Cimg from '../src/images/con_b3.jpg'
import Dimg from '../src/images/con_b4.jpg'


export default {
  data() {
    if (typeof window !== 'undefined') {
      return {
        bannerGoods: [
          { img: [Aimg] },
          { img: [Bimg] },
             { img: [Cimg] },
                { img: [Dimg] }
        ],
        screenHeight: 0,
        screenWidth: 0

      }
    }
  },
  mounted() {
    this.screenHeight = document.documentElement.clientHeight
    this.screenWidth = document.documentElement.clientWidth
  },
  components: {
    TitNav,
    Swiper,


  }
}

</script>
