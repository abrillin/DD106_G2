<template>
  <div>
    <main class="EncyMainContent">
      <h1 class="manageTitle">知識百科 管理中心</h1>
      <router-link class to="/admin/center/encyEdit">
        <button class="editEncy">新增百科內容</button>
      </router-link>
      <section class="EncytableSection">
        <div class="enct-header">
          <table
            class="EncymanageTab"
            cellpadding="0"
            cellspacing="0"
            border="0"
          >
            <thead>
              <tr>
                <th>編號</th>
                <th>標籤</th>
                <th>產季</th>
                <th>內容</th>
                <th>編輯</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="enct-content">
          <table
            class="EncymanageTab"
            cellpadding="0"
            cellspacing="0"
            border="0"
          >
            <tbody>
              <tr v-for="row in data" :key="row.no">
                <td>{{row.no}}</td>
                <td>{{row.title}}</td> <!-- 水果標籤 -->
                <td>{{row.type}}</td> <!-- 水果產季 -->
                <td>{{row.content}}</td>
                <td>
                  <a href="#" style="outline: none;">
                    <img class="editImg" src="@/assets/icon/edit_btn.svg" :id="row.no" alt />
                  </a>
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
      title: "",
      type: "",
      content: "",
      data: [],
    };
  },
  created() {
    const api = "/api/api_adminEncyManage.php";

    this.$http // $http 是將axios封裝後的promise寫法
    .post(api) // 用axios post info到此api
    .then(res => { // 如果可以傳送出去的話會response data: []裡的資料回來

      this.data = res.data; // 第一個data是指data()裡的data[]; res.data 代表只取res中的data屬性中的資料
    })
  },
  methods: {
    editPage(url, param){
      this.$router.push({name: url});
      // this.$router.push({ name: 'Order', params: { userId: 123 }})
    }
  }
};
</script>
