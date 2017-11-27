<template>
  <div>
        <!-- <nuxt-link :to="{ name: 'page', params: { id: '155' } }">123321</nuxt-link> -->
    <TopNav/>
   <Swiper :goodsLists="bannerGoods"/>
    <Cate :cate_name="posts" v-on:changeAct="changeAct" />
    <CateGoods ref="categoods" :goodsLists="cateGoods" v-on:changeIsData="changeIsData" />
  </div>
</template>
<script>
import Logo from '~/components/Logo.vue'
import TopNav from '../components/index/TopNav.vue'
import Swiper from '../components/index/Swiper.vue'
import Cate from '../components/index/Cate.vue'
import CateGoods from '../components/index/CateGoods.vue'
// import Model from '../components/index/Model.vue'
import axios from 'axios'


export default {
  data() {
    return {
      scrollTop: '',
      scrollHeight: '',
      clientHeight: '',
      isDataing: false,
      posts: [],
      cateGoods: [],
      bannerGoods:[]
    }
  },
  methods: {
   scroll() {
      this.scrollTop = this.getScrollTop();
      this.scrollHeight = this.getScrollHeight();
      this.clientHeight = this.getClientHeight();
      // console.log(this.scrollTop);
      // console.log(this.scrollHeight);
      console.log(this.isDataing);
      // console.log(this.scrollHeight);
      if (this.clientHeight + this.scrollTop === this.scrollHeight && this.isDataing === false) {
        // console.log('test');
        this.isDataing = true;
        console.log(this.isDataing);
        this.$refs.categoods.getMoreData()
      }
    },
    changeIsData(val) {

      this.isDataing = val
    },
    changeAct: function(id) {
      this.$refs.categoods.changeLoad(true)
      this.$refs.categoods.getNewsFn(id,1)
    },
    getScrollTop() {
      var scrollTop = 0;
      if (document.documentElement && document.documentElement.scrollTop) {
        scrollTop = document.documentElement.scrollTop;
      } else if (document.body) {
        scrollTop = document.body.scrollTop;
      }
      return scrollTop;
    },
    getClientHeight() {

      var windowHeight = 0;
      if (document.compatMode === "CSS1Compat") {
        windowHeight = document.documentElement.clientHeight;
      } else {
        windowHeight = document.body.clientHeight;
      }

      return windowHeight;

    },
    getScrollHeight() {

      var scrollHeight = 0,
        bodyScrollHeight = 0,
        documentScrollHeight = 0;
      if (document.body) {
        bodyScrollHeight = document.body.scrollHeight;
      }
      if (document.documentElement) {
        documentScrollHeight = document.documentElement.scrollHeight;
      }
      scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
      return scrollHeight;

    }


  },

  mounted() {
    window.addEventListener('scroll', this.scroll)
  },
destroyed(){
    window.removeEventListener('scroll', this.scroll)

},

  async asyncData() {
    let _self = this

    function ObjStory(id, slug, title, description) //声明对象
    {
      this.ID = id;
      this.slug = slug;
      this.title = title;
      this.description = description;
    }
    const getCate = () => {
      return axios.get('https://www.tybj-food.com/?json=get_category_index');
    }
    const getCateGoods = () => {
      return axios.get('https://www.tybj-food.com/?json=1&&page=1');
    }
       const getBanner = () => {
      return axios.get('https://www.tybj-food.com/?json=get_tag_posts&tag_slug=banner');
    }
    let i_all='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAApVBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABU/knhAAAANnRSTlMAwfgE5sw7JeJi8/vECuzIIrs26Sjd2NF9XlVPGRI5oKOcRR6YjYNn7g+RdG6IPzIvLauKsqe+JeGyAAADf0lEQVRo3u2aa3OiMBiFAUEthLvcVQRB8dqqrf//p+3kna3gmkCWdTrtTs6nmnkPTzDFnIQI/50Gk/2HLZKF3lfxjOia5eE7orjsj/1kcFc9ynxXlWhSjbG5HjwyYtMzJLrL9bNRozoypWuHxuX0D8S09LpMkhnVPYLqLsPWumdcJAaXF/8ufwuuLJLCQXMQdyqTK5hAuX7W8Cc1QCJFigz15lsD8qZAm6zQTChQoWsZdG04xh+q4iTQNNsDRV012lYqMPYzqutUVDCYcCuhgS9QCG1yDFxvN1ps3GA4ra4Cd8TdQzkewGDZWr7JcL1SD72l4J5lm1bXEg+2BF1DGCJ2PKtrA0Mmt4YJhhjrQbtNxBAEf7FAchlDRvXTiyFyzgIRmSFzImT+XMiQCBlyCIdwCIdwCIdwyA+HkIOEwwzpH4nc5O8gaNAO2VWEcKeu2l26eYOkOIF6SWu5hTQc65d1AsV+DVmtrmiMe5LCEghSvT/SBzTp1gGXaKlQK4X1xsFqcY18SPUxLAxMuIJRxsf5kCAn3yG4ohc1e+mBC60Sh2SaH+PSAJc5g/qdccVSXZkst9KgYKE3v+/FFSh0lwoFxk4AzYori9Cr0NQrYnIVs8//x0LrrraPwr2OdrdJK0b1Sjbs6pa8cB6XXwu56+bDadMwz0TTH5PlB2ixF0jaL1BAdZliNn94cpZ59ELSOjlNBZqmp2RNdEX5Uhe4uLi+razJiKIJ/YnXLarpcdZ8XdmmQpW5iIiIJEUtJnt1NzksQ1Ht2Esk/Aqf0qDdpIphIxVs+8wnznu3Sbvtjs5KqcfMOLFZTFK5Ee7meMOlzdY95njXUKFAfhGaaSVb5+S0klwCoPhJc8x9cAUXSlrJ19ktrdS5y9noT81d+sapcxdbgoR7QZt65xPBfTAkyGrLnIUL4m7qhSUL28ypPnYJgdtNnrub6pDXJz9wpcUhHMIhHMIhHMIh32Sjc/5cyPEr3v3G7r+9xbYl7J+2Z8Gyz/v4af0+vqxwGAxby0e9ThYcKlwT3s5IaHLYci+JrxHPSGh+RDctD9Cz8RC+CvuK5SoiTcgjnPYwoW2MqK6ggvXGWYf6udfn3EooMbn8z0Vg1OcEjrVloDT3kiNF63GWaCt3mTSlOWbO2TMkulTiqSh9Z47VFpfhnZ17wzC06WOY0s53xSnVg+xwqAtfp1+2QbFkV4Bt5QAAAABJRU5ErkJggg=='
    let writer = new ObjStory(0, 'all', '全部', i_all);
    return axios.all([getCate(), getCateGoods(), getBanner()])
      .then(axios.spread((cateResp, cateGoodsResp,bannerResp) => {
        cateResp.data.categories.unshift(writer)

        return { posts: cateResp.data.categories,cateGoods:cateGoodsResp.data.posts,bannerGoods:bannerResp.data.posts }
      }));
  },

  created() {
    console.log(this.bannerGoods);
  },
  components: {
    TopNav,
    Swiper,
  
    Cate,
    CateGoods
  }
}

</script>
<style>
.fade-enter-active {
  transition: all .2s ease;
}

.fade-leave-active {
  transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.fade-enter,
.fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}





</style>
