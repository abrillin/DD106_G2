<template>
  <div>
    <main class="blogComReportMainContent">
      <h1 class="manageTitle">果農日誌 管理中心   <span class="manageSubTitle">| 留言檢舉處理</span></h1>
      <section class="blogComReportTableSection">
        <div class="bcr-header">
          <table class="blogComReportManageTab" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>檢舉編號</th>
                <th>留言編號</th>
                <th>檢舉事由</th>
                <th>檢舉人</th>
                <th>檢舉時間</th>
                <th>處理狀態</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="bcr-content">
          <table class="blogComReportManageTab" cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <tr v-for="item in list" :key="item.no">
                <td>{{item.no}}</td>
                <td>{{item.com_no}}</td>
                <td>{{type[item.reason]}}</td>
                <td>{{item.name}}</td>
                <td>{{item.date}}</td>
                <td>
                  <select
                    class="comReStatus"
                    v-model="item.status"
                    @change="changeStatus(item.no, item.status, item.com_no)"
                  >
                    <option value="0">未處理</option>
                    <option value="1">已刪除</option>
                    <option value="2">未通過</option>
                  </select>
                </td>
              </tr>
              <!-- <tr>
                <td>xxxxx</td>
                <td>xxxxx</td>
                <td>色情內容</td>
                <td>xxx</td>
                <td>2020-04-28</td>
                <td><select class="comReStatus">
                    <option>未處理</option>
                    <option>已刪除</option>
                    <option>未通過</option>
                  </select></td>
              </tr>
              <tr>
                <td>xxxxx</td>
                <td>xxxxx</td>
                <td>色情內容</td>
                <td>xxx</td>
                <td>2020-04-28</td>
                <td><select class="comReStatus">
                    <option>未處理</option>
                    <option>已刪除</option>
                    <option>未通過</option>
                  </select></td>
              </tr>-->
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
      list: [],
      type: ["仇恨言論", "侵權", "色情內容", "與本網站無關"]
    };
  },
  created() {
    const api = this.path + "api_commentManage.php";

    this.$http.post(api).then(res => {
      this.list = res.data;
    });
  },
  methods: {
    changeStatus(no, s, c) {
      const api = this.path + "api_adminCommentUpdate.php";
      this.$http.post(api, JSON.stringify({ no: no, status: s, com: c }));
    }
  }
};
</script>
