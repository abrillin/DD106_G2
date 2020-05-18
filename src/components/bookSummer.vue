<template>
  <div class="fruit_start">
    <h1>{{index[type].item[typeName].name}}</h1>
    <div class="summer_pic">
      <div>
        <img id="big" src="@/assets/book_img/spring/plum/plum01.jpg" />
      </div>
      <ul>
        <li>
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
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  props: { type: Number, page: Number },
  data() {
    return {
      index: [
        {
          item: [
            {
              name: "梅子"
            },
            {
              name: "李子"
            },
            {
              name: "桃子"
            },
            {
              name: "琵琶"
            }
          ]
        },
        {
          item: [
            {
              name: "西瓜"
            },
            {
              name: "火龍果"
            },
            {
              name: "荔枝"
            },
            {
              name: "芒果"
            }
          ]
        },
        {
          item: [
            {
              name: "秋水果1"
            },
            {
              name: "秋水果2"
            },
            {
              name: "秋水果3"
            },
            {
              name: "秋水果4"
            }
          ]
        },
        {
          item: [
            {
              name: "冬水果1"
            },
            {
              name: "冬水果2"
            },
            {
              name: "冬水果3"
            },
            {
              name: "冬水果4"
            }
          ]
        },
        {
          item: [
            {
              name: "常年1"
            },
            {
              name: "常年2"
            },
            {
              name: "常年3"
            },
            {
              name: "常年4"
            }
          ]
        }
      ]
    };
  },
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