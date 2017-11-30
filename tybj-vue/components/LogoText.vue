<template>
  <div>
    <img :style="{marginLeft:ml+'rem',display:isDisplay?isDisplay:'none'}" class="logo" src="../src/images/logo_text.png" />
  </div>
</template>
<script>
export default {
  // props:['pl']

  props: { ml: { type: Number },isDisplay:{ type: String } },
}

</script>
