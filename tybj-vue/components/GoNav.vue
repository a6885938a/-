<template>
  <div id="naxBox" ref="nav" class='th-nav wbox rel show-top-pannel' style=""  :style="{position: 'fixed',}">
    <!-- <div class="opa1" :style="{ webkitMaskImage:'url(' +post.description+')'}" >12</div> -->
    <!-- <nuxt-link to="/">Back to the home page</nuxt-link> -->
    <a class="class th-nav-back" @click="go()"></a>
    <Logo :ml='0.5' />
    <div class="th-nav-title of bg" @click="change('56')">天园饼家</div>
  </div>
</template>
<script>
import Logo from '~/components/Logo.vue'
export default {
  props: { fixtop: { type: Number } },

  data() {
    return {
      y: 0,
      td: '',
      fix:100
    }
  },
  methods: {
    init() {

    },

    go() {
      window.history.go(-1)
      // this.$router.go(-1)
    },
    change(x) {
      this.td = '';
    }
  },
  mounted() {
    // let canvas=document.getElementById('naxBox').clientHeight;
    // console.log(canvas);
    this.init();

  },
  created() {
    // console.log(this.$refs.nav.style.color);
  },
  components: {
    Logo,
  }

}

</script>
