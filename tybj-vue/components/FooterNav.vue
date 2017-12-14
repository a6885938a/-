<template>
  <footer class="v5-tab">
    <ul class="hor-view">
      <li class="cur">
         <nuxt-link :to="'/'">
          <div class="opa1 i_home"></div> <span>首页</span>  
           </nuxt-link>
      </li>
      <li>
        <nuxt-link :to="'/media'">
          <div class="opa1 i_media"></div> <span>媒体报道</span> 
          </nuxt-link>
      </li>
      <!--     <li>
          <nuxt-link :to="/media"><div class="opa1 i_search" ></div> <span >搜索文章</span>   </nuxt-link>
           </li> -->
      <li>
        <a href="http://www.tybj-food.com/wp-content/themes/tybj/h5/brand.html">
          <div class="opa1 i_about"></div> <span>天园简介</span> </a>
      </li>
      <li>
        <nuxt-link :to="'/contact'">
        <div class="opa1 i_contact"></div> <span>联系我们</span> 
        </nuxt-link>
      </li>
    </ul>
  </footer>
</template>
