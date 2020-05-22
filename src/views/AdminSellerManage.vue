<template>
  <div>
    <main class="sellerMainContent">
      <h1 class="manageTitle">果農 管理中心</h1>
      <section class="aSellerTableSection">
        <div class="ast-header">
          <table class="sellerManageTab" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>編號</th>
                <th>帳號</th>
                <th>姓名</th>
                <th>聯絡電話</th>
                <th>E-mail</th>
                <!-- <th>地址</th> -->
                <th>狀態</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="ast-content">
          <table class="sellerManageTab" cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <tr v-for="row in data" :key="row.no">
                <td>{{row.no}}</td>
                <td>{{row.acc}}</td>
                <td>{{row.name}}</td>
                <td>{{row.phone}}</td>
                <td>{{row.email}}</td>
                <!-- <td>{{row.address}}</td> -->

                <td>
                  <input
                    class="statusBtn"
                    type="checkbox"
                    :id="'switch'+row.no"
                    v-model="row.status"
                  />
                  <label
                    class="statusBtnLabel"
                    :for="'switch'+row.no"
                    @click="toggleStatus(row.no, row.status)"
                  >Toggle</label>
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
      acc: "",
      name: "",
      phone: "",
      email: "",

      data: []
    };
  },
  created() {
    const api = "/api/api_adminSellerManage.php";

    this.$http
      .post(api) // 將api承接到的資料post出去
      .then(res => {
        this.data = res.data;

        // 資料型別轉換
        res.data.forEach(i => {
          i.status = parseInt(i.status);
        });
      });
  },
  methods: {
    toggleStatus(no, status) {
      const api = "/api/api_adminSellerUpdate.php";
      let s;

      // 如果狀態是 1 (停權) 則切換成 0 (正常)
      if (status == 1) {
        s = 0;
      } else if (status == 0) {
        s = 1;
      }

      // 發送到 DB 更新果粉的狀態
      this.$http.post(api, JSON.stringify({ no: no, status: s }));
    }
  }
};
</script>

