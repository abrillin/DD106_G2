<template>
  <div class="farmupdate">
    <div class="farmupdate_head">
      <div class="farmupdate_head_text">
        <h2>個人資料修改</h2>
      </div>
    </div>
    <div class="farmupdate_bottom">
      <div class="bottom_form">
        <div class="person_left">
          <ul>
            <li>果粉編號</li>
            <li>帳號</li>
            <li>果粉姓名</li>
            <li>暱稱</li>
            <li>性別</li>
            <li>連絡電話</li>
            <li>e-mail</li>
            <li>果園地址</li>
            <li>簡介</li>
          </ul>
        </div>
        <div class="person_right">
          <p>{{ member.no }}</p>
          <p>{{ member.acc }}</p>
          <p>{{ member.name }}</p>
          <p>{{ member.nick }}</p>
          <p>{{ gender }}</p>
          <p>{{ member.phone }}</p>
          <p>{{ member.email }}</p>
          <input type="text" v-model="member.address" maxlength="20" placeholder="字數限制20" />

          <textarea name="farmIntro" v-model="member.content" maxlength="100" placeholder="字數限制100"></textarea>
          <button class="submit_button" @click="$router.go(-1)">
            <div class="correct">
              <p>取消</p>
            </div>
          </button>
          <button class="submit_button" @click="update">
            <div class="correct">
              <p>儲存</p>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { log } from "three";
export default {
  data() {
    return {
      gender: "",
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
      if (data != "") {
        this.member = {
          no: data.no,
          acc: data.acc,
          name: data.name,
          nick: data.nick,
          phone: 0 + data.phone,
          email: data.email,
          gender: data.gender,
          address: data.address,
          img: data.img,
          content: data.content,
          reviewtotal: data.reviewtotal,
          reviewcount: data.reviewcount,
          memberno: data.memberno
        };
        if (data.img == "") {
          this.member.img = require("@/assets/waterpear.png");
        } else {
          this.member.img = data.img;
        }

        if (data.gender == 1) {
          this.gender = "男";
        } else if (data.gender == 2) {
          this.gender = "女";
        } else if (data.gender == 0) {
          this.gender = "其它";
        }
      }
    });
  },
  methods: {
    update: function() {
      const api = this.path + "api_farmUpdate.php";

      for (let i in this.member) {
        if (this.member[i] == "") {
          alert("請檢查是否所有欄位都有輸入資料");
          return;
        }
      }

      this.$http
        .post(api, JSON.stringify(this.member))
        .then(res => {
          const data = res.data;

          if (data == 0) {
            alert("修改成功！");

            this.updateSession();
            this.$router.go(-1);
          }
        })
        // eslint-disable-next-line no-console
        .catch(err => console.log(err));
    },
    updateSession: function() {
      const api = this.path + "api_farmUpdateSession.php";

      this.$http
        .post(api, JSON.stringify(this.member))
        .then(res => {
          const data = res.data;

          if (data == 1) {
            // this.$emit("update", true);
          }
        })
        // eslint-disable-next-line no-console
        .catch(err => console.log(err));
    }
  }
};
</script>
