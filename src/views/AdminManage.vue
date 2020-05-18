<template>
  <div class="msContainer">
    <main class="AdminMainContent">
      <h1 class="manageTitle">管理員 管理中心</h1>

      <router-link class to="/center/addAdmin">
        <button class="addAdmin">新增管理員</button>
      </router-link>

      <section class="tableSection">
        <div class="amt-header">
          <table class="adminManageTab" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>編號</th>
                <th>姓名</th>
                <th>帳號</th>
                <th>密碼</th>
                <th>狀態</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="amt-content">
          <table class="adminManageTab" cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <tr v-for="row in data" :key="row.no">
                <td>{{row.no}}</td>
                <td>{{row.name}}</td>
                <td>{{row.acc}}</td>
                <td>{{row.psw}}</td>
                <td>
                  <input class="statusBtn" type="checkbox" :id="'switch'+row.no" />
                  <label class="statusBtnLabel" :for="'switch'+row.no">Toggle</label>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>
</template>
<script>
export default {
  data() {
    return {
      no: "",
      name: "",
      acc: "",
      psw: "",
      data: []
    };
  },
  created(){
    const api ="/api/api_adminManage.php";

    this.$http
    .post(api) // 將api承接到的資料post出去
    .then(res => {

      this.data = res.data;
      
      // this.no = data[0].no;
      // this.name = data[0].name;
      // this.acc = data[0].acc;
      // this.psw = data[0].psw;
      
    });
    // .catch(err => console.log(err));
  }



};
</script>

