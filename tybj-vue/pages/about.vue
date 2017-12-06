<template>
  <div id="h5" class="h5">
  <div id="load">1233</div>
    <TitNav ref="nav" :title="'联系我们'" :rgba="'rgba(255, 255, 255, 0)'" />
  <div class="loading-wrap loading" id="loading">
    <div class="logo"></div>
    <div class="loading-img0 animated fadeIn"></div>
    <div class="loading-img1 animated"></div>
    <div class="loading-img2 i"></div>
    <div class="loading-img3"></div>
    <div class="loading-img4"></div>
    <div class="progress_bar" style="display: none;"><span style="width: 100%;"></span></div>
    <div class="progress" style="display: none;"><span>100%</span></div>
    <div class="btn1 animated slideInUp" id="loadingBtn" style="display: block; transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
        <span class="animated flash"></span>
    </div>
</div>
<div class="bg-box" id="J_BgBox">

    <div class="bg_3">
        <p></p>
    </div>
</div>
<div class="salBox box0" id="J_Box0" >
    <div class="wrap">
        <p class="con-item0 animated fadeIn"></p>
    </div>
    <div class="tip animated fadeIn"></div>
</div>
<div class="salBox box1" id="J_Box1">
    <div class="wrap">
        <p class="con-item1 animated slideInLeft"></p>
        <p class="con-item2 animated slideInLeft"></p>
        <p class="con-item3 animated slideInLeft"></p>
    </div>
    <div class="tip animated fadeIn"></div>
</div>
<div class="salBox box14" id="J_Box14">
    <div class="wrap">
        <div class="q">
            <p class="con-item1 animated fadeIn"></p>
            <p class="con-item2 animated fadeIn" id="J_Ani3">
                <span class="po0"></span>
            </p>
            <p class="con-item3 animated fadeIn"></p>
        </div>
    </div>
    <div class="share-btn fadeIn animated" id="J_ShareBtn"></div>
    <div class="again-btn animated fadeIn"><a href="./Polycom25周年_files/Polycom25周年.html"></a></div>
    <div class="shareTip" id="J_ShareTip">
        <span></span>
    </div>
</div>
<div class="btn animated slideInUp" id="J_Btn"></div>
    <audio :src="bg" loop id="J_BgAudio"></audio>
    <audio :src="lou" preload="auto" id="J_Eye"></audio>
    <!-- <audio :src="bg" preload="auto" id="J_Eye"></audio> -->
    <div class="audio_btn animated rotate" id="J_AudioBtn"></div>
    <!-- src="../assets/video/bg4.mp3" -->
    <!-- src="../static/video/bg4.mp3" -->
  </div>
