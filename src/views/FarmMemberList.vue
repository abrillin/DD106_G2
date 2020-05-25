<template>
  <div class="FarmList">
    <div class="FarmList_head">
      <div class="FarmList_head_text">
        <h2>訂單查詢</h2>
      </div>
    </div>
    <div class="FarmList_bottom">
      <div class="list_1">
        <div class="bottomheader">
          <table class="listTab">
            <thead>
              <tr>
                <th>訂單編號</th>
                <th>成立日期</th>
                <th>總金額</th>
                <th>姓名</th>
                <th>付款狀態</th>
                <th>訂單狀態</th>
                <th>功能</th>
              </tr>
              <tr v-for="(item, index) in member" :key="index">
                <td>{{item.no}}</td>
                <td id="target">{{item.date}}</td>
                <td>{{item.total}}</td>
                <td>{{item.name}}</td>
                <td>{{item.payStatus}}</td>
                <td>{{item.status}}</td>
                <td>
                  <a href="javascript:" @click="itemPage(item.item_no)">查看商品</a>
                </td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      member: []
    };
  },
  created() {
    const api = "/api/api_farmlist.php";
    this.$http.post(api).then(res => {
      const data = res.data;
      if (data != "") {
        this.member = data;

        const payStatusList = ["未付款", "已付款", "已取消", "已完成"];
        const OrderStatusList = ["等待中", "已出貨", "完成"];

        for (let i = 0; i < this.member.length; i++) {
          const payStatus = data[i].payment_status;
          const OrderStatus = data[i].status;
          this.member[i].payStatus = payStatusList[payStatus];
          this.member[i].status = OrderStatusList[OrderStatus];
        }
      }
    });
  },
  methods: {
    itemPage: function(no) {
      let api = "/api/api_item_no.php";
      this.$http
        .post(api, JSON.stringify({ no: no }))
        .then(this.$router.push("/main/shopitem"));
    }
  }
};
</script>