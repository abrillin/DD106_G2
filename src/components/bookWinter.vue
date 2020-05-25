<template>
  <div class="fruit_start">
    <h1>{{data.name}}</h1>
    <div class="summer_pic">
      <div>
        <img id="big" :src="data.img[0]" />
      </div>
      <ul>
        <li v-for="(img, i) in data.img" :key="i">
          <img :src="img" @click="changeImg($event)" />
        </li>
        <!-- <li>
          <img src="@/assets/book_img/spring/plum/plum01.jpg" @click="changeImg($event)" />
        </li>
        <li>
          <img src="@/assets/book_img/spring/plum/plum06.jpg" @click="changeImg($event)" />
        </li>
        <li>
          <img src="@/assets/book_img/spring/plum/plum03.jpg" @click="changeImg($event)" />
        </li>
        <li>
          <img src="@/assets/book_img/spring/plum/plum07.jpg" @click="changeImg($event)" />
        </li>-->
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  props: { data: Object },
  computed: {
    typeName: function() {
      return Math.floor(this.page / 2);
    }
  },
  methods: {
    changeImg: function(e) {
      const path = e.target.src;
      const img = document.getElementById("big");

      img.src = path;
    }
  }
};
</script>