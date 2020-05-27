<template>
  <div class="farminfo">
    <div class="farminfo_head">
      <div class="farminfo_head_text">
        <h2>個人資訊
        </h2>
      </div>
    </div>
    <div class="farminfo_bottom">
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
            <li>地址</li>
            <li>自我介紹</li>
          </ul>
        </div>
        <div class="person_right">
          <ul>
            <li>{{ member.no }}</li>
            <li>{{ member.acc }}</li>
            <!-- <li>密碼</li> -->
            <!-- <li>修改密碼</li> -->
            <li>{{ member.name }}</li>
            <li>{{ member.nick }}</li>
            <li>{{ gender }}</li>
            <li>0{{ member.phone }}</li>
            <li>{{ member.email }}</li>
            <li>{{ member.address }}</li>
            <p class="content_seller">{{ member.content }}</p>
          </ul>
          <!-- <p>{{ member.no }}</p>
          <p>{{ member.acc }}</p>
          <p>{{ member.name }}</p>
          <p>{{ member.nick }}</p>
          <p>{{ gender }}</p>
          <p>0{{ member.phone }}</p>
          <p>{{ member.email }}</p>
          <p>{{ member.address }}</p>
          <p class="content_seller">{{ member.content }}</p> -->
          <button class="btn" @click="updatePage">修改</button>
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
  activated() {
    const api = this.path + "api_farmStatus.php";
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
  methods: {
    updatePage() {
      this.$router.push("/main/farm/update");
    },
  },
};
</script>
