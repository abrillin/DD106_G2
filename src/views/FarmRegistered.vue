<template>
  <div class="Registered">
    <div class="Registered_head">
      <div class="Registeredt_head_text">
        <h2>申請成為果農</h2>
      </div>
    </div>
    <div class="Registered_bottom">
      <div class="bottom_form">
        <div class="Registered_left">
          <ul>
            <li>果粉編號</li>
            <li>帳號</li>
            <li>果粉姓名</li>
            <li>暱稱</li>
            <li>性別</li>
            <li>連絡電話</li>
            <li>e-mail</li>
            <li>
              <span>果農地址</span>
            </li>
          </ul>
        </div>
        <div class="Registered_right">
          <ul>
            <li>{{ member.no }}</li>
            <li>{{ member.acc }}</li>
            <li>{{ member.name }}</li>
            <li>{{ member.nick }}</li>
            <li>{{ member.gender }}</li>
            <li>{{ member.phone }}</li>
            <li>{{ member.email }}</li>
          </ul>
          <!-- <span>
            <p>{{ member.no }}</p>
          </span>
          <span>
            <p>{{ member.acc }}</p>
          </span>
          <span>
            <p>{{ member.name }}</p>
          </span>
          <span>
            <p>{{ member.nick }}</p>
          </span>
          <span>
            <p>{{ member.gender }}</p>
          </span>
          <span>
            <p>{{ member.phone }}</p>
          </span>
          <span>
            <p>{{ member.email }}</p>
          </span>-->
          <!-- <label for>
            <input type="radio" />男
          </label>
          <label for>
            <input type="radio" />女
          </label>
          <label for>
            <input type="radio" />其他
          </label>
          <br />-->

          <input type="text" v-model="member.add" />
          <div class="submit_button" @click="registered">
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
        img: "",
        add: ""
      }
    };
  },
  created() {
    const api = this.path + "api_memberStatus.php";
    const apiCheck = this.path + "api_farmStatus.php";

    this.$http.post(apiCheck).then(res => {
      const data = res.data;

      if (res.data != "") {
        this.$router.push("/main/farm/info");
      }
    });

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
          img: data.img
        };

        if (data.gender == 1) {
          this.member.gender = "男";
        } else if (data.gender == 2) {
          this.member.gender = "女";
        } else if (data.gender == 0) {
          this.member.gender = "其它";
        }
      }
    });
  },
  methods: {
    registered() {
      const api = this.path + "api_farmSignup.php";

      this.$http.post(api, JSON.stringify(this.member)).then(res => {
        const data = res.data;

        if (data.error) {
          // console.log(data.error);
        }

        if (data == 0) {
          alert("註冊完成！");
          this.$router.push("/main/farm/info");
        }
      });
    }
  }
};
</script>
