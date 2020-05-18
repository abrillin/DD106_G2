<template>
  <div class="fruit_index">
    <!-- <div class="bk_content1">
      <h5>春季</h5>
      <div class="bk_content_img">
        <img src="@/assets/book_img/flower_ct.svg" />
      </div>
      <ul>
        <li>梅子</li>
        <li>李子</li>
        <li>桃子</li>
        <li>琵琶</li>
      </ul>
    </div>
    <div class="bk_content1">
      <h5>夏季</h5>
      <div class="bk_content_img">
        <img src="@/assets/book_img/binbo.svg" />
      </div>
      <ul>
        <li>西瓜</li>
        <li>火龍果</li>
        <li>荔枝</li>
        <li>芒果</li>
      </ul>
    </div>
    <div class="bk_content1">
      <h5>秋季</h5>
      <div class="bk_content_img">
        <img src="@/assets/book_img/leaf.svg" />
      </div>
      <ul>
        <li>葡萄</li>
        <li>柿子</li>
        <li>柚子</li>
        <li>梨子</li>
      </ul>
    </div>
    <div class="bk_content1">
      <h5>冬季</h5>
      <div class="bk_content_img">
        <img src="@/assets/book_img/snow.svg" />
      </div>
      <ul>
        <li>草莓</li>
        <li>橘子</li>
        <li>棗子</li>
        <li>番茄</li>
      </ul>
    </div>
    <div class="bk_content1">
      <h5>常年</h5>
      <div class="bk_content_img">
        <img src="@/assets/book_img/leaf_year.svg" />
      </div>
      <ul>
        <li>木瓜</li>
        <li>鳳梨</li>
        <li>香蕉</li>
        <li>芭樂</li>
      </ul>
    </div>-->
    <div v-for="i in index" :key="i.type" class="bk_content1">
      <h5>{{i.name}}</h5>
      <div class="bk_content_img">
        <img :src="require('@/assets/book_img/' + i.img)" />
      </div>
      <ul>
        <!-- (page) 1. 觸發 changePage 方法 -->
        <li
          v-for="(j, index) in i.item"
          :key="index"
          @click="changePage(i.type, j.id, j.name)"
        >{{j.name}}</li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      index: [
        {
          type: 0,
          name: "春季",
          img: "flower_ct.svg",
          item: [
            {
              id: 0,
              name: "梅子"
            },
            {
              id: 1,
              name: "李子"
            },
            {
              id: 2,
              name: "桃子"
            },
            {
              id: 3,
              name: "枇杷"
            }
          ]
        },
        {
          type: 1,
          name: "夏季",
          img: "binbo.svg",
          item: [
            {
              id: 0,
              name: "西瓜"
            },
            {
              id: 1,
              name: "火龍果"
            },
            {
              id: 2,
              name: "荔枝"
            },
            {
              id: 3,
              name: "芒果"
            }
          ]
        },
        {
          type: 2,
          name: "秋季",
          img: "leaf.svg",
          item: [
            {
              id: 0,
              name: "葡萄"
            },
            {
              id: 1,
              name: "柿子"
            },
            {
              id: 2,
              name: "柚子"
            },
            {
              id: 3,
              name: "梨子"
            }
          ]
        },
        {
          type: 3,
          name: "冬季",
          img: "snow.svg",
          item: [
            {
              id: 0,
              name: "草莓"
            },
            {
              id: 1,
              name: "橘子"
            },
            {
              id: 2,
              name: "棗子"
            },
            {
              id: 3,
              name: "番茄"
            }
          ]
        },
        {
          type: 4,
          name: "常年",
          img: "leaf_year.svg",
          item: [
            {
              id: 0,
              name: "木瓜"
            },
            {
              id: 1,
              name: "鳳梨"
            },
            {
              id: 2,
              name: "香蕉"
            }
          ]
        }
      ]
    };
  },
  methods: {
    // (page) 2. 傳遞 changePage 事件及 {} 的值給父層 
    changePage: function(i, d, n) {
      this.$emit("changePage", { type: i, id: d * 2 + 1});
    }
  }
};
</script>