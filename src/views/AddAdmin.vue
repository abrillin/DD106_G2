<template>
  <div>
    <main class="addAdminMainContent">
      <h1 class="manageTitle">
        管理員管理
        <span class="manageSubTitle">| 新增管理員</span>
      </h1>

      <!-- <form action="../api_addAdmin.php" method="post"> -->
      <table class="addAdminTab" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>
            <label for="addAdminName">姓名</label>
          </th>
          <td>
            <input id="addAdminName" type="text" v-model="addAdmin.name" />
          </td>
        </tr>
        <tr>
          <th>
            <label for="addAdminAccount">帳號</label>
          </th>
          <td>
            <input id="addAdminAccount" type="text" placeholder=" " v-model="addAdmin.acc" />
          </td>
        </tr>
        <tr>
          <th>
            <label for="addAdminPSW">密碼</label>
          </th>
          <td>
            <input 
            id="addAdminPSW" 
            type="password" 
            placeholder="  " 
            v-model="addAdmin.psw"
             @change="checkPsw" />
          </td>
        </tr>
        <tr>
          <th>
            <label for="addAdminPSWcheck">密碼確認</label>
          </th>
          <td>
            <input
              id="addAdminPSWcheck"
              type="password"
              placeholder="請再次輸入密碼"
              v-model="addAdmin.checkpsw"
               @change="checkPsw"
            />
          </td>
        </tr>

        <tr>
          <th></th>
          <td>
            <div class="adAdminBtnSec">
              <input
                id="addAdminCancel"
                type="button"
                onclick="javascript:history.back(1)"
                value="取消"
              />
              <input id="addAdminSubmit" type="submit" value="送出" @click="addAdminF" />
            </div>
          </td>
        </tr>
      </table>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      addAdmin: {
        name: "",
        acc: "",
        psw: "",
        checkpsw: "",

      }
    };
  },

  methods: {
    addAdminF: function() {
      const api = this.path + "api_addAdmin.php";

      for (let i in this.addAdmin) {
        if (this.addAdmin[i] == "") {
          alert(" (｡ŏ_ŏ) 有欄位未填，請確實填寫！ ");
          return;
        }
      }

      this.$http
        .post(api, JSON.stringify(this.addAdmin))
        // $http.post(url,data)
        // 用post把從addAdmin來的js物件資料轉為json字串，傳給api背後的那支php
        .then(res => {
           const data = res.data; // this.data = res.data; // 

          if (data.error) {
            console.log(data.error);
          }

          if (data == 1) { // 資料有一筆
          alert(" 資料新增完成 ٩(･ิᴗ･ิ๑)۶ ");
          this.$router.go(-1);
        
          } else if (data == 0) {
          alert(" 你慢了，此帳號已被註冊 ┐(´д`)┌ ");
        }
        
        });
        // .catch(err => console.log(err));
    },

    checkPsw: function() {
      const addAdmin = this.addAdmin;
      if (addAdmin.checkpsw != "" && addAdmin.psw != "" && addAdmin.checkpsw != addAdmin.psw) {
         alert(" 兩次輸入的密碼不一致，請重新確認 ಠ_ಠ ");
        document.getElementById("addAdminPSW").style.backgroundColor = "#F7C845";
        document.getElementById("addAdminPSWcheck").style.backgroundColor = "#F7C845";
      } else {
        document.getElementById("addAdminPSW").style.backgroundColor = "";
        document.getElementById("addAdminPSWcheck").style.backgroundColor = "";
      }
    },


  },
};
</script>


