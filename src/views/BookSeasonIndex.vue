<template>
  <div class="book_layout">
    <div class="bk_season_index">
      <div class="bk_season">
        <!-- 9. 偵聽到 contentType 的更新，傳給 data 的 type 物件去更新要顯示的內容 -->
        <h5>{{typeList[contentType]}}目錄</h5>
        <div class="bk_season_img"></div>
        <div class="bk_season_img"></div>
        <div class="bk_season_img"></div>
      </div>
      <div class="bk_season_pic">
        <div class="bk_season_pic_package">
          <!-- 9. 偵聽到 contentType 的更新，傳給 data 的 type 物件去更新要顯示的內容 -->
          <div class="bk_season_pic1" v-for="(i, index) in data" :key="index" :name="content">
            <img :src="i.img" @click="changePage(content, index)" />
            <span>{{i.title}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  // 8. 接收到父元件的自定義變數 contentType 的值，更新上面的內容顯示
  props: { contentType: Number },
  data() {
    return {
      title: "",
      data: [],
      typeList: ["春季", "夏季", "秋季", "冬季", "常年"]
    };
  },
  computed: {
    content: function() {
      this.changeContent();
      return this.contentType;
    }
  },
  created() {
    this.changeContent();
  },
  methods: {
    changePage(t, p) {
      this.$emit("changePage", { type: t, id: p * 2 + 1 });
    },
    changeContent() {
      const api = this.path + "api_bookContent.php";

      this.$http
        .post(api, JSON.stringify({ type: this.contentType }))
        .then(res => {
          const data = res.data;

          this.data = data;

          this.data.forEach((d, i) => {
            // this.data[i]["img"] = this.img + d.title_img.split(",")[0];
            this.$set(
              this.data[i],
              "img",
              this.img + d.title_img.split(",")[0]
            );
          });
        });
    }
  }
};
</script>