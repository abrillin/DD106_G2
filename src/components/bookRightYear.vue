<template>
  <div class="bk_ct bk_ct_right year_bg">
    <div class="fruit_Q fruit_Q_year">
      <div class="fruit_question">
        <h2>農知識</h2>
        <h2>{{content.qus}}</h2>
      </div>
      <div class="fruit_A">
        <p>{{content.ans}}</p>
        <div class="fruit_img">
          <img :src="'/api/'+content.img" />
        </div>
      </div>
    </div>
    <div class="fruit_video">
      <iframe
        :src="content.video"
        frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
  </div>
</template>
<script>
export default {
  props: { content: Object }
};
</script>