<template>
  <div>
    <img :style="{marginLeft:ml+'rem'}" class="logo" src="../src/images/logo.png" />
  </div>
</template>
<script>
export default {
  // props:['pl']

  props: { ml: { type: Number } },
}

</script>
