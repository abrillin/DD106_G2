<template>
  <div class="farmcontain">
    <aside class="left">
      <div class="head_portrait">
        <div class="head_img_box">
          <img :src="member.img" />
        </div>
        <ul>
          <li class="nick">
            暱稱:
            <span>{{ member.nick }}</span>
          </li>
          <li class="fans">
            身分別:
            <span>果農</span>
          </li>
        </ul>
        <div class="star">
          <img src="@/assets/Group 720.svg" v-if="member.reviewtotal / member.reviewcount > 0" />
          <img src="@/assets/Group 720.svg" v-if="member.reviewtotal / member.reviewcount > 1" />
          <img src="@/assets/Group 720.svg" v-if="member.reviewtotal / member.reviewcount > 2" />
          <img src="@/assets/Group 720.svg" v-if="member.reviewtotal / member.reviewcount > 3" />
          <img src="@/assets/Group 720.svg" v-if="member.reviewtotal / member.reviewcount > 4" />
          <span>({{ member.reviewcount }})</span>
        </div>
      </div>

      <div class="Farminfo">
        <ul>
          <li>
            <router-link to="/main/farm/info">個人資料</router-link>
          </li>
          <li>
            <router-link to="/main/farm/update">個人資料修改</router-link>
          </li>
          <li>
            <router-link to="/main/farm/order">商品管理</router-link>
          </li>
          <li>
            <router-link to="/main/farm/blog">日誌管理</router-link>
          </li>
          <li>
            <router-link to="/main/farm/list">訂單查詢</router-link>
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
    <keep-alive>
      <router-view />
    </keep-alive>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      member: {
        no: "",
        acc: "",
        name: "",
        nick: "",
        phone: "",
        email: "",
        gender: "",
        address: "",
        content: "",
        reviewtotal: "",
        reviewcount: "",
        memberno: ""
      }
    };
  },
  created() {
    const api = this.path + "api_farmStatus.php";
    this.$http.post(api).then(res => {
      const data = res.data;
      if (data.status == 1) {
        alert("此身份停權中，請聯繫管理員！");

        this.$router.go(-1);
      }
      if (data != "") {
        this.member = {
          no: data.no,
          acc: data.acc,
          name: data.name,
          nick: data.nick,
          phone: data.phone,
          email: data.email,
          gender: data.gender,
          address: data.address,
          img: data.img,
          content: data.content,
          reviewtotal: data.reviewtotal,
          reviewcount: data.reviewcount,
          memberno: data.memberno
        };
        if (data.img == null) {
          this.member.img = require("@/assets/waterpear.png");
        } else {
          this.member.img = data.img;
        }
      }
    });
  },
  mounted() {
    if (window.innerWidth < 991) {
      if ($("aside.left").hasClass("popover")) {
        $("button.btn_drawer").on("click", function() {
          $("aside.left").removeClass("popover");
        });
      } else {
        $("aside.left").addClass("popover");
        $("button.btn_drawer").on("click", function() {
          $("aside.left").toggleClass("popover");
        });
      }
    } else {
      $("aside.left").removeClass("popover");
    }

    $(window).resize(function() {
      if (window.innerWidth < 991) {
        if ($("aside.left").hasClass("popover")) {
          $("button.btn_drawer").on("click", function() {
            $("aside.left").toggleClass("popover");
          });
        } else {
          $("aside.left").addClass("popover");
        }
      } else {
        $("aside.left").removeClass("popover");
        $("button.btn_drawer").on("click", function() {
          $("aside.left").toggleClass("popover");
        });
      }
    });
  }
};
</script>
