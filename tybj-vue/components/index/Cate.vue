<template>
  <div class="app-scroller-wrap">
    <div class="app-scroller">
      <ul id="chooseTit" class="choose-items-wp">
      <li :class="checkIndex(index)" :id="post.id" v-for="(post,index) in cate_name" @click="changeAct(index,post.id)"><a><span>{{post.title}}</span></a></li>

      </ul>
    </div>
  </div>
</template>
<script>
export default {
// props:['cate_name']
props:{cate_name:{type:Array}},
data(){
  return {
currentIndex:0
  }
},

methods:{
  checkIndex:function(index){
return index===this.currentIndex?'act':''

  },
  changeAct:function(index,id){
    this.currentIndex=index
     this.$emit('changeAct',id)

  }
}

}


</script>

