<template>
  <div class="farmupdate">
    <div class="farmupdate_head">
      <div class="farmupdate_head_text">
        <h2>個人資料修改</h2>
      </div>
    </div>
    <div class="farmupdate_bottom">
      <div class="top_card">
        <div class="card">
          <div class="up">
            <div class="imgbox">
              <img :src="member.img" alt="" />
            </div>
            <div class="uptext">
              <div>
                <span>暱稱:</span><span>{{ member.nick }}</span>
              </div>
              <div><span>評價:</span><span></span></div>
              <div>
                <span>果園地址:</span><span>{{ member.address }}</span>
              </div>
              <div class="underline"></div>
            </div>
          </div>
          <div class="dowm">
            <div class="downtext">
              <h1>簡介</h1>
              <p>{{ member.content }}</p>
            </div>
          </div>
        </div>
      </div>
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
          <input type="text" v-model="member.name" />
          <input type="text" v-model="member.nick" />
          <div>
            <input
              type="radio"
              name="gender"
              value="1"
              v-model="member.gender"
            />男
            <input
              type="radio"
              name="gender"
              value="2"
              v-model="member.gender"
            />女
            <input
              type="radio"
              name="gender"
              value="0"
              v-model="member.gender"
            />其它
          </div>

          <p>0912-345678</p>
          <p>you_go33@yahoo.com</p>
          <input type="text" />

          <textarea name="" id="" cols="20" rows="5"></textarea>
          <div class="submit_button">
            <div class="correct">
              <p>確定</p>
            </div>
          </div>
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
        phone: "",
        email: "",
        gender: "",
        address: "",
        content: "",
        reviewtotal: "",
        reviewcount: "",
        memberno: "",
      },
    };
  },
  created() {
    const api = "/api/api_farmStatus.php";
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
          address: data.address,
          img: data.img,
          content: data.content,
          reviewtotal: data.reviewtotal,
          reviewcount: data.reviewcount,
          memberno: data.memberno,
        };
        if (data.img == "") {
          this.member.img = require("@/assets/waterpear.png");
        } else {
          this.member.img = data.img;
        }
      }
    });
  },
};
</script>
