<template >
  <div id="h5" style="height: 100%;">
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
      <!--<div class="bg_1">
        <p></p>
    </div>
    <div class="bg_2">
        <p></p>
    </div>-->
      <div class="bg_3">
        <p></p>
      </div>
    </div>

    <div class="salBox box0" id="J_Box0">
      <!--<div class="bg2 animated fadeIn"></div>-->
      <div class="wrap">
        <p class="con-item0 animated fadeIn"></p>
      </div>
      <div class="tip animated fadeIn"></div>
    </div>

<!--     <div class="salBox box1" id="J_Box1">
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
    </div> -->

    <div class="btn animated slideInUp" id="J_Btn"></div>
    <audio :src="bg" loop id="J_BgAudio"></audio>
    <audio :src="lou" preload="auto" id="J_Eye"></audio>
    <!-- <audio :src="bg" preload="auto" id="J_Eye"></audio> -->
    <div class="audio_btn animated rotate" id="J_AudioBtn"></div>
    <!-- src="../assets/video/bg4.mp3" -->
    <!-- src="../static/video/bg4.mp3" -->
  </div>
</template>
<script>
import TitNav from '~/components/TitNav.vue'
// import Bg from '../static/video/au.mp3'
// import Au from '~/src/images/au.mp3'




export default {
     beforeCreate() {
    if (typeof window !== 'undefined') {
      let s= document.getElementById("h5");
      let par=s.parentNode

document.getElementById("h5").parentNode.className="h5";
     // document.getElementsByTagName("body")[0].className="h5";
     // document.getElementsByTagName("html")[0].className="h5";

}

    },
      beforeDestroy() {
            if (typeof window !== 'undefined') {
       // window.document.body.removeAttribute("class","h5");
       // window.document.html.removeAttribute("class","h5");

     }
    },
  data() {
    return {
      bg:'//qiniu.tybj-food.com/bg_m.mp3',
      lou:'//qiniu.tybj-food.com/lou_m.mp3'
    }
  },
  components: {
    TitNav,
  }
}

</script>
