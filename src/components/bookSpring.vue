<template>
  <div class="fruit_start">
    <h1>{{data.name}}</h1>
    <div class="fruit_start_img">
      <div class="img_content">
        <img :src="'/api/'+data.img" alt />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: { data: Object }
};
</script>