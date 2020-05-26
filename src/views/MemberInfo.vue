<template>
  <div class="information">
    <div class="information_head">
      <div class="information_head_text">
        <h2>個人資料</h2>
      </div>
    </div>
    <div class="information_bottom">
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
          </ul>
        </div>
        <div class="information_right">
          <span>
            <p>{{ no }}</p></span
          >
          <span>
            <p>{{ acc }}</p></span
          >
          <span>
            <p>{{ name }}</p></span
          >
          <span>
            <p>{{ nick }}</p></span
          >
          <span>
            <p>{{ gender }}</p></span
          >
          <span>
            <p>0{{ phone }}</p></span
          >
          <span>
            <p>{{ email }}</p></span
          >
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      no: "",
      acc: "",
      name: "",
      nick: "",
      gender: "",
      phone: "",
      email: "",
    };
  },
  created() {
    const api = this.path + "api_memberStatus.php";

    this.$http
      .post(api)
      .then((res) => {
        const data = res.data;

        if (data != "") {
          this.no = data.no;
          this.acc = data.acc;
          this.name = data.name;
          this.nick = data.nick;
          if (data.gender == 1) {
            this.gender = "男";
          } else if (data.gender == 2) {
            this.gender = "女";
          } else if (data.gender == 0) {
            this.gender = "其它";
          }
          this.phone = data.phone;
          this.email = data.email;
        }
      });
  },
};
</script>
