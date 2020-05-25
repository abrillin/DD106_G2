<template>
  <div class="fruit_start">
    <h1>{{data.name}}</h1>
    <div class="fruit_start_img">
      <div class="img_content">
        <img :src="data.img" />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: { data: Object },
  // data() {
  //   return {
  //     img: ""
  //   };
  // },
  // updated() {
  //   this.img = this.img + this.data.img;
  // }
};
</script>