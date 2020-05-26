<template>
  <div id="body" class="adminLoginBody">
    <div id="body" class="adminLoginBox">
      <img class="titleImg" src="@/assets/adminLogin/adminLogin.png" alt />
      <form class="adminLoginForm" onsubmit="return false">
        <div class="form-item">
          <label class="adminLoginLabel">帳號</label>
          <div class="input-wrapper">
            <input
              class="adminLoginInput"
              type="text"
              id="username"
              autocomplete="off"
              autocorrect="off"
              autocapitalize="off"
              spellcheck="false"
              data-lpignore="true"
              v-model="member.acc"
            />
          </div>
        </div>
        <div class="form-item">
          <label class="adminLoginLabel">密碼</label>
          <div class="input-wrapper">
            <input
              class="adminLoginInput"
              type="password"
              id="password"
              autocomplete="off"
              autocorrect="off"
              autocapitalize="off"
              spellcheck="false"
              data-lpignore="true"
              v-model="member.psw"
            />
            <button class="adminLoginBtn" type="button" id="eyeball">
              <div class="eye"></div>
            </button>
            <div id="beam"></div>
          </div>
        </div>
        <button class="adminLoginBtn" id="submit" @click="login">登入</button>
        <!-- <router-link class="adminLoginBtn" to="/center/manage">進入</router-link> -->
      </form>
    </div>
  </div>
</template>
<script>
import "@/js/adminLogin";
export default {
  data() {
    return {
      member: {
        acc: "",
        psw: "",
      },
    };
  },
  methods: {
    login: function() {
      const login = this.path + "api_adminLogin.php";

      this.$http.post(login, JSON.stringify(this.member)).then((res) => {
        const data = res.data;
        if (data.status == 1) {
          alert("此帳號已經停用 ╮(╯_╰)╭ ");
        } else if (data == 0) {
          alert(" Σ(*ﾟдﾟﾉ)ﾉ  帳號或密碼輸入錯誤，請重新再試一次！ ");
        } else {
          alert(data.name + " 您好，歡迎回來巡視果園｡ヽ(*´∀`)ﾉﾟ ");

          this.$router.push("/admin/center/manage");
        }
      });
    },
  },
};
</script>
