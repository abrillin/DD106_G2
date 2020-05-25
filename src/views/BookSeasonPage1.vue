<template>
  <div class="book_layout">
    <div class="bk_ct bk_ct_left">
      <!-- 9. 接收到 contentType、page 的值，傳值到元件的自定義變數 type、page -->
      <component
        :is="'PageLeft'+this.left"
        :type="contentType"
        :page="page"
        :data="{name: data.title, img: imgLeft}"
      ></component>
      <div class="fruit_intro">
        <p>{{data.content}}</p>
      </div>
    </div>
    <component
      :is="'PageRight'+this.right"
      :type="contentType"
      :content="{ans: data.answer, qus: data.question, video: data.video, img: imgRight, name: data.title}"
    ></component>
  </div>
</template>
<script>
import PageRightOthers from "@/components/bookRightOthers";
import PageRightYear from "@/components/bookRightYear";

import PageLeftSpring from "@/components/bookSpring";
import PageLeftSummer from "@/components/bookSummer";
import PageLeftFall from "@/components/bookFall";
import PageLeftWinter from "@/components/bookWinter";
import PageLeftYear from "@/components/bookSpring";

export default {
  // 8. 接收到父元件的自定義變數 contentType 的值，更新上面的內容顯示
  props: { page: Number, contentType: Number },
  data() {
    return {
      data: {},
      imgLeft: [],
      imgRight: [],
      right: "Others",
      left: "Spring"
    };
  },
  created() {
    const api = this.path + "api_bookContent.php";

    this.$http
      .post(
        api,
        JSON.stringify({
          type: this.contentType,
          index: Math.round(this.page / 2)
        })
      )
      .then(res => {
        const data = res.data;
        this.data = data[Math.floor(this.page / 2)];

        if (this.data.title_img != undefined) {
          const imgArr = this.data.title_img.split(",");

          const type = this.contentType;

          if (type == 0 || type == 2 || type == 4) {
            this.imgLeft = this.img + imgArr[0];
            this.imgRight = this.img + imgArr[1];
          }

          if (type == 1 || type == 3) {
            for (let i = 0; i < 4; i++) {
              this.imgLeft[i] = this.img + imgArr[i];
            }
            this.imgRight = this.img + imgArr[4];
          }
        }
      });

    this.changeContent();
  },
  // computed: {
  //   content: function() {
  //     this.changeContent();
  //     return this.index[this.contentType].item[Math.round(this.page / 2)];
  //   }
  // },
  methods: {
    changeContent: function() {
      if (this.contentType == 0) {
        this.right = "Others";
        this.left = "Spring";
      } else if (this.contentType == 1) {
        this.right = "Others";
        this.left = "Summer";
      } else if (this.contentType == 2) {
        this.right = "Others";
        this.left = "Fall";
      } else if (this.contentType == 3) {
        this.right = "Others";
        this.left = "Winter";
      } else if (this.contentType == 4) {
        this.right = "Year";
        this.left = "Year";
      }
    }
  },
  components: {
    PageRightOthers,
    PageRightYear,
    PageLeftSpring,
    PageLeftSummer,
    PageLeftFall,
    PageLeftWinter,
    PageLeftYear
  }
};
</script>