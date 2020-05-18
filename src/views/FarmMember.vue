<template>
  <div class="farmcontain">
    <aside class="left">
      <div class="head_portrait">
        <div class="head_img_box">
          <img src="../assets/navbar_account_img.svg" alt />
        </div>
        <ul>
          <li>設定頭像</li>
          <li class="nick">暱稱:<span>台北暴徒</span></li>
          <li class="fans">身分別:<span>果農</span></li>
        </ul>
        <div class="star">
          <div class="starimg">
            <img src="@/assets/Group 720.svg" alt="">
          </div>
          <div class="starimg">
            <img src="@/assets/Group 720.svg" alt="">
          </div>
          <div class="starimg">
            <img src="@/assets/Group 720.svg" alt="">
          </div>
          <div class="starimg">
            <img src="@/assets/Group 720.svg" alt="">
          </div>
          <span>(2134)</span>
        </div>

      </div>

      <div class="Farminfo">
        <ul>
          <li>
            <router-link to="/farm/info">個人資料</router-link>
          </li>
          <li>
            <router-link to="/farm/update">個人資料修改</router-link>
          </li>
          <li>
            <router-link to="/farm/order">商品管理</router-link>
          </li>
          <li>
            <router-link to="/farm/blog">日誌管理</router-link>
          </li>
          <li>
            <router-link to="/farm/list">訂單查詢</router-link>
          </li>
        </ul>
      </div>

      <div class="farm_button">
        <div class="farm">
          <router-link to="/main/member/information">
            <button-more class="return_member" msg="切換果粉"></button-more>
          </router-link>
        </div>
      </div>
       <button type="button" class="btn_drawer">&#9658;</button>
    </aside>
    <router-view  @update="update"/>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  mounted() {
    if (window.innerWidth < 768) {
      $("aside.left").addClass("popover");
      $("button.btn_drawer").on("click", function() {
        $("aside.left").toggleClass("popover");
      });
    }

    $(window).resize(function() {
      if (window.innerWidth < 768) {
        $("aside.left").addClass("popover");
        $("button.btn_drawer").on("click", function() {
          $("aside.left").toggleClass("popover");
        });
      } else {
        $("aside.left").removeClass("popover");
      }
    });
  },
  methods: {
    update: function(s) {
      // this.$emit("loginStatus", s);
    },
  },
};
</script>