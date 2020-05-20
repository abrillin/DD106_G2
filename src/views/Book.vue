<template>
  <div class="book_main">
    <section id="Page_horizen">
      <div id="outter">
        <!-- 左page -->
        <div id="book_left">
          <div class="bk_left">
            <div class="bk_left_img">
              <img src="@/assets/book_img/bookRighPage_img1t.svg" />
            </div>
            <div class="bk_right_img" id="move_img">
              <img src="@/assets/book_img/bookRightPage_img2.svg" />
            </div>
          </div>
        </div>
        <!-- 右page -->
        <div class="book_middle"></div>
        <div id="book_right">
          <div class="bookContain">
            <div class="bkbk_content">
              <!-- 標籤 -->
              <div class="book_tag">
                <div class="index">
                  <p class="book_link" @click="changeType(5)">總目錄</p>
                </div>
                <ul class="tag">
                  <!-- 1. 點選季節標籤，發送來自 item(tabs) 的 type 值給 changeType() -->
                  <li
                    v-for="(item, index) in tabs"
                    :id="index"
                    :key="item.id"
                    @click="changeType(item.type)"
                    class="book_link"
                  >{{ item.name }}</li>
                </ul>
              </div>
              <!-- book本體 -->
              <div class="Book">
                <!-- 左切換按鈕 -->
                <div class="page_decoration">
                  <div class="pagepaper"></div>
                  <div class="pagepaper"></div>
                  <div class="pagepaper"></div>
                </div>
                <!-- bookcontent書籍內容 -->
                <!-- 4. 傳 data 的 type 值給 class 屬性去動態切換 class -->
                <div id="bk_content" :class="type">
                  <!-- 4. 偵測到 data 的更新，傳 change 值給 v-if 判斷要顯示哪一個元件 -->
                  <!-- 4. 傳 data 的 index 值給子元件(BookContent.vue)的自定義名稱 -> contentIndex -->
                  <!-- (page) 7. 偵測到 page 的更新，傳 page 值給子元件(BookContent.vue)的自定義名稱 -> pageId -->
                  <Content
                    v-if="change == false"
                    :contentIndex="index"
                    :pageId="page"
                    @addType="addIndex"
                    @changePage="changePage"
                  ></Content>
                  <!-- (page) 3. 接收子層 changePage 事件值給 changePage 方法  -->
                  <Index v-if="change == true" @changePage="changePage"></Index>
                  <!-- fruit_knowledge -->
                </div>
                <!-- 右切換按鈕 -->
                <div class="page_decoration">
                  <div class="pagepaper"></div>
                  <div class="pagepaper"></div>
                  <div class="pagepaper"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style></style>
<script>
import "@/js/book";
import Index from "@/views/BookIndex";
import Content from "@/views/BookContent";
export default {
  data() {
    return {
      tabs: [
        {
          name: "春季",
          type: 0
        },
        {
          name: "夏季",
          type: 1
        },
        {
          name: "秋季",
          type: 2
        },
        {
          name: "冬季",
          type: 3
        },
        {
          name: "常年",
          type: 4
        }
      ],
      i: 0,
      top: 0,
      // 3. 接收到 changeType() 的更新
      type: "spring",
      index: 0,
      change: true,
      // (page) 6. 接收到 page 的更新
      page: 0
    };
  },
  created() {
    const api = "/api/api_bookType.php";

    this.$http.post(api).then(res => {
      console.log(res.data);
    });
  },
  mounted() {
    // window.addEventListener("scroll", this.imgMoveToRight, true);
  },
  methods: {
    imgMoveToRight() {
      const el = document.getElementById("Page_horizen").scrollTop;

      if (el > this.top) {
        this.top = el;
        this.i++;
        document.getElementById("move_img").style = `left:${this.i}%;`;
      } else if (el < this.top) {
        this.top = el;
        this.i--;
        document.getElementById("move_img").style = `left:${this.i}%;`;
      }
    },
    // 2. t 接收到 type 值，並更新 this(data) 的 type、index、change 值
    // (page) 6. 接收到 p.type 的值，並更新 this(data) 的 type、index、change 值
    changeType: function(t) {
      if (t == 0) {
        this.type = "spring";
        this.index = 0;
        this.change = false;
        this.page = 0;
      } else if (t == 1) {
        this.type = "summer";
        this.index = 1;
        this.change = false;
        this.page = 0;
      } else if (t == 2) {
        this.type = "fall";
        this.index = 2;
        this.change = false;
        this.page = 0;
      } else if (t == 3) {
        this.type = "winter";
        this.index = 3;
        this.change = false;
        this.page = 0;
      } else if (t == 4) {
        this.type = "year";
        this.index = 4;
        this.change = false;
        this.page = 0;
      } else if (t == 5) {
        this.type = "index";
        this.change = true;
        this.page = 0;
      }
    },
    // (page) 4. 用 p 接收值 (p = {type: type, id: id})
    changePage: function(p) {
      // (page) 5. 傳遞 p.type 的值給 changeType()
      this.changeType(p.type);
      // (page) 5. 傳遞 p.id 的值給 page
      this.page = p.id;
    },
    addIndex: function(n) {
      this.changeType(this.index + n);
    }
  },
  components: {
    Content,
    Index
  }
};
</script>
