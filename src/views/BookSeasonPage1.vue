<template>
  <div class="book_layout">
    <div class="bk_ct bk_ct_left">
      <!-- 9. 接收到 contentType、page 的值，傳值到元件的自定義變數 type、page -->
      <component :is="'PageLeft'+this.left" :type="contentType" :page="page"></component>
      <div class="fruit_intro">
        <p>{{ooo}}</p>
      </div>
    </div>
    <component :is="'PageRight'+this.right" :type="contentType"></component>
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
  props: { pageId: Number, page: Number, contentType: Number },
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
              name: "芒果"
            },
            {
              name: "火龍果"
            },
            {
              name: "荔枝"
            }
          ]
        },
        {
          item: [
            {
              name: "西瓜"
            },
            {
              name: "芒果"
            },
            {
              name: "火龍果"
            },
            {
              name: "荔枝"
            }
          ]
        },
        {
          item: [
            {
              name: "西瓜"
            },
            {
              name: "芒果"
            },
            {
              name: "火龍果"
            },
            {
              name: "荔枝"
            }
          ]
        }
      ],
      right: "Others",
      left: "Spring",
      json: [
        {
          intro:
            "梅子是亞洲特有的果樹，除了台灣、日本和韓國之外，其他地區很少栽種。梅子的風味以清酸稱絕，滿口生津而別有風味，和一般水果講求香、甜有所不同。梅子所含的果酸較多，如果生食未成熟的青梅會造成腸胃不適，經過醃漬、曝晒加工之後更適合食用。梅子的加工品項多樣，除梅乾、蜜餞、脆梅、梅醬等，也能用來釀酒。梅子內有豐富檸檬酸、蘋果酸等有機酸，蛋白質的含量更是草莓、柑桔的兩倍以上。梅子是亞洲特有的果樹，除了台灣、日本和韓國之外，其他地區很少栽種。梅子的風味以清酸稱絕，滿口生津而別有風味，和一般水果講求香、甜有所不同。$梅子所含的果酸較多，如果生食未成熟的青梅會造成腸胃不適，經過醃漬、曝晒加工之後更適合食用。梅子的加工品項多樣，除梅乾、蜜餞、脆梅、梅醬等，也能用來釀酒。梅子內有豐富檸檬酸、蘋果酸等有機酸，蛋白質的含量更是草莓、柑桔的兩倍以上。台灣的梅子主要栽種在中央山脈兩側，以南投信義鄉、水里鄉的產量最多，信義鄉更有$「梅子鄉」的雅稱。梅子依照成熟度可分為兩期採收，第一期採收六、七分熟的青梅，主要用作脆梅；第二期採收八、九分熟的熟梅，可用為原味梅、蜜梅、紫蘇梅等原料。"
        }
      ],
      ooo: "",
      xxx: ""
    };
  },
  created() {
    this.changeContent();

    this.ooo = this.json[0].intro.split("$")[0];
    this.xxx = this.json[0].intro.split("$")[1];
  },
  computed: {
    content: function() {
      this.changeContent();
      return this.index[this.contentType].item[Math.floor(this.page / 2)];
    }
  },
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