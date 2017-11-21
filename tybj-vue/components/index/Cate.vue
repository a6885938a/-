<template>
  <div class="app-scroller-wrap">
    <div class="app-scroller">
      <ul id="chooseTit" class="choose-items-wp">
      <!-- <li ><a><span>全部</span></a></li> -->
      <li :id="post.id" v-for="post in cate_name"><a><span>{{post.title}}</span></a></li>
       
         <!--  <nuxt-link :to="{ name: 'posts-id', params: { id: post.id } }">{{ post.title }}</nuxt-link> -->
        <!-- </li> -->
        <!-- <li v-for="post in posts"><a><span>{{post.cate_name}}</span></a></li> -->
       <!--  <li class="act"><a><span>全部</span></a></li>
	   <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li>
	      <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li>
	      <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li>
	      <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li>
	      <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li>
	      <li><a><span>西樵大饼</span></a></li>
	   <li><a><span>媒体报道</span></a></li> -->
      </ul>
    </div>
  </div>
</template>
<script>
// import axios from 'axios'
export default {
props:['cate_name'],
 // new Vue({
 //            el: 'chooseTit',
 //            methods:{
 //                getIndex:function($index){
 //                    this.click=$index;
 //                }
 //            }
 //        });
  // async asyncData({ app }) {
  //   const { data: { message: dog } } = await app.$axios.get('/api/dog')
  //   return { dog }
  // }

  // async asyncData({ app }) {
  //   const ip = await app.$axios.$get('http://icanhazip.com')
  //   return { posts: ip }
  // }
}

// asyncData({ req, params }) {
//     // We can return a Promise instead of calling the callback
//     return axios.get('https://jsonplaceholder.typicode.com/posts')
//       .then((res) => {
//         return { posts: res.data.slice(0, 5) }
//         // console.log(res.data.slice(0, 5));
//       })
//   }
// }
// import $ from 'jquery'

// axios.get('https://jsonplaceholder.typicode.com/posts')
//   .then(function (response) {
//   	return { posts: response}
//     console.log(response);
//   })
//   .catch(function (response) {
//     console.log(response);
//   });


// var vum = new Vue({
//     el:"#app",
//     data:{
//         users:""
//     },
//     methods:{
//         showData:function(){
//             $.ajax({
//                 url:"/wap/?g=WapSite&c=Exchange&a=get_cate_list",
//                 type:"post",
//                 dataType:"json",
//                 success:function(data){
//                  console.log('data');
//                 },
//                 error:function(){
//                     alert("请求失败");
//                 }
//             });
//         }
//     }
// });
// vm.getData();
// function fetchCateList() {
//   $.ajax({
//     url: '/wap/?g=WapSite&c=Exchange&a=get_cate_list',
//     dataType: 'json',
//     type: 'post',

//     success: function(data, status) {
//       console.log(data)
//     }

//   });
// }
// fetchCateList()
// 
// 
//    const fetchCateList = () => {
//  fetch('http://dev.thgo8.com/wap/?g=WapSite&c=Exchange&a=get_cate_list', {
//           method: 'POST',
//           headers: {
//             "Content-Type": "application/x-www-form-urlencoded"
//           }
//         })
//         .then((res) => res.json())
//         .then((data) => {
//          console.log(data);
//         })
//         .catch(function(e) {
//           console.log("加载失败");
//         });
//     }
// fetchCateList();

</script>
<!-- https://www.tybj-food.com/?json=get_category_index -->
<!-- {"status":"ok","count":4,"categories":[{"id":6,"slug":"cakes","title":"\u4f20\u7edf\u793c\u997c","description":"\u559c\u997c\u662f\u5a5a\u5ac1\u7684\u4f20\u7edf\u98df\u54c1 \r\n\u5c3d\u7ba1\u65f6\u4e0b\u5a5a\u793c\u5f62\u5f0f\u8d8a\u6765\u8d8a\u4e0d\u62d8\u4e00\u683c\uff0c\u4f46\u4e70\u559c\u997c\uff0c\u9001\u559c\u997c\uff0c\u4ecd\u662f\u4e0d\u5c11\u65b0\u4eba\u7684\u201c\u89c4\u5b9a\u52a8\u4f5c\u201d\u3002\r\n\u5728\u9985\u6599\u53e3\u5473\u4e0a\uff0c\u4f20\u7edf\u7684\u559c\u997c\u5927\u4f53\u5206\u4e3a\u56db\u79cd\uff1a\r\n\u897f\u6a35\u5927\u997c\u3001\u6838\u6843\u9165\u3001\u9e21\u86cb\u7cd5\u3001\u7ea2\u83f1\u3001\u767d\u83f1\u3001\u9f99\u51e4\u559c\u997c\r\n\u5982\u4eca\u968f\u7740\u5c81\u6708\u53d8\u8fc1\uff0c\u53c8\u51fa\u73b0\u4e86\u4e94\u4ec1\u9985\u3001\u51ac\u84c9\u3001\u8c46\u84c9\u3001\u53c9\u70e7\u7b49\u7684\u65b0\u9c9c\u53e3\u5473\u3002\r\n\u8fd9\u4e9b\u4f20\u7edf\u98ce\u5473\u7684\u559c\u997c\uff0c\u4e00\u76f4\u4ee5\u6765\uff0c\u90fd\u8f83\u53d7\u957f\u8f88\u4eec\u559c\u7231\u3002","parent":0,"post_count":6},{"id":1,"slug":"news","title":"\u5929\u56ed\u8d44\u8baf","description":"\u5929\u56ed\u997c\u5bb6\u4e3b\u7ecf\u8425\u4f20\u7edf\u897f\u6a35\u5927\u997c\u3001\u9e21\u86cb\u7cd5\u3001\u6838\u6843\u9165\u3001\u6708\u997c\u3001\u9f99\u51e4\u793c\u997c\u3001\u9e21\u4ed4\u997c\u3001\u5ac1\u5973\u997c\u7b49\u66f4\u662f\u4e2d\u5916\u9a70\u540d\uff0c\u4ea7\u54c1\u8fdc\u9500\u6d77\u5185\u5916\u3002","parent":0,"post_count":2},{"id":8,"slug":"moon-cake","title":"\u6708\u997c\u7cfb\u5217","description":"","parent":0,"post_count":3},{"id":7,"slug":"gift","title":"\u7279\u8272\u624b\u4fe1","description":"","parent":0,"post_count":2}]}
 -->