</template>
<!-- <script src="../static/js/loading1.js"></script>
<script src="../static/js/dialog.js"></script>
<script src="../static/js/touch.js"></script>
<script src="../static/js/main.js"></script> -->
<script>
import TitNav from '~/components/TitNav.vue'
// import Bg from '../static/video/au.mp3'
// import Au from '~/src/images/au.mp3'
// import h5_js from '../../static/js/h5.js'  
// import $ from 'webpack-zepto'


 var loadImgArr = [
        'http://s.flyfinger.com/polycom/static/images/travel/bg_04_a1dca65.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/1990_b3ee7a5.png',
        'http://s.flyfinger.com/polycom/static/images/travel/1998_9fac3ea.png',
        'http://s.flyfinger.com/polycom/static/images/travel/2001_bd15923.png',
        'http://s.flyfinger.com/polycom/static/images/travel/2003_0aaf31f.png',
        'http://s.flyfinger.com/polycom/static/images/travel/2004_d0a1cbc.png',
        'http://s.flyfinger.com/polycom/static/images/travel/2005_aeafff4.png',
        'http://s.flyfinger.com/polycom/static/images/travel/2008_81b6dff.png',
        'http://s.flyfinger.com/polycom/static/images/travel/audio_286014b.png',
        'http://s.flyfinger.com/polycom/static/images/travel/bg1_6bd1374.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg2_a876b53.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg3_868cd9a.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg4_b782718.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg5_5182f68.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg6_aaf9f01.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg7_e8e95ea.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg8_6708f40.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg9_d7f1805.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg10_aaf9f01.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/bg13_7ffa10b.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/btn1_4b8fa5d.png',
        'http://s.flyfinger.com/polycom/static/images/travel/btn2_9b1bd38.png',
        'http://s.flyfinger.com/polycom/static/images/travel/btn3_60166c4.png',
        'http://s.flyfinger.com/polycom/static/images/travel/btn4_2f682e2.png',
        'http://s.flyfinger.com/polycom/static/images/travel/btn5_4628446.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img1_8f63be5.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img2_8a6bf82.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img3_a8e8f99.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img4_72801db.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img5_f48635b.jpg',
        'http://s.flyfinger.com/polycom/static/images/travel/img6_88cc4d7.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img7_7115711.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img8_e562aa7.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img9_c46495a.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img10_ea10c4d.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img11_fdd4c04.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img12_e190e1b.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img13_3fdbebf.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img14_f5bdbdd.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img15_4bb2632.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img16_636ac64.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img17_78fec9f.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img18_0e4b5d3.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img19_f1a7cfe.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img20_6e01a88.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img21_679d3df.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img22_ba0636b.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img23_80ba098.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img24_ddd2297.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img25_185ae0b.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img26_2cc3f4a.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img27_455c73c.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img28_46da84d.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img29_f3db3d4.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img30_0f26735.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img31_6e715a7.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img32_ce394cd.png',
        'http://s.flyfinger.com/polycom/static/images/travel/img33_3400be3.png',
        'http://s.flyfinger.com/polycom/static/images/travel/logo_fd331a7.png',
        'http://s.flyfinger.com/polycom/static/images/travel/logo_ani_2e909b0.png'
    ];


export default {
  beforeCreate() {
    if (typeof window !== 'undefined') {
      let s = document.getElementById("h5");

      // let par=s.parentNode
      // document.getElementById("h5").parentNode.className = "h5";
      // 
      document.getElementsByTagName("body")[0].className="h5";
      document.getElementsByTagName("html")[0].className="h5";
      // document.getElementById("h5").parentNode.className = 'h5';
document.getElementById("__nuxt").className = 'h5';
      document.getElementById("__nuxt").childNodes[1].className = 'h5';

    }

  },

mounted(){

   const h5 = document.createElement('script');
    h5.type = 'text/javascript';
    // h5.src = 'http://s.flyfinger.com/polycom/static/js/travel/main_707db33.js';
    h5.src = '//vue.tybj-food.me/static/js/h5_js.js';
    

   const dialog = document.createElement('script');
dialog.type = 'text/javascript';
    dialog.src = '//vue.tybj-food.me/static/js/dialog.js';

       const loading1 = document.createElement('script');
    loading1.type = 'text/javascript';
    loading1.src = '//vue.tybj-food.me/static/js/loading1.js';

     const imageLoad1 = document.createElement('script');
    imageLoad1.type = 'text/javascript';
    imageLoad1.src = '//vue.tybj-food.me/static/js/imageLoad1.js';


       const zepto = document.createElement('script');
    zepto.type = 'text/javascript';
    zepto.src = 'https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js';

    // zepto.src = 'http://qiniu.tybj-food.com/zepto.js';
    // zepto.src = 'https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js';
   

    const touch = document.createElement('script');
    touch.type = 'text/javascript';
    touch.src = '//vue.tybj-food.me/static/js/touch.js';

    document.body.appendChild(zepto);
    document.body.appendChild(imageLoad1);

    document.body.appendChild(loading1);
    document.body.appendChild(touch);
    document.body.appendChild(dialog);

    document.body.appendChild(h5);

    },
  beforeDestroy() {
    if (typeof window !== 'undefined') {
      // console.log('test');
      //       document.getElementsByTagName("body")[0].className="h5";
 document.getElementsByTagName("body")[0].removeAttribute("class");
 document.getElementsByTagName("html")[0].removeAttribute("class");

      // window.document.body.removeAttribute("class","h5");
      // window.document.html.removeAttribute("class","h5");

    }
  },
  data() {
    return {
      bg: '//qiniu.tybj-food.com/bg_m.mp3',
      lou: '//qiniu.tybj-food.com/lou_m.mp3'
    }
  },
    created() {
 
  },
  components: {
    TitNav,

  }
}

</script>
