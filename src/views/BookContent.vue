<template>
  <div class="bk_All">
    <!-- 7. 接收到 pageType() 的回傳值給子元件的自定義變數 contentType -->
    <!-- 元件有 BookSeasonIndex.vue、BookSeasonPage1.vue、BookSeasonPage2.vue -->
    <!-- (page) 10. 接收到 pageNum() 的回傳值給子元件(BookSeasonPage1.vue)的自定義變數 pageNum-->
    <component
      :page="currentTab.page"
      :contentType="pageType"
      :is="currentTab.index"
      :pageNum="pageNum"
      @changePage="sendPage"
    ></component>
    <div class="change_bookpage">
      <div v-for="tab in tabs" :key="tab.name" :class="'changebutton' + tab.class">
        <button v-if="tab.status == true" @click="toggleTab(tab)"></button>
      </div>
    </div>
  </div>
</template>
<script>
import index from "@/views/BookSeasonIndex";
import page1 from "@/views/BookSeasonPage1";
import page2 from "@/views/BookSeasonPage2";
export default {
  // 5. 接收父層(Book.vue)的自定義變數 contentIndex 的值
  // (page) 8. 接收父層(Book.vue)的自定義變數 pageId 的值
  props: { contentIndex: Number, pageId: Number },
  data() {
    return {
      currentTab: [],
      tabs: [
        {
          name: "上一頁",
          class: "left",
          status: false
        },
        {
          name: "下一頁",
          class: "right",
          status: true
        }
      ]
    };
  },
  created() {
    this.currentTab = {
      index: "index",
      page: 0
    };
  },
  mounted() {
    if (this.currentTab.page > 0) {
      this.tabs[0].status = true;
      this.tabs[1].status = true;
      this.currentTab = {
        index: "page1",
        page: this.pageId
      };
    }
  },
  computed: {
    // 6. 偵聽到 contentIndex 值的更新，觸發 rePage() 並回傳 pageType() 值給上面的元件
    pageType: function() {
      this.rePage();
      return this.contentIndex;
    },
    // (page) 9. 偵聽到 pageId 值的更新，觸發 changePage() 並回傳 pageNum() 值給上面的元件
    pageNum: function() {
      this.changePage();
      return this.pageId;
    }
  },
  methods: {
    toggleTab: function(tab) {
      // 頁面邏輯判斷
      if (this.currentTab.page == 0) {
        this.currentTab.index = "page1";
        this.currentTab.page = 1;
      } else if (
        this.currentTab.page > 0 &&
        this.currentTab.index == "page1" &&
        tab.name == "下一頁"
      ) {
        this.currentTab.index = "page2";
        this.currentTab.page++;
      } else if (
        this.currentTab.page > 0 &&
        this.currentTab.index == "page2" &&
        tab.name == "下一頁"
      ) {
        this.currentTab.index = "page1";
        this.currentTab.page++;
      } else if (
        this.currentTab.page == 1 &&
        this.currentTab.index == "page1" &&
        tab.name == "上一頁"
      ) {
        this.currentTab.index = "index";
        this.currentTab.page--;
      } else if (
        this.currentTab.page > 0 &&
        this.currentTab.index == "page1" &&
        tab.name == "上一頁"
      ) {
        this.currentTab.index = "page2";
        this.currentTab.page--;
      } else if (
        this.currentTab.page > 0 &&
        this.currentTab.index == "page2" &&
        tab.name == "上一頁"
      ) {
        this.currentTab.index = "page1";
        this.currentTab.page--;
      }
      // 判斷是否翻完該季節的水果頁面
      if (this.currentTab.page > 8) {
        this.currentTab.index = "index";
        this.currentTab.page = 0;
        this.tabs[0].status = false;
        this.$emit("addType", 1);
      }
      // 按鈕顯示切換
      if (this.currentTab.page == 1) {
        this.tabs[0].status = true;
      } else if (this.currentTab.page == 0) {
        this.tabs[0].status = false;
      }
    },
    rePage: function() {
      this.currentTab = {
        index: "index",
        page: 0
      };
    },
    // (page) 10. 執行頁面位子的計算
    changePage: function() {
      if (this.pageId > 0) {
        this.tabs[1].status = true;
        this.tabs[0].status = true;
        this.currentTab = {
          index: "page1",
          page: this.pageId
        };
      } else if (this.pageId == 0) {
        this.tabs[0].status = false;
        this.currentTab = {
          index: "index",
          page: this.pageId
        };
      }
    },
    sendPage(e) {
      this.$emit("changePage", e);
    }
  },
  components: {
    index,
    page1,
    page2
  }
};
</script>
