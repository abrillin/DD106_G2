<template>
  <div class="farminfo">
    <div class="farminfo_head">
      <div class="farminfo_head_text">
        <h2>個人資料</h2>
      </div>
    </div>
    <div class="farminfo_bottom">
      <!-- <div class="top_card">
        <div class="card">
            <div class="up">
            <div class="imgbox">
              <img src="@/assets/ia_2300000010.jpg" alt="" />
            </div>
          <div class="uptext">
              <p>暱稱:蓬蓬草莓姨</p>
              <span>評價</span>
              <p>果園地址</p>
              <div class="underline"></div>
            </div>
          </div>
          <div class="dowm">
            <div class="downtext">
              <p>
                簡介<br />
                花菓山富貴果園位於新竹縣竹北市，種植紅龍果、百香果、玉米等作物，果園透過合理化施肥讓農作物生長，品質良好，廣受好評。
                <br />
                <br />
                以自家也能安心食用為初衷，所有作物皆接受嚴格把關，主力產品為紅龍果，我們生產紅龍果以草生栽培，不使用除草劑、農藥，使用政府推薦肥料及用藥，品質嚴格把關，讓大家能安心的食用。
              </p>
            </div>
          </div>
        </div>
      </div>-->
      <div class="bottom_form">
        <div class="person_left">
          <ul>
            <li>果農編號</li>
            <li>帳號</li>
            <!-- <li>密碼</li> -->
            <!-- <li>修改密碼</li> -->
            <li>果粉姓名</li>
            <li>暱稱</li>
            <li>性別</li>
            <li>連絡電話</li>
            <li>e-mail</li>
          </ul>
        </div>
        <div class="person_right">
          <p>{{ member.no }}</p>
          <p>{{ member.acc }}</p>
          <p>{{ member.name }}</p>
          <p>{{ member.nick }}</p>
          <p>{{ gender }}</p>

          <p>0{{ member.phone }}</p>
          <p>{{ member.email }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
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
          phone: data.phone,
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
};
</script>
