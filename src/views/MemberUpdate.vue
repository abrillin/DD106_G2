<template>
  <div class="MemberUpdate_right">
    <div class="MemberUpdate_right_head">
      <div class="MemberUpdate_right_head_text">
        <h2>個人資料修改</h2>
      </div>
    </div>
    <div class="MemberUpdate_right_bottom">
      <div class="bottom_form">
        <div class="update_left">
          <ul>
            <li>果粉編號</li>
            <li>帳號</li>
            <!-- <li>密碼</li> -->
            <!-- <li>密碼</li> -->
            <li>果粉姓名</li>
            <li>暱稱</li>
            <li>性別</li>
            <li>連絡電話</li>
            <li>e-mail</li>
          </ul>
        </div>
        <div class="update_right">
          <p>{{ member.no }}</p>
          <p>{{ member.acc }}</p>
          <!-- <input type="text">
          <br>-->
          <!-- <button type="button">修改密碼</button> -->
          <!-- <br /> -->
          <input type="text" v-model="member.name" />
          <br />
          <input type="text" v-model="member.nick" />
          <br />
          <div>
            <input
              type="radio"
              v-model="member.gender"
              value="1"
              name="gender"
            />男
            <input
              type="radio"
              v-model="member.gender"
              value="2"
              name="gender"
            />女
            <input
              type="radio"
              v-model="member.gender"
              value="0"
              name="gender"
            />其它
          </div>

          <!-- <p>{{ member.gender }}</p>-->
          <!-- <label for=""><input type="radio">男</label>
                    <label for=""><input type="radio">女</label>
          <label for=""><input type="radio">其他</label>-->
          <!-- <br> -->
          <input type="text" v-model="member.phone" />
          <br />
          <input type="text" v-model="member.email" />
          <button class="submit_button" @click="update">儲存</button>
          <button class="submit_button" @click="$router.go(-1)">取消</button>
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
      member: {
        no: "",
        acc: "",
        name: "",
        nick: "",
        gender: "",
        phone: "",
        email: "",
      },
    };
  },
  created() {
    const api = this.path + "api_memberStatus.php";

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

        // if (data.gender == 1) {
        //   this.member.gender = "男";
        // } else if (data.gender == 2) {
        //   this.member.gender = "女";
        // } else if (data.gender == 3) {
        //   this.member.gender = "其它";
        // }
      }
    });
  },
  methods: {
    update: function() {
      const api = this.path + "api_memberUpdate.php";

      for (let i in this.member) {
        if (this.member[i] == "") {
          alert(" 有欄位空白，請再檢查一次 ( ´Д`)y━･ ");
          return;
        }
      }

      this.$http.post(api, JSON.stringify(this.member)).then((res) => {
        const data = res.data;

        if (data == 1) {
          alert("修改成功 ᕦ(ò_óˇ)ᕤ ");

          this.$router.go(-1);
        }
      });
    },
  },
};
</script>
