
<template>
  <main class="wrapper ItemWrapper">
    <div class="market_header" style="background-color: #fbf8ef;">
      <div class="market_title"></div>
    </div>

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

    <section class="CommodityWrapper">
      <div class="CommodityContent">
        <div class="CommodityContentImgBox">
          <div class="CommodityContentImgMain">
            <img src="../assets/shop/ia_300000013.jpg" alt class="CommodityContentImg" />
          </div>
          <div class="CommodityContentImgChangeBox">
            <img src="../assets/ia_300000017.jpg" alt class="CommodityContentChangeImg" />
            <img src="../assets/ia_300000011.jpg" alt class="CommodityContentChangeImg" />
          </div>
        </div>
        <div class="CommodityContenText">
          <div class="CommodityContenTextBox">
            <div class="CommodityTitle">
              <h1>{{this.shopitem[0].iname}}</h1>
            </div>

            <div class="CommodityNarrative">
              <p>無添加ドライフルーツ．パパイヤ</p>
              <p>特選台南大內產木瓜，低溫乾燥且完全無添加</p>
              <p>果肉柔滑、香氣濃郁，像是吃到一杯木瓜牛奶</p>
            </div>

            <div class="CommodityInformation">
              產地：
              <span>台灣南部</span>
            </div>

            <div class="CommodityInformation">
              常溫保存：
              <span>6個月</span>
            </div>

            <div class="CommodityInformation">
              容量：
              <span>30公克</span>
            </div>

            <div class="CommodityInformation">
              成份：
              <span>新鮮木瓜</span>
            </div>

            <div class="CommodityFocus">
              <p>第55屆金馬獎指定貴賓禮品</p>
              <p>榮獲A.A「亞太無添加美食」評鑑最高榮譽三星獎</p>
              <p>旅遊觀光局頒發台南好物標章</p>
              <p>國際幾呎熱賣免稅商品</p>
            </div>

            <div class="CommodityItemMoneyBox">
              <span class="CommodityItemMoney">{{this.shopitem[0].price}}</span>
            </div>

            <div class="CommodityItemBuyBox">
              <a
                href="javascript:"
                class="CommodityItemBuyBtn card_btn"
                @mouseenter="btnFun"
                @click="addCart(shopitem[0].no)"
              >加入購物籃</a>
              <a
                href="javascript:"
                class="CommodityItemBuyBtn Buynow"
                @click="addCart(shopitem[0].no, 't')"
              >直接購買</a>
            </div>

            <div class="CommodityDetailsBox">
              <h2 class="CommodityDetailsTitle">商品詳情：</h2>
              <p>{{this.shopitem[0].description}}</p>
            </div>

            <div class="CommodityDetailsBox">
              <h2 class="CommodityDetailsTitle">商品敘述：</h2>
              <div class="CommodityDetailsTextBox">{{this.shopitem[0].infor}}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="SellerInformationBox">
        <div class="SellerInformation">
          <img :src="shopitem[0].img" alt height="60px" width="60px" style="border-radius: 100%;" />
          <p>{{this.shopitem[0].name}}</p>
          <!--  <div class="TrackBtn">＋追蹤</div> -->
        </div>
        <div class="SellerReviewsBox">
          <div class="SellerReviews">
            <div class="Reviews">{{this.shopitem[0].average}}</div>
            <div class="StarBox">
              <img
                src="../assets/icon/star.svg"
                alt
                width="20"
                height="20"
                v-if="shopitem[0].average >= 1"
              />
              <img src="../assets/icon/star2.svg" alt width="20" height="20" v-else />
              <img
                src="../assets/icon/star.svg"
                alt
                width="20"
                height="20"
                v-if="shopitem[0].average >= 2"
              />
              <img src="../assets/icon/star2.svg" alt width="20" height="20" v-else />
              <img
                src="../assets/icon/star.svg"
                alt
                width="20"
                height="20"
                v-if="shopitem[0].average >= 3"
              />
              <img src="../assets/icon/star2.svg" alt width="20" height="20" v-else />
              <img
                src="../assets/icon/star.svg"
                alt
                width="20"
                height="20"
                v-if="shopitem[0].average >= 4"
              />
              <img src="../assets/icon/star2.svg" alt width="20" height="20" v-else />
              <img
                src="../assets/icon/star.svg"
                alt
                width="20"
                height="20"
                v-if="shopitem[0].average >= 5"
              />
              <img src="../assets/icon/star2.svg" alt width="20" height="20" v-else />
            </div>
          </div>
        </div>
        <div class="SellerInformationTextBox">
          <p>{{this.shopitem[0].content}}</p>
        </div>
      </div>
    </section>

    <!--輪播-->
    <div id="carouselWrap">
      <h2>推薦商品：</h2>
      <ul id="CommodityCarouselList">
        <li
          class="CommodityCarouselConten"
          v-for="(i, index) in Commoditycontent.items"
          :key="index"
        >
          <div class="CommodityCarousel commodity">
            <router-link to="/main/shopitem">
              <div class="card_img_box" @click="gotop">
                <img
                  :src="`/api/` + Commoditycontent.items[index].img.split(',')[0]"
                  width="100%"
                  height="100%"
                />
              </div>
            </router-link>
            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">{{i.iname}}</div>
              </div>

              <!-- <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">{{i.tag_no}}</span>
              </div> -->
              <!--  <div class="card_tag" v-for="(t, dex) in shopseller[index].tags" :key="dex">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">
                  {{
                  shopseller[index].tags[dex].name
                  }}
                </span>
              </div>-->

              <div class="card_price">
                <span class="money">{{i.price}}</span>
              </div>

              <div class="buy">
                <a
                  href="javascript:"
                  class="card_btn"
                  @mouseenter="btnFun"
                  @click="addCart(i.no)"
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
        </li>
      </ul>
      <!--左右按鍵-->
      <input
        type="button"
        id="arrowleft"
        value="<"
        style="font-weight:bold;font-size:20px"
        disabled
      />
      <input type="button" id="arrowright" value=">" style="font-weight:bold;font-size:20px" />
    </div>

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
  background-color: rgba(251, 248, 239, 0.925);
  transition: ease 0.3s;
}
</style>

