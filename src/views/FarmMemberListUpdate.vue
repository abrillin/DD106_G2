<template>
  <div class="FarmListUpdate">
    <div class="FarmListUpdate_head">
      <div class="FarmListUpdate_head_text">
        <span>訂單管理</span>
      </div>
    </div>
    <div class="FarmListUpdate_bottom">
      <div class="FarmListUpdatelist">
        <div class="list_1">
          <div class="listnum">
            <p>訂單編號: {{list.no}}</p>
          </div>
          <div class="farmlist">
            <div class="listheader">
              <table class="orderTab">
                <thead>
                  <tr>
                    <th>成立時間</th>
                    <th>總金額</th>
                    <th>付款狀態</th>
                    <th>訂單狀態</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="listcontent">
              <table class="orderTab">
                <tbody>
                  <tr>
                    <td>{{list.date}}</td>
                    <td>$ {{total}}</td>
                    <td>{{list.paymentStatus}}</td>
                    <td>{{status[list.status]}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="list_slide">
            <img id="ploygon" class="plogon" src="@/assets/Polygon 2.svg" alt />
            <span id="ploygon">訂單明細</span>
          </div>
          <div class="slide display">
            <div class="FarmListDetail">
              <div class="OrderDetail">
                <div class="detailheader">
                  <table class="orderTab">
                    <thead>
                      <tr>
                        <th>商品編號</th>
                        <th>名稱</th>
                        <th>價格</th>
                        <th>數量</th>
                        <th>小計</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="detailcontent" v-for="item in list.item" :key="item.no">
                  <table class="orderTab">
                    <tbody>
                      <tr>
                        <td>{{item.no}}</td>
                        <td>{{item.name}}</td>
                        <td>$ {{item.price}}</td>
                        <td>{{item.amount}}</td>
                        <td>{{item.price * item.amount}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="total">
            <p>商品金額 $ {{sub}}</p>
            <p>運費 $ {{transportMoney}}</p>
            <!-- <p>總金額 $ {{total}}</p> -->
          </div>
          <div class="address">
            <div class="address_left">
              <p>收件人:</p>
              <p>連絡電話:</p>
              <p>收件地址:</p>
              <p>運送方式:</p>
            </div>
            <div class="address_right">
              <p>{{list.name}}</p>
              <p>0{{list.phone}}</p>
              <p>{{list.address}}</p>
              <p>{{list.transport}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
export default {
  props: { sendListNo: Number },
  data() {
    return {
      list: {},
      status: ["未完成", "已完成"],
      sub: 0,
      transportMoney: 65,
      total: 0
    };
  },
  activated() {
    const api = this.path + "api_farmGetOneList.php";

    this.$http.post(api, JSON.stringify(this.sendListNo)).then(res => {
      const data = res.data;

      this.list = data;

      const payStatus = ["未付款", "已付款", "已取消", "已完成"];

      if (this.list.paymentStatus != false) {
        this.list.paymentStatus = payStatus[data.payment_status];
      }

      if (this.list.item) {
        this.list.item.forEach(item => {
          this.sub += item.price * item.amount;
        });

        this.total = this.transportMoney + this.sub;
      }
    });

    var i = 0;
    $(".list_slide").click(function() {
      if (i == 0) {
        $("#ploygon").css("transform", "rotateX(180deg)");
        i = 1;
      } else {
        $("#ploygon").css("transform", "rotateX(0deg)");
        i = 0;
      }

      $(".slide").toggleClass("display");
    });
  }
};
</script>