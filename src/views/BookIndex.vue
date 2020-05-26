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
    <div v-for="i in data" :key="i.type" class="bk_content1">
      <h5>{{i.typeName}}</h5>
      <div class="bk_content_img">
        <img :src="require('@/assets/book_img/' + i.img)" />
      </div>
      <ul>
        <!-- (page) 1. 觸發 changePage 方法 -->
        <li
          v-for="(j, index) in i.title"
          :key="index"
          @click="changePage(i.type, j.id)"
        >{{j.title}}</li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      imgs: [
        "flower_ct.svg",
        "binbo.svg",
        "leaf.svg",
        "snow.svg",
        "leaf_year.svg"
      ],
      data: {}
    };
  },
  created() {
    const api = this.path + "api_bookType.php";

    this.$http.post(api).then(res => {
      const data = res.data;

      this.data = data;

      // 百科分類的資料置換(從數字轉成文字)
      const typeList = ["春季", "夏季", "秋季", "冬季", "常年"];

      this.data.forEach((d, i) => {
        this.data[i]["typeName"] = typeList[d.type];
        this.data[i]["img"] = this.imgs[i];

        // 對每個水果新增索引
        this.data[i]["title"].forEach((t, j) => {
          this.$set(this.data[i]["title"][j], "id", j);
          // this.data[i]["title"][j]["id"] = j;
        });
      });
    });
  },
  methods: {
    // (page) 2. 傳遞 changePage 事件及 {} 的值給父層
    changePage: function(i, d) {
      this.$emit("changePage", { type: i, id: d * 2 + 1 });
    }
  }
};
</script>