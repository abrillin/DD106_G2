<template>
  <main class="wrapper">
    <div class="market_header">
      <div class="market_title"></div>
    </div>
    <section class="show_item">
      <div class="show_item-content">
        <div class="shop-imgbox">
          <img src="../assets/shop/market_showImg_behind.svg" alt class="box-bottom" />
          <img src="../assets/shop/market_product.svg" alt class="shopItemImg" />
          <img src="../assets/shop/market_showImg_front.svg" alt class="box-top" />
        </div>
        <div class="show_item-text">
          <div class="show_item-content-box">
            <div class="item-title">
              <span>愛文芒果2.5公斤/箱</span>
            </div>
            <div class="item-money">
              <p>NT $1890</p>
            </div>
            <div class="item-content-box">
              <div class="item-card_tag">
                <img
                  src="../assets/icon/tag.svg"
                  alt
                  width="16px"
                  height="16px"
                  class="item-tag_icon"
                />
                <span class="item-card_tag_text">24hr宅配到府</span>

                <img
                  src="../assets/icon/tag.svg"
                  alt
                  width="16px"
                  height="16px"
                  class="item-tag_icon"
                />
                <span class="item-card_tag_text">芒果</span>
              </div>
              <p class="item-content-text">
                2020年頂級愛文芒果 愛文マンゴー(アップルマンゴー)
                嚴選台灣出產高甜度愛文芒果，為夏季芒果推薦 “TOP 1”
                因果皮紅潤且果肉金黃，又有“太陽果”之稱。
                <br />
                <!-- <router-link class="product-details" to="/main/shopitem">商品詳情...</router-link> -->
              </p>
              <!-- <div class="item_buy-box">
                <a href="#" class="item_btn" @mouseenter="btnFun">加入購物籃</a>
                <a href="#" class="item_btn buyNow">直接購買</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="search-wrapper">
      <nav id="nav_bg"></nav>
      <img src="../assets/search_logo_img.svg" width="170px" height="100px" class="search_logo" />
      <div class="search-section">
        <div class="searchbar">
          <div class="searchbar_main">
            <form role="search" class="searchbar-input" autocomplete="off">
              <input
                class="searchbar-input_input"
                maxlength="128"
                placeholder="商品搜尋..."
                autocomplete="off"
              />
            </form>
            <button type="button" class="search_btn">
              <img
                src="../assets/icon/search_icon.svg"
                class="search_icon"
                width="20px"
                height="20px"
              />
            </button>
          </div>
          <!-- <div class="hot-words">
            <div class="hot-words_list">
              <a class="hot-words_item" href>週末親子旅遊</a>
              <a class="hot-words_item" href>桃園山區採果</a>
              <a class="hot-words_item" href>富士蘋果</a>
              <a class="hot-words_item" href>愛文芒果</a>
              <a class="hot-words_item" href>大湖草莓</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>

    <div class="blog_line_box"></div>

    <section class="shop_main">
      <aside class="filter-panel hidden" id="filterPanel">
        <img src="../assets/market_choose_right_mountain_only.svg" class="mountain" />
        <div class="filter-status">
          <div class="filter-status_text">條件篩選</div>
          <button id="btnHamburgerclass">
            <img src="../assets/icon/filterHidden.svg" width="45" />
          </button>
        </div>
        <form class="filter-group">
          <div class="filter-group_header">運送方式：</div>
          <div class="folding-items">
            <div
              class="checkbox-filter"
              v-for="(checkboxitems, index) in checkbox"
              :key="checkboxitems"
            >
              <input
                :id="'checkinput' + index"
                type="radio"
                v-model="c"
                @click="checkchange(index)"
                :value="index"
              />
              <label class="checkbox_label">{{ checkboxitems }}</label>
            </div>
          </div>
        </form>
        <form class="filter-group">
          <div class="filter-group_header">分類：</div>
          <div class="folding-items">
            <div
              class="checkbox-filter"
              v-for="(classifications, index) in classification"
              :key="classifications"
            >
              <input
                :id="'classificationsinput'+ index"
                type="checkbox"
                v-model="cc"
                :value="index"
                name="input"
              />
              <label class="checkbox_label">{{classifications}}</label>
            </div>
          </div>
        </form>
      </aside>

      <div class="shop_container">
        <div class="search-item-result_items">
          <div class="dropdown-box-flex">
            <div class="dropdown-box">
              <button id="btnHamburger">
                <img src="../assets/icon/filterHidden.svg" width="45" />
              </button>
              <label class="dropdown" for="states">最新商品</label>
              <div class="button dropdown-content">
                <select id="colorselector" class="select-reset" v-model="v" @change="itemchange(v)">
                  <option
                    v-for="(changeitems, index) in changeitem"
                    :key="changeitems"
                    :value="index"
                  >{{ changeitems }}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="commodity-flex">
            <div class="commodity" v-for="(i, index) in shopcommodityfilter" :key="index">
              <router-link to="/main/shopitem">
                <div class="card_img_box" @click="changePage(i)">
                  <img
                    :src="'/api/' + shopcommodityfilter[index].img.split(',')[0]"
                    width="100%"
                    height="100%"
                  />
                  <!-- <img :src="img" width="100%" height="100%" /> -->
                </div>
              </router-link>
              <div class="card_content">
                <div class="commodity_title">
                  <div class="commodity_title_text">{{ i.iname }}</div>
                </div>

                <div
                  class="card_tag"
                  v-for="(t, dex) in shopcommodityfilter[index].tags"
                  :key="dex"
                >
                  <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                  <span class="card_tag_text">
                    {{
                    shopcommodityfilter[index].tags[dex].name
                    }}
                  </span>
                </div>

                <div class="card_price">
                  <span class="money">{{ i.price }}</span>
                </div>

                <div class="buy">
                  <a
                    href="javascript:"
                    class="card_btn"
                    @click="addCart(i.no)"
                    @mouseenter="btnFun"
                  >加入購物籃</a>
                  <a
                    href="javascript:"
                    class="card_btn"
                    @mouseenter="btnFun"
                    @click="addCart(i.no, 't')"
                  >直接購買</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <aside class="hot_commodity">
        <div class="hot_commodity_filter-status">
          <div class="hot_commoditystatus_text">
            <img src="../assets/market_choose_right_mountain_only.svg" class="mountain" />
            明星商品
          </div>
        </div>
        <div class="hot_commodity_group">
          <div
            class="hot_commodity_items"
            v-for="(h, index) in shopcommodity.top"
            :key="index"
            @mouseenter="HotCommodityItemsEnter"
            @mouseleave="HotCommodityItemsLeave"
          >
            <router-link to="/main/shopitem">
              <div class="hot_commodity_text">{{ h.iname }}</div>
            </router-link>
            <span>{{ index + 1 }}</span>
            <img class="hot_commodity_bg" :src="'/api/' + shopcommodity.pro[0].img.split(',')[0]" />
          </div>
        </div>
        <div class="hot_commodity_filter-status">
          <div class="hot_commoditystatus_text">明星農民</div>
        </div>
        <div
          class="hotCommoditySeller"
          v-for="(s, index) in seller"
          :key="index"
          @mouseenter="SellerMouseEnter"
          @mouseleave="SellerMouseLeave"
        >
          <router-link to="#">
            <div class="seller_box">
              <img :src="seller[index].img" alt height="50" width="50" style="border-radius: 30px;" />
            </div>
          </router-link>
          <div class="seller_content">
            <div class="seller_content-box">
              <p>{{ s.name }}</p>
              <div class="star-box">
                <img
                  src="../assets/icon/star.svg"
                  alt
                  width="14"
                  height="14"
                  v-if="seller[index].review_average >= 1"
                />
                <img src="../assets/icon/star2.svg" alt width="14" height="14" v-else />
                <img
                  src="../assets/icon/star.svg"
                  alt
                  width="14"
                  height="14"
                  v-if="seller[index].review_average >= 2"
                />
                <img src="../assets/icon/star2.svg" alt width="14" height="14" v-else />
                <img
                  src="../assets/icon/star.svg"
                  alt
                  width="14"
                  height="14"
                  v-if="seller[index].review_average >= 3"
                />
                <img src="../assets/icon/star2.svg" alt width="14" height="14" v-else />
                <img
                  src="../assets/icon/star.svg"
                  alt
                  width="14"
                  height="14"
                  v-if="seller[index].review_average >= 4"
                />
                <img src="../assets/icon/star2.svg" alt width="14" height="14" v-else />
                <img
                  src="../assets/icon/star.svg"
                  alt
                  width="14"
                  height="14"
                  v-if="seller[index].review_average >= 5"
                />
                <img src="../assets/icon/star2.svg" alt width="14" height="14" v-else />
              </div>
            </div>
            <!-- <div class="track-btn">＋追蹤</div> -->
          </div>
        </div>
      </aside>
    </section>

    <nav class="Page_navigation">
      <ul class="pagination justify-content-center">
        <li @click="pageLeft">
          <div class="page-link pageLeft">
            <img src="../assets/prouduct_button_left.svg" alt height="40" width="30" />
          </div>
        </li>

        <li
          class="page-item"
          v-for="(i, index) in pageArr"
          :key="index"
          v-on="{ click: pageSelect }"
        >
          <div class="page-link">{{ i + 1 }}</div>
        </li>

        <li class="page-right" @click="nextPage">
          <div class="page-link">
            <img src="../assets/product_button_right.svg" alt height="40" width="30" />
          </div>
        </li>
      </ul>
    </nav>

    <div class="footer-box">
      <Footer />
    </div>
  </main>
