<template>
  <div class="msContainer">
    <main class="AdminMainContent">
      <h1 class="manageTitle">管理員 管理中心</h1>

      <router-link class to="/admin/center/addAdmin">
        <button class="addAdmin">新增管理員</button>
      </router-link>

      <section class="tableSection">
        <div class="amt-header">
          <table
            class="adminManageTab"
            cellpadding="0"
            cellspacing="0"
            border="0"
          >
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
          <table
            class="adminManageTab"
            cellpadding="0"
            cellspacing="0"
            border="0"
          >
            <tbody>
              <tr v-for="row in data" :key="row.no">
                <td>{{ row.no }}</td>
                <td>{{ row.name }}</td>
                <td>{{ row.acc }}</td>
                <td><input type="password" v-model="row.psw" disabled>
                  </td>
                <td>
                  <input
                    class="statusBtn"
                    type="checkbox"
                    :id="'switch' + row.no"
                    v-model="row.status"
                  />
                  <label
                    class="statusBtnLabel"
                    :for="'switch' + row.no"
                    @click="toggleStatus(row.no, row.status)"
                    >Toggle</label
                  >
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
      data: [],
    };
  },
  created() {
    const api = this.path + "api_adminManage.php";

    this.$http // $http 是將axios封裝後的promise寫法
      .post(api) // 用axios post info到此api
      .then((res) => {
        // 如果可以傳送出去的話會response資料回來
        this.data = res.data; // 只取res中的data屬性中的資料

        // 資料型別轉換
        res.data.forEach((i) => {
          i.status = parseInt(i.status);
        });
      });
  },
  methods: {
    toggleStatus(no, status) {
      const api = this.path + "api_adminUpdate.php";
      let s;

      // 如果狀態是 1 (停權) 則切換成 0 (正常)
      if (status == 1) {
        s = 0;
      } else if (status == 0) {
        s = 1;
      }

      // 發送到 DB 更新管理員的狀態
      this.$http.post(api, JSON.stringify({ no: no, status: s }));
    },
  },
};
</script>
