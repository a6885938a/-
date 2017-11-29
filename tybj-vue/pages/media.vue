<template>
  <div>
    <GoNav ref="nav" />
    <div class="w app-pd-wp" style="padding-top:1.4rem;">
      <div class="hor-list media">
        <ul>
          <li v-for="post in datas">
            <div class="title">{{post.title}}</div>
 <div class="video-player-box" 
         @play="onPlayerPlay($event) "
         @pause="onPlayerPause($event) "
         @ended="onPlayerEnded($event) "
         @loadeddata="onPlayerLoadeddata($event) "
         @waiting="onPlayerWaiting($event) "
         @playing="onPlayerPlaying($event) "
         @timeupdate="onPlayerTimeupdate($event) "
         @canplay="onPlayerCanplay($event) "
         @canplaythrough="onPlayerCanplaythrough($event) "
         @ready="playerReadied "
         @statechanged="playerStateChanged($event) "
         v-video-player:myVideoPlayer="playerOptions ">
    </div>
         </li>

         </ul>
         </div>
     </div>
  </div>
</template>
<script>
import GoNav from '~/components/GoNav.vue'
import axios from 'axios';

export default {
data () {
      return {
        datas:[{"title":'1',"url":'http://p068hy9em.bkt.clouddn.com/12.mp4'},{"title":'2',"url":'http://p068hy9em.bkt.clouddn.com/12.mp4'}],
      post: [],
        playerOptions: {
          // component options
          start: 0,
          playsinline: false,
          // videojs options
          muted: true,
          language: 'en',
          playbackRates: [0.7, 1.0, 1.5, 2.0],
          sources: [{
            type: "video/mp4 ",
      
            src: "http://p068hy9em.bkt.clouddn.com/12.mp4"
          },
          {
            type: "video/mp4 ",
      
            src: "http://p068hy9em.bkt.clouddn.com/12.mp4"
          }],
          // poster: "/static/images/author.jpg ",
        }
      }
    },
      async asyncData({ params }) {
    let { data } = await axios.get(`https://www.tybj-food.com/155.html?json=1`)
    return { post: data.post }
  },
       methods: {
      // listen event
      onPlayerPlay(player) {
        // console.log('player play!', player)
      },
      onPlayerPause(player) {
        // console.log('player pause!', player)
      },
      onPlayerEnded(player) {
        // console.log('player ended!', player)
      },
      onPlayerLoadeddata(player) {
        // console.log('player Loadeddata!', player)
      },
      onPlayerWaiting(player) {
        // console.log('player Waiting!', player)
      },
      onPlayerPlaying(player) {
        // console.log('player Playing!', player)
      },
      onPlayerTimeupdate(player) {
        // console.log('player Timeupdate!', player.currentTime())
      },
      onPlayerCanplay(player) {
        // console.log('player Canplay!', player)
      },
      onPlayerCanplaythrough(player) {
        // console.log('player Canplaythrough!', player)
      },
      // or listen state event
      playerStateChanged(playerCurrentState) {
        console.log('player current update state', playerCurrentState)
      },
      // player is ready
      playerReadied(player) {
        console.log('example 01: the player is readied', player)
      }
    },
  components: {
    GoNav
  }
}
</script>
<!-- <style lang="scss " scoped>

   
    .vjs-tech {
     width:100%;
    }
    .vjs_video_3-dimensions {
     width:100%;
}
.vjs_video_3-dimensions {
     width:100%;
}

</style> -->