</template>
<style lang="scss" scoped>
.navbg {
  position: fixed;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  box-sizing: border-box;
  padding: 0px 1%;
  top: 0px;
  transition: all 0.5s;
  height: 60px;
  width: 100%;
  z-index: 998;
  background-color: rgba(251, 248, 239, 0.89);
  transition: ease 0.3s;
}
</style>

<script>
import $ from "jquery";
import { gsap, TweenMax, Power1, Power3, TimelineMax, Linear } from "gsap";
const SHOP_PAGE_ITEMS = 8;
const SHOP_INDICATOR_SIZE = 5;

export default {
  data() {
    return {
      shopcommodity: [],
      shopcommodityfilter: [],
      pageArr: [],
      currentPage: 0,
      totalPages: 1,
      totalItems: 0,
      seller: [],
      changeitem: ["由新到舊", "評價高到低", "價錢高到低"],
      checkbox: ["24hr宅配到府", "宅配到府", "超商取貨"],
      classification: [
        "禮盒",
        "促銷商品",
        "即將放送",
        "加工產品",
        "果乾",
        "新鮮水果",
        "有機水果"
      ],
      v: 0,
      c: 0,
      cc: [],
      checkfilter: []
    };
  },

  created() {
    const api = this.path + "api_item.php";

    this.$http.post(api).then(res => {
      this.shopcommodity = res.data;
      this.currentPage = 0;
      this.totalItems = this.shopcommodity.pro.length;
      this.totalPages = Math.ceil(
        this.shopcommodity.pro.length / SHOP_PAGE_ITEMS
      );

      this.updatePageItems();
      this.updatePageIndicator();

      this.seller = res.data["mem"];
    });
  },

  updated() {
    // console.log(this.shopcommodityfilter[0].img.split(",")[0]);
    // console.log(this.shopcommodity);
    // for (let i = 0; i < SHOP_INDICATOR_SIZE; i++) {
    //   document
    //     .getElementsByClassName("page-item")
    //     [i].setAttribute("class", "page-item");
    //   if (
    //     document.getElementsByClassName("page-item")[i].textContent ==
    //     this.currentPage + 1
    //   ) {
    //     document
    //       .getElementsByClassName("page-item")
    //       [i].classList.add("currentPagecolor");
    //   }
    // }
  },

  methods: {
    SellerMouseEnter: function(event) {
      //觸發追蹤商品效果
      var sellermove = $(event.target);
      TweenMax.to(sellermove, 0.5, {
        x: -25,
        width: "100% + 25px"
      });
    },
    SellerMouseLeave: function(event) {
      //反觸發追蹤商品效果
      var sellermove = $(event.target);
      TweenMax.to(sellermove, 0.5, {
        x: 0,
        width: "100%"
      });
    },
    HotCommodityItemsEnter: function(event) {
      var Commoditymove = $(event.target);
      TweenMax.to(Commoditymove, 0.5, {
        x: -25,
        width: "100% + 25px"
      });
      var Commoditymove2 = $(event.target).children(".hot_commodity_bg");
      TweenMax.to(Commoditymove2, 0.5, {
        autoAlpha: 0.5
      });
      var Commoditymove3 = $(event.target).find(".hot_commodity_text");
      TweenMax.to(Commoditymove3, 0.5, {
        autoAlpha: 1
      });
    },
    HotCommodityItemsLeave: function(event) {
      var Commoditymove = $(event.target);
      TweenMax.to(Commoditymove, 0.5, {
        x: 0,
        width: "100%"
      });
      var Commoditymove2 = $(event.target).children(".hot_commodity_bg");
      TweenMax.to(Commoditymove2, 0.5, {
        autoAlpha: 1
      });
      var Commoditymove3 = $(event.target).find(".hot_commodity_text");
      TweenMax.to(Commoditymove3, 0.5, {
        autoAlpha: 0
      });
    },
    //------購買按鈕加入購物車按鈕特效------
    btnFun: function() {
      //觸發按鈕效果
      $(".card_btn").hover(function() {
        var cbtn = $(this);
        TweenMax.to(cbtn, 0.3, {
          css: {
            backgroundColor: "#ffa978",
            color: "white"
          }
        });
      });
      //反觸發按鈕效果
      $(".card_btn").mouseleave(function() {
        var cbtn = $(this);
        TweenMax.to(cbtn, 0.3, {
          css: {
            backgroundColor: "#fbf8ef",
            color: "#007552"
          }
        });
      });
    },
    //------購買按鈕加入購物車按鈕特效結束------
    //------頁面切換上一頁------
    pageLeft() {
      if (this.currentPage > 0) {
        this.currentPage -= 1;
        this.updatePageItems();
        this.updatePageIndicator();
      }
    },
    //------頁面切換上一頁結束------
    //------頁面切換下一頁------
    nextPage() {
      if (this.currentPage < this.totalPages - 1) {
        this.currentPage += 1;
        this.updatePageItems();
        this.updatePageIndicator();
      }
    },
    //------頁面切換下一頁結束------
    pageSelect(e) {
      const pageNum = parseInt(e.target.textContent, 10) - 1;
      this.currentPage = pageNum;
      this.updatePageItems();
      this.updatePageIndicator();
    },
    updatePageItems() {
      this.shopcommodityfilter = [];
      const firstItem = this.currentPage * SHOP_PAGE_ITEMS;
      const lastItem = Math.min(firstItem + 8, this.totalItems);

      // console.log(firstItem);
      // console.log(lastItem);

      for (let i = firstItem; i < lastItem; i++) {
        this.shopcommodityfilter.push(this.shopcommodity.pro[i]);
      }
    },
    updatePageIndicator() {
      let firstItem = 0;
      let lastItem = SHOP_INDICATOR_SIZE;
      const SCROLL_OFFSET = Math.ceil(SHOP_INDICATOR_SIZE / 2);
      if (this.totalPages < SHOP_INDICATOR_SIZE) {
        lastItem = this.totalPages;
      } else if (this.currentPage >= SCROLL_OFFSET) {
        firstItem = this.currentPage - SCROLL_OFFSET + 1;
        lastItem = firstItem + SHOP_INDICATOR_SIZE;
      }

      if (lastItem > this.totalPages) {
        firstItem = this.totalPages - SHOP_INDICATOR_SIZE;
        lastItem = this.totalPages;
      }

      this.pageArr = [];
      for (let i = firstItem; i < lastItem; i++) {
        this.pageArr.push(i);
      }
    },
    changePage(e) {
      let api = this.path + "api_item_no.php";
      this.$http.post(api, JSON.stringify(e)).then(res => {
        if (res.data != "") {
          // console.log(JSON.parse(res.data));
        } else {
          // console.log(res.error);
        }
      });
    },
    itemchange(t) {
      const api = this.path + "api_item.php";

      this.$http.post(api, JSON.stringify(t)).then(res => {
        this.shopcommodity = res.data;
        this.shopcommodityfilter = [];
        for (let i = 1; i < 9; i++) {
          this.shopcommodityfilter.push(this.shopcommodity["pro"][i]);
        }
      });
    },
    checkchange(k) {
      const api = this.path + "api_itemcheckbox.php";
      this.$http.post(api, JSON.stringify(k)).then(res => {
        // this.shopcommodity = "";
        this.shopcommodity = res.data;
        this.shopcommodityfilter = [];
        for (let i = 0; i < this.shopcommodity["pro"].length; i++) {
          this.shopcommodityfilter.push(this.shopcommodity["pro"][i]);

          if (i == 7) {
            return;
          }
        }
      });
    },
    addCart(no, page = "f") {
      const api = this.path + "api_memberStatus.php";

      this.$http.post(api).then(res => {
        const data = res.data;

        // 檢查有沒有登入
        if (data == "") {
          alert("請先登入果粉！");
          this.$router.push({ name: "LoginMember" });
        } else {
          // 宣告 localStorage 物件
          let storage = localStorage;

          // 檢查 localStorage 有沒有 itemNo 欄位，如果沒有就新增
          if (storage["itemNo"] == null) {
            storage["itemNo"] = "";
          }

          // 獲取 itemNo 欄位的資料，以 , 符號切成陣列
          const itmeArr = storage["itemNo"].split(",");

          function change(e) {
            if (page == "t") {
              e.push("/main/member/shopping");
            }
          }

          // 如果編號 no 的商品沒有在 itemArr 這個陣列裡面，則新增進去
          if (itmeArr.indexOf(no) != -1) {
            alert("已經加入購物車了！");
            change(this.$router);
          } else {
            storage["itemNo"] += no + ",";
            this.$emit("setCart", storage["itemNo"]);
            change(this.$router);
          }
        }
      });
    }
  },
  mounted() {
    // 如果高度< search-wrapper，navbg就不顯示，> search-wrapper時顯示
    $(function() {
      $(window).scroll(function() {
        var scrollVal = $(this).scrollTop();
        if (scrollVal > 580) {
          /* 如果滾動的物件捲動 > 500 則觸發指定的動作。*/
          $("#nav_bg").addClass("navbg");
        } else {
          $("#nav_bg").removeClass("navbg");
        }
      });
    });

    //------側邊欄開關------
    function showHideHam() {
      let filterPanel = document.getElementById("filterPanel");
      filterPanel.classList.toggle("hidden");
    }
    document.getElementById("btnHamburger").onclick = showHideHam;
    document.getElementById("btnHamburgerclass").onclick = showHideHam;
    //------側邊欄開關結束------

    //商品效果
    $(".box-top").hover(function() {
      TweenMax.to(".shopItemImg", 0.5, {
        y: -30
      });
    });
    //反觸發商品效果
    $(".box-top").mouseleave(function() {
      TweenMax.to(".shopItemImg", 0.5, {
        y: 0
      });
    });
  }
};
</script>
