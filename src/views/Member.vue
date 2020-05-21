<template>
  <div class="membercontain">
    <aside class="left">
      <div class="head_portrait">
        <div class="head_img_box">
          <img id="MemberPic" :src="member.img" />
        </div>
        <ul>
          <li>
            <label for="upMemberPic" @change="changeMemPic">
              設定頭像
              <input type="file" id="upMemberPic" style="display: none;" />
            </label>
          </li>
          <li class="nick">
            暱稱:
            <span>{{ member.nick }}</span>
          </li>
          <li class="fans">
            身分別:
            <span>果粉</span>
          </li>
        </ul>
      </div>

      <div class="info">
        <ul>
          <li>
            <router-link to="/main/member/information">個人資訊</router-link>
          </li>
          <li>
            <router-link to="/main/member/update">個人資料修改</router-link>
          </li>
          <li>
            <router-link to="/main/member/order">訂單管理</router-link>
          </li>
          <li>
            <router-link to="/main/member/track">追蹤名單管理</router-link>
          </li>
          <li>
            <router-link to="/main/member/shopping">購物籃</router-link>
          </li>
        </ul>
      </div>
      <div v-if="farmStatus == false" class="member_button">
        <div class="befarm">
          <router-link :to="{ name: 'FarmRegistered' }">
            <button-more class="become_farmer" msg="成為果農"></button-more>
          </router-link>
        </div>
      </div>
      <div v-else class="member_button">
        <div class="changefarm">
          <router-link :to="{ name: 'Info' }">
            <button-more class="goto_farmer" msg="切換果農"></button-more>
          </router-link>
        </div>
      </div>
      <button type="button" class="btn_drawer">&#9658;</button>
    </aside>
    <router-view />
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      formData: new FormData(),
      member: {
        acc: "",
        name: "",
        nick: "",
        gender: "",
        phone: "",
        email: "",
        img: "",
      },
      farmStatus: false,
    };
  },
  created() {
    const api = "/api/api_memberStatus.php";

    this.$http.post(api).then((res) => {
      const data = res.data;

      if (data != "") {
        this.member = {
          no: data.no,
          acc: data.acc,
          name: data.name,
          nick: data.nick,
          phone: 0 + data.phone,
          email: data.email,
          gender: data.gender,
        };

        // 檢查是否註冊過果農身分
        const apiCheck = "/api/api_checkFarm.php";

        this.$http.post(apiCheck, JSON.stringify(this.member)).then((res) => {
          const data = res.data;

          if (data == 0) {
            this.farmStatus = false;
          } else {
            this.farmStatus = true;
          }
        });

        if (data.img == "") {
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
  },
  methods: {
    changeMemPic: function(e) {
      let reader = new FileReader();
      const img = e.target;

      reader.onload = function(e) {
        document.getElementById("MemberPic").src = e.target.result;
      };

      reader.readAsDataURL(img.files[0]);

      this.member.img = "/api/MemPic/member" + img.files[0].name;
      this.formData.append("file", img.files[0]);
      this.$http
        .post("/api/api_changeMemPic.php", this.formData)
        .then((res) => {
          const data = res.data;

          // 如果上傳成功
          if (data == 0) {
            this.$http
              .post("/api/api_getMemPic.php", JSON.stringify(this.member))
              .then((res) => {
                const r = res.data;

                // 如果更新成功
                if (r == 0) {
                  alert("上傳成功！");
                  this.$router.go(0);
                } else if (r == 1) {
                  alert("資料庫更新錯誤");
                }
              });
          } else if (data == 1) {
            alert("上傳失敗！");
          }
        });
    },
    // checkFarm: function() {
    //   const api = "/api/api_checkFarm.php";

    //   this.$http.post(api, JSON.stringify(this.member)).then(res => {
    //     const data = res.data;

    //     if (data == "") {
    //     } else {
    //       alert("已經是果農了");
    //       this.$router.push({ name: "Info" });
    //     }
    //   });
    // },
    // changeFarm: function() {
    //   const api = "/api/api_checkFarm.php";

    //   this.$http.post(api, JSON.stringify(this.member)).then(res => {
    //     const data = res.data;

    //     if (data == "") {
    //       alert("還不是果農了喔");
    //       this.$router.push({ name: "FarmRegistered" });
    //     } else {
    //       const api2 = "/api/api_farmlogin.php";

    //       this.$http.post(api2, JSON.stringify(this.member)).then(res => {
    //         const data = res.data;

    //         this.$router.go(0);
    //       });
    //     }
    //   });
    // }
  },
};
</script>