<script>
let panelView = -1127;
let maxIndex = 1;
window.addEventListener("resize", function() {
  if (window.innerWidth >= 1200) {
    panelView = -1127;
    maxIndex = 1;
  } else if (window.innerWidth > 991) {
    panelView = -840;
    maxIndex = 2;
  } else if (window.innerWidth > 767) {
    panelView = -503;
    maxIndex = 5;
  } else {
    panelView = -528;
    maxIndex = 5;
  }
});

import $ from "jquery";
import { gsap, TweenMax, Power1, Power3, TimelineMax, Linear } from "gsap";
export default {
  data() {
    return {
      Commoditycontent: [],
      shopitem: "null"
    };
  },
  mounted() {
    // 如果高度<search-wrapper，navbg就不顯示，>search-wrapper時顯示
    $(function() {
      $(window).scroll(function() {
        var scrollVal = $(this).scrollTop();
        if (scrollVal > 100) {
          /* 如果滾動的物件捲動 > 500 則觸發指定的動作。*/
          $("#nav_bg").addClass("navbg");
        } else {
          $("#nav_bg").removeClass("navbg");
        }
      });
    });

    function $id(id) {
      return document.getElementById(id);
    }
    let wrap = document.getElementById("CommodityCarouselList");
    var curIndex = 0;
    $id("arrowleft").onclick = function() {
      curIndex--;
      wrap.style.left = panelView * curIndex + "px";
      $id("arrowright").disabled = false;
      if (curIndex == 0) {
        $id("arrowleft").disabled = true;
      }
    };

    $id("arrowright").onclick = function() {
      curIndex++;
      wrap.style.left = panelView * curIndex + "px";
      $id("arrowleft").disabled = false;
      if (curIndex == maxIndex) {
        $id("arrowright").disabled = true;
      }
    };

    //資料庫連結
    const api = this.path + "api_shopseller.php";

    this.$http.post(api).then(res => {
      this.Commoditycontent = res.data["mem"];

      if (res.data != "") {
        this.shopitem = res.data["itemContent"];
      } else {
      }
    });
  },

  //資料庫連結

  methods: {
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
    gotop: function() {
      $(window).scrollTop(0);
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
  }
};
</script>

<!--當前頁面未解決問題-->
<!--點選輪播圖router不會換頁-->
<!--輪播圖標籤尚未從後台撈出-->
<!--商品大圖未能切換-->
<!--加入購物籃尚未連結-->