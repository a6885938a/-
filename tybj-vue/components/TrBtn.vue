<template>
  <div class="js-tr">
    <div class="jstr-btn" @click="ToShow = !ToShow"></div>
    <ul class="nav-more-list" id="sub-title" v-if="ToShow">
      <li>
        <nuxt-link :to="'/'" class="nav-more-icon home-icon">首页</nuxt-link>
      </li>
      <li>
        <nuxt-link :to="'/media'" class="nav-more-icon media-icon">媒体报道</nuxt-link>
      </li>
      <li>
        <nuxt-link :to="'/about'" class="nav-more-icon about-icon">天园简介</nuxt-link>
      </li>
      <li>
        <nuxt-link :to="'/contact'" class="nav-more-icon contact-icon">联系我们</nuxt-link>
      </li>
    </ul>
    <!-- <div class="dialog_overlay" :style="{dispaly:ToShow?'block':'none'}"></div> -->
  </div>
</template>
<script>
export default {

  data() {
    return {
      ToShow: false
    }
  },
 methods:{
  changeToShow(val){
    this.ToShow=val
  }
 }
}

</script>
