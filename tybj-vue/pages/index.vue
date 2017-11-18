<template>
<div>
<TopNav/>
<Swiper/>
  <section class="container">

    <div>

      <logo />
     <div id="example-1">

</div>

      <h1 class="title">

      <nuxt-link to="/about">  Go to /about</nuxt-link>

      </h1>
      <h2 class="subtitle">
      
      </h2>
      <div class="links">
        <a href="https://nuxtjs.org/" target="_blank" class="button--green">Documentation</a>
        <a href="https://github.com/nuxt/nuxt.js" target="_blank" class="button--grey">GitHub</a>
      </div>
    </div>
  </section>
  </div>
</template>

<script>
import Logo from '~/components/Logo.vue'
import TopNav from '../components/index/TopNav.vue'
import Swiper from '../components/index/Swiper.vue'

export default {
  components: {
    TopNav,
    Swiper
  }
}

</script>
<style>
.fade-enter-active {
  transition: all .3s ease;
}
.fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.fade-enter, .fade-leave-to
 {
  transform: translateX(10px);
  opacity: 0;
}
.container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  /* 1 */
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

</style>
