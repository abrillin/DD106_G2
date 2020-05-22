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
                <!-- <a href="#" class="product-details">商品詳情...</a> -->
                <router-link class="product-details" to="/main/shopitem">商品詳情...</router-link>
              </p>
              <div class="item_buy-box">
                <a href="#" class="item_btn">加入購物籃</a>
                <a href="#" class="item_btn buyNow">直接購買</a>
              </div>
              <!-- <div class="details-box">
                <a href="#" class="product-details">商品詳情</a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="search-wrapper">
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
          <div class="hot-words">
            <div class="hot-words_list">
              <a class="hot-words_item" href>週末親子旅遊</a>
              <a class="hot-words_item" href>桃園山區採果</a>
              <a class="hot-words_item" href>富士蘋果</a>
              <a class="hot-words_item" href>愛文芒果</a>
              <a class="hot-words_item" href>大湖草莓</a>
            </div>
          </div>
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
            <div class="checkbox-filter">
              <input type="checkbox" id="24hour" />
              <label class="checkbox_label">24hr宅配到府</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="home" />
              <label class="checkbox_label">宅配到府</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="store" />
              <label class="checkbox_label">超商取貨</label>
            </div>
          </div>
        </form>
        <form class="filter-group">
          <div class="filter-group_header">分類：</div>
          <div class="folding-items">
            <div class="checkbox-filter">
              <input type="checkbox" id="gift_box" />
              <label class="checkbox_label">禮盒</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="promotion" />
              <label class="checkbox_label">促銷商品</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="coming_soon" />
              <label class="checkbox_label">即將放送</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="machining" />
              <label class="checkbox_label">加工產品</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="dried_fruit" />
              <label class="checkbox_label">果乾</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="fresh_fruit" />
              <label class="checkbox_label">新鮮水果</label>
            </div>
            <div class="checkbox-filter">
              <input type="checkbox" id="organic_fruit" />
              <label class="checkbox_label">有機水果</label>
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
                    v-for="(changeitems,index) in changeitem"
                    :key="changeitems"
                    :value="index"
                  >{{changeitems}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="commodity-flex">
            <div class="commodity" v-for="(i, index) in shopcommodityfilter" :key="index">
              <router-link to="/main/shopitem">
                <div class="card_img_box" @click="changePage(i)">
                  <img src="../assets/ia_300000017.jpg" width="100%" height="100%" />
                </div>
              </router-link>
              <div class="card_content">
                <div class="commodity_title">
                  <div class="commodity_title_text">{{i.no}}</div>
                </div>

                <div class="card_tag" v-for="(t,dex) in shopcommodityfilter[index].tags" :key="dex">
                  <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                  <span class="card_tag_text">{{shopcommodityfilter[index].tags[dex].tagname}}</span>
                </div>

                <div class="card_price">
                  <span class="money">{{i.price}}</span>
                </div>

                <div class="buy">
                  <a href="#" class="card_btn" @mouseenter="btnFun">加入購物籃</a>
                  <a href="#" class="card_btn" @mouseenter="btnFun">直接購買</a>
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
          <div class="hot_commodity_items">
            <div class="hot_commodity_text">木瓜乾 零添加</div>
            <span>1</span>
            <div class="hot_commodity_bg"></div>
          </div>
          <div class="hot_commodity_items">
            <div class="hot_commodity_text">木瓜乾 零添加</div>
            <span>2</span>
            <div class="hot_commodity_bg"></div>
          </div>
          <div class="hot_commodity_items">
            <div class="hot_commodity_text">木瓜乾 零添加</div>
            <span>3</span>
            <div class="hot_commodity_bg"></div>
          </div>
          <div class="hot_commodity_items">
            <div class="hot_commodity_text">木瓜乾 零添加</div>
            <span>4</span>
            <div class="hot_commodity_bg"></div>
          </div>
          <div class="hot_commodity_items">
            <div class="hot_commodity_text">木瓜乾 零添加</div>
            <span>5</span>
            <div class="hot_commodity_bg"></div>
          </div>
        </div>
        <div class="hot_commodity_filter-status">
          <div class="hot_commoditystatus_text">明星農民</div>
        </div>
        <div
          class="hotCommoditySeller"
          v-for="(s, index) in seller"
          :key="index"
          @mouseenter="SellerM"
        >
          <a href="#">
            <div class="seller_box">
              <img
                :src="'../assets/shop/' + seller[index].img"
                alt
                height="50"
                width="50"
                style="border-radius: 30px;"
              />
            </div>
          </a>
          <div class="seller_content">
            <div class="seller_content-box">
              <p>{{s.name}}</p>
              <div class="star-box">
                <img src="../assets/icon/star.svg" alt width="14" height="14" />
                <img src="../assets/icon/star.svg" alt width="14" height="14" />
                <img src="../assets/icon/star.svg" alt width="14" height="14" />
                <img src="../assets/icon/star.svg" alt width="14" height="14" />
                <img src="../assets/icon/star.svg" alt width="14" height="14" />
              </div>
            </div>
            <div class="track-btn">＋追蹤</div>
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
          <div class="page-link">{{i}}</div>
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
<script>
import $ from "jquery";
import { gsap, TweenMax, Power1, Power3, TimelineMax, Linear } from "gsap";
export default {
  data() {
    return {
      shopcommodity: [],
      shopcommodityfilter: [],
      pageArr: [],
      currentPage: [],
      seller: [],
      changeitem: ["價錢高到低", "評價高到低", "由新到舊"],
      v: 0
    };
  },

  created() {
    const api = "/api/api_item.php";

    this.$http.post(api).then(res => {
      this.shopcommodity = res.data;

      for (let i = 1; i < 9; i++) {
        this.shopcommodityfilter.push(this.shopcommodity["pro"][i]);
      }

      this.currentPage.push(1);
      for (let i = 1; i < 10; i++) {
        this.pageArr.push(i);
      }

      this.seller = res.data["mem"];
      // console.log(res.data["mem"]);
    });
  },

  updated() {
    for (let i = 0; i <= 8; i++) {
      document
        .getElementsByClassName("page-item")
        [i].setAttribute("class", "page-item");
      if (
        document.getElementsByClassName("page-item")[i].textContent ==
        this.currentPage[0]
      ) {
        document
          .getElementsByClassName("page-item")
          [i].classList.add("currentPagecolor");
      }
    }
    // console.log(document.getElementsByClassName("page-item"));
  },

  methods: {
    SellerM: function() {
      //觸發追蹤商品效果
      $(".hotCommoditySeller").hover(function() {
        var sellermove = $(this);
        TweenMax.to(sellermove, 0.5, {
          x: -25,
          width: "100% + 25px"
        });
        var sellermove2 = $(this).find(".track-btn");
        TweenMax.to(sellermove2, 1, {
          x: 70,
          autoAlpha: 1
        });
      });
      //反觸發追蹤商品效果
      $(".hotCommoditySeller").mouseleave(function() {
        var sellermove = $(this);
        TweenMax.to(sellermove, 0.5, {
          x: 0,
          width: "100%"
        });
        var sellermove2 = $(this).find(".track-btn");
        TweenMax.to(sellermove2, 1, {
          x: 0,
          autoAlpha: 0
        });
      });
    },

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
      //觸發item按鈕效果
      $(".item_btn").hover(function() {
        var ibtn = $(this);
        TweenMax.to(ibtn, 0.3, {
          css: {
            backgroundColor: "#ffa978",
            color: "white"
          }
        });
      });
      //反觸發item按鈕效果
      $(".item_btn").mouseleave(function() {
        var ibtn = $(this);
        TweenMax.to(ibtn, 0.3, {
          css: {
            backgroundColor: "#fbf8ef",
            color: "#007552"
          }
        });
      });
    },

    pageLeft() {
      let currentPage1 = this.currentPage[0];
      // this.currentPage = [];
      this.shopcommodityfilter = [];
      if (this.currentPage > 1) {
        this.currentPage = [];
        this.currentPage.push(currentPage1 - 1);
      }
      let updatePage = this.currentPage[0];

      for (let i = (updatePage - 1) * 8 + 1; i < updatePage * 8 + 1; i++) {
        this.shopcommodityfilter.push(this.shopcommodity.pro[i]);
      }
      console.log(this.shopcommodity);
      if (this.pageArr[0] > 1) {
        this.pageArr.forEach((item, index, array) => {
          this.pageArr[index] = this.pageArr[index] - 1;
        });
      }
    },
    nextPage() {
      let currentPage1 = this.currentPage[0];
      this.shopcommodityfilter = [];
      if (this.currentPage < parseInt(this.shopcommodity.length / 8)) {
        this.currentPage = [];
        this.currentPage.push(currentPage1 + 1);
      }
      let updatePage = this.currentPage[0];

      for (let i = (updatePage - 1) * 8 + 1; i < updatePage * 8 + 1; i++) {
        this.shopcommodityfilter.push(this.shopcommodity.pro[i]);
      }
      if (this.pageArr[8] < parseInt(this.shopcommodity.length / 8)) {
        this.pageArr.forEach((item, index, array) => {
          this.pageArr[index] = this.pageArr[index] + 1;
        });
      }
    },

    pageSelect(e) {
      let pageNum = parseInt(e.target.textContent);
      // console.log(pageNum);
      this.shopcommodityfilter = [];
      this.currentPage = [];
      // console.log(parseInt(this.shopcommodity.length / 9));
      if (
        pageNum > 5 &&
        pageNum < parseInt(this.shopcommodity.length / 8) - 5
      ) {
        this.pageArr = [];
        for (let i = pageNum - 4; i < pageNum + 5; i++) {
          this.pageArr.push(i);
        }
      } else if (pageNum >= parseInt(this.shopcommodity.length / 8) - 5) {
        this.pageArr = [];
        for (
          let i = parseInt(this.shopcommodity.length / 8) - 7;
          i <= parseInt(this.shopcommodity.length / 7);
          i++
        ) {
          this.pageArr.push(i);
        }
      } else {
        this.pageArr = [];
        for (let i = 1; i < 10; i++) {
          this.pageArr.push(i);
        }
      }

      this.currentPage.push(pageNum);
      let currentPage1 = this.currentPage[0];

      for (let i = (currentPage1 - 1) * 8 + 1; i < currentPage1 * 8 + 1; i++) {
        this.shopcommodityfilter.push(this.shopcommodity["pro"][i]);
      }

      for (let i = 1; i < 9; i++) {
        e.target.parentNode.children[i].setAttribute("class", "page-item");
      }
      // console.log(document.getElementsByClassName("pageBorder"));
      e.target.parentNode.children[1].setAttribute("class", "page-item");
      //   document.getElementsByClassName("pageBorder")[0].setAttribute("class","");
    },
    changePage(e) {
      let api = "/api/api_item_no.php";
      console.log(e);
      this.$http
        .post(api, JSON.stringify(e))
        .then(res => {
          if (res.data != "") {
            console.log(JSON.parse(res.data));
          } else {
            console.log(res.error);
          }
        })
        .catch(err => console.log(err));
    },

    itemchange(t) {
      console.log(t);
      const api = "/api/api_item.php";

      this.$http.post(api, JSON.stringify(t)).then(res => {
        // this.shopcommodity = "";
        this.shopcommodity = res.data;

        this.shopcommodityfilter = [];

        for (let i = 1; i < 9; i++) {
          this.shopcommodityfilter.push(this.shopcommodity["pro"][i]);
        }
      });
    }
  },

  mounted() {
    function showHideHam() {
      let filterPanel = document.getElementById("filterPanel");
      filterPanel.classList.toggle("hidden");
    }
    document.getElementById("btnHamburger").onclick = showHideHam;
    document.getElementById("btnHamburgerclass").onclick = showHideHam;
    $(".hot_commodity_items").hover(function() {
      var tl = $(this);
      TweenMax.to(tl, 0.5, {
        x: -25,
        width: "100% + 25px"
      });
      var tl2 = $(this).children(".hot_commodity_bg");
      TweenMax.to(tl2, 0.5, {
        autoAlpha: 0.5
      });
      var tl3 = $(this).children(".hot_commodity_text");
      TweenMax.to(tl3, 0.5, {
        autoAlpha: 1
      });
    });
    //返回明星商品原處
    $(".hot_commodity_items").mouseleave(function() {
      var tl = $(this);
      TweenMax.to(tl, 0.5, {
        x: 0,
        width: "100%"
      });
      var tl2 = $(this).children(".hot_commodity_bg");
      TweenMax.to(tl2, 0.5, {
        autoAlpha: 1
      });
      var tl3 = $(this).children(".hot_commodity_text");
      TweenMax.to(tl3, 0.5, {
        autoAlpha: 0
      });
    });

    //反觸發itembuynow按鈕效果
    $(".buyNow").mouseleave(function() {
      var buybtn = $(this);
      TweenMax.to(buybtn, 0.3, {
        css: {
          backgroundColor: "#ffa978",
          color: "#404040"
        }
      });
    });

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
