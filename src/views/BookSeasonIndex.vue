<template>
  <div class="book_layout">
    <div class="bk_season_index">
      <div class="bk_season">
        <!-- 9. 偵聽到 contentType 的更新，傳給 data 的 type 物件去更新要顯示的內容 -->
        <h5>{{index[contentType].season}}目錄</h5>
        <div class="bk_season_img"></div>
        <div class="bk_season_img"></div>
        <div class="bk_season_img"></div>
      </div>
      <div class="bk_season_pic">
        <div class="bk_season_pic_package">
          <!-- 9. 偵聽到 contentType 的更新，傳給 data 的 type 物件去更新要顯示的內容 -->
          <div class="bk_season_pic1" v-for="(i, index) in index[contentType].item" :key="i.type">
            <img
              src="../assets/book_img/spring/plum/plum04.jpg"
              @click="changePage(contentType, index)"
            />
            <span>{{i.name}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  // 8. 接收到父元件的自定義變數 contentType 的值，更新上面的內容顯示
  props: ["contentType"],
  data() {
    return {
      index: [
        {
          season: "春季",
          item: [
            {
              name: "梅子",
              img: "plum04.jpg"
            },
            {
              name: "李子",
              img: "plum04.jpg"
            },
            {
              name: "桃子",
              img: "plum04.jpg"
            },
            {
              name: "琵琶",
              img: "plum04.jpg"
            }
          ]
        },
        {
          season: "夏季",
          item: [
            {
              name: "西瓜",
              img: "plum04.jpg"
            },
            {
              name: "火龍果",
              img: "plum04.jpg"
            },
            {
              name: "荔枝",
              img: "plum04.jpg"
            },
            {
              name: "芒果",
              img: "plum04.jpg"
            }
          ]
        },
        {
          season: "秋季",
          item: [
            {
              name: "西瓜",
              img: "plum04.jpg"
            },
            {
              name: "芒果",
              img: "plum04.jpg"
            },
            {
              name: "火龍果",
              img: "plum04.jpg"
            },
            {
              name: "荔枝",
              img: "plum04.jpg"
            }
          ]
        },
        {
          season: "冬季",
          item: [
            {
              name: "西瓜",
              img: "plum04.jpg"
            },
            {
              name: "芒果",
              img: "plum04.jpg"
            },
            {
              name: "火龍果",
              img: "plum04.jpg"
            },
            {
              name: "荔枝",
              img: "plum04.jpg"
            }
          ]
        },
        {
          season: "常年",
          item: [
            {
              name: "西瓜",
              img: "plum04.jpg"
            },
            {
              name: "火龍果",
              img: "plum04.jpg"
            },
            {
              name: "荔枝",
              img: "plum04.jpg"
            },
            {
              name: "芒果",
              img: "plum04.jpg"
            }
          ]
        }
      ]
    };
  },
  methods: {
    changePage(t, p) {
      this.$emit("changePage", { type: t, id: p * 2 + 1});
    }
  }
};
</script>