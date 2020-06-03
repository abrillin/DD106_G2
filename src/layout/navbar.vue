<template>
  <nav id="nav">
    <router-link id="home" to="/main">
      <img
        class="logo"
        src="@/assets/headerLOGO.svg"
        alt="logo"
        @click="logoclick"
      />
    </router-link>
    <div class="member_status">
      <!-- 檢查登入的狀態 -->
      <router-link
        class="login_logout"
        to="/loginMember"
        v-if="status == false && session != true"
        >登入/註冊</router-link
      >
      <div v-else>
        <router-link class="member_link" to="/main/member/information">
          <span
            class="member_pic"
            :style="'background-image: url(' + img + ')'"
          ></span>
          <span id="user_name">{{ userName }}</span>
        </router-link>
        <button class="logout" @click="logout">登出</button>
      </div>
    </div>
    <div class="cart" @click="loginclick">
      <router-link class="pages" to="/main/member/shopping">
        <span class="cart-amount">{{ str }}</span>
      </router-link>
    </div>
    <div class="hamburger hamburger--elastic" @click="hamclick">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
    <div class="nav_back">
      <ul>
        <li class="dropdown">
          <div class="title" @click="pageclick">
            <router-link class="page" to="/main/book/bookIndex">
              <div class="title_pic">
                <img src="@/assets/knowledge.svg" alt />
              </div>
              <div class="title_text">
                <h1 class="title_text_h1">知識百科</h1>
                <br />
                <p style="margin-top:10px;">台灣產季水果介紹，</p>
                <p>在地小農知識心得分享，</p>
                <p>盡在知識百科。</p>
              </div>
            </router-link>
          </div>
        </li>
        <li class="dropdown">
          <div class="title" @click="pageclick">
            <router-link class="page" to="/main/shop">
              <div class="title_pic">
                <img src="@/assets/market.svg" alt />
              </div>
              <div class="title_text">
                <h1 class="title_text_h1">水果市集</h1>
                <br />
                <p style="margin-top:10px;">台灣產季水果介紹，</p>
                <p>在地小農知識心得分享，</p>
                <p>盡在知識百科。</p>
              </div>
            </router-link>
          </div>
        </li>
        <li class="dropdown">
          <div class="title" @click="pageclick">
            <router-link class="page" to="/main/blog">
              <div class="title_pic">
                <img src="@/assets/blog.svg" alt />
              </div>
              <div class="title_text">
                <h1 class="title_text_h1">果農日誌</h1>
                <br />
                <p style="margin-top:10px;">台灣產季水果介紹，</p>
                <p>在地小農知識心得分享，</p>
                <p>盡在知識百科。</p>
              </div>
            </router-link>
          </div>
        </li>
        <li class="dropdown">
          <div class="title" @click="pageclick">
            <router-link class="page" to="/main/member/information">
              <div class="title_pic">
                <img src="@/assets/membercenter.svg" alt />
              </div>
              <div class="title_text">
                <h1 class="title_text_h1">會員中心</h1>
                <br />
                <p style="margin-top:10px;">台灣產季水果介紹，</p>
                <p>在地小農知識心得分享，</p>
                <p>盡在知識百科。</p>
              </div>
            </router-link>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
import $ from "jquery";
export default {
  // 5. 接收父層的 memberStatus 的值
  props: { memberStatus: Boolean, memberImg: String, cartItem: String },
  data() {
    return {
      status: false,
      userName: "",
      img: "",
      str: undefined,
    };
  },
  created() {
    const api = this.path + "api_memberStatus.php";

    this.$http.post(api).then((res) => {
      const data = res.data;

      // 如果 session 的資料存在（代表有登入），則切換 navbar 果粉狀態
      if (data != "") {
        this.status = true;
        this.userName = data.name;

        let storage = localStorage;
        if (storage["itemNo"]) {
          let itemArr = storage["itemNo"];

          itemArr = itemArr.split(",");
          this.str = itemArr.length - 1;
        } else {
          this.str = 0;
        }
      } else {
        localStorage.clear();
        this.str = 0;
      }
    });
  },
  mounted() {
    $("div.title").click(function(e) {
      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
      $(e.currentTarget)
        .find("h1")
        .addClass("h1active");
      $(e.currentTarget)
        .find("p")
        .addClass("pactive");
    });

    $(".login_logout").click(function() {
      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }
      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
      $("ul li:nth-child(4)")
        .find("h1")
        .addClass("h1active");
      $("ul li:nth-child(4)")
        .find("p")
        .addClass("pactive");
    });
  },

  watch: {
    cartItem(newValue, oldValue) {
      this.str = newValue.split(",").length - 1;
    },
  },
  updated() {
    if (window.innerWidth < 574) {
      $("#user_name").hide();
    }
    $(window).resize(function() {
      if (window.innerWidth < 574) {
        $("#user_name").hide();
      } else {
        $("#user_name").show();
      }
    });
    $(".member_link").click(function() {
      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }
      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
      $("ul li:nth-child(4)")
        .find("h1")
        .addClass("h1active");
      $("ul li:nth-child(4)")
        .find("p")
        .addClass("pactive");
    });
  },
  computed: {
    session: function() {
      // 6. 偵聽到 memberStatus 有變動，觸發 login 方法，並回傳值到上面v-if狀態的顯示判斷
      this.login();
      return this.memberStatus;
    },
    // itemAmount: function() {
    //   let len = () => {
    //     if (this.cart.split(",") == "") {
    //       return 0;
    //     } else {
    //       return this.cart.split(",").length - 1;
    //     }
    //   };
    //   return len();
    // }
  },
  methods: {
    logout() {
      const api = this.path + "api_memberLogout.php";

      this.$http.post(api);

      this.status = false;
      this.userName = "";
      this.str = 0;
      localStorage.clear();

      // a. 傳遞 logout 的值到父層
      this.$emit("logout", false);

      this.$router.push("/main");

      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }
      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
    },
    login() {
      const api = this.path + "api_memberStatus.php";

      this.$http.post(api).then((res) => {
        const data = res.data;

        // 如果 session 的資料存在（代表有登入），則切換 navbar 果粉狀態
        if (data != "") {
          this.status = true;
          this.userName = data.name;

          if (data.img == null) {
            this.img = require("@/assets/waterpear.png");
          } else {
            this.img = data.img;
          }
        }
      });
    },
    logoclick() {
      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }

      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
    },
    hamclick() {
      $("div.hamburger").toggleClass("is-active");
      $("div.nav_back").slideToggle();
      $("#nav").toggleClass("is-active");
    },
    pageclick() {
      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }
    },
    loginclick() {
      if ($("div.hamburger").hasClass("is-active") == true) {
        $("div.nav_back").slideToggle();
        $("div.hamburger").removeClass("is-active");
      }
      $("div.title")
        .find("h1")
        .removeClass("h1active");
      $("div.title")
        .find("p")
        .removeClass("pactive");
      $("ul li:nth-child(4)")
        .find("h1")
        .addClass("h1active");
      $("ul li:nth-child(4)")
        .find("p")
        .addClass("pactive");
    },
  },
};
</script>
