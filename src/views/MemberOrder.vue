<template>
  <div class="Order">
    <div class="Order_head">
      <div class="Order_head_text">
        <h2>訂單管理</h2>
      </div>
    </div>
    <div class="order_zero">目前尚無訂單</div>
    <div class="Order_bottom">
      <div class="Orderlist">
        <div class="list_1">
          <div class="listnum">
            <p>訂單編號:{{ this.order[this.i].no }}</p>
          </div>
          <div class="memberorder">
            <div class="orderheader">
              <table class="orderTab">
                <thead>
                  <tr>
                    <th>訂單時間</th>
                    <th>總金額</th>
                    <th>付款狀態</th>
                    <th>訂單狀態</th>
                  </tr>
                  <tr>
                    <td>{{ this.order[this.i].date }}</td>
                    <td>$ {{ this.order[this.i].total }}</td>
                    <td v-if="this.order[this.i].payment_status == 1">
                      已付款
                    </td>
                    <td v-if="this.order[this.i].payment_status == 0">
                      未付款
                    </td>
                    <td v-if="this.order[this.i].status == 1">完成</td>
                    <td v-if="this.order[this.i].status == 0">未完成</td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

          <div class="list_slide">
            <img id="ploygon" class="plogon" src="@/assets/Polygon 2.svg" alt />
            <span id="ploygon">訂單明細</span>
          </div>
          <div class="slide display">
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
                    <tr v-for="i in item" :key="i.no">
                      <td>{{ i.no }}</td>
                      <td>{{ i.name }}</td>
                      <td>$ {{ i.price }}</td>
                      <td>{{ i.amount }}</td>
                      <td>$ {{ i.amount * i.price }}</td>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="detailcontent">
                <table class="orderTab">
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="total">
            <p>
              <span>商品金額：$</span>
              <span>{{ this.order[this.i].total - 65 }}</span>
            </p>
            <p>運費 $65</p>
            <!-- <p><span>總金額:$</span><span>{{parseInt(this.order[this.i].total) - 65}}</span></p>-->
          </div>
          <div class="address">
            <div class="address_left">
              <p>收件人:</p>
              <p>連絡電話:</p>
              <p>收件地址:</p>
              <p>運送方式:</p>
            </div>
            <div class="address_right">
              <p>{{ this.order[this.i].name }}</p>
              <p>{{ "0" + this.order[this.i].phone }}</p>
              <p>{{ this.order[this.i].address }}</p>
              <p>{{ this.order[this.i].transport }}</p>
            </div>
          </div>
          <div class="Evaluation">
            <div class="Evaluation_top">
              <p class="Evaluation_text">尚未付款</p>
            </div>
            <div class="star">
              <div class="starimg">
                <img
                  :src="this.srcon"
                  value="1"
                  @click="staron($event)"
                  class="staron"
                />
                <img
                  :src="this.srcoff"
                  value="2"
                  @click="staron($event)"
                  class="staron"
                />
                <img
                  :src="this.srcoff"
                  value="3"
                  @click="staron($event)"
                  class="staron"
                />
                <img
                  :src="this.srcoff"
                  value="4"
                  @click="staron($event)"
                  class="staron"
                />
                <img
                  :src="this.srcoff"
                  value="5"
                  @click="staron($event)"
                  class="staron"
                />
              </div>

              <div class="Evaluation_submit">
                <!-- <a href="#">
                                    <p>不想給了</p>
                </a>-->

                <button class="starSend" @click="starSend">送出</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="pagination_block">
        <ul class="pagination">
          <li @click="prevpage($event)">&lt;</li>
          <li
            v-for="(i, index) in order"
            :key="i.no"
            @click="changepage($event)"
            class="pageon"
          >
            {{ index + 1 }}
          </li>
          <li @click="nextpage($event)">&gt;</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import srcon1 from "@/assets/memberorder/staron.svg";
import srcoff1 from "@/assets/memberorder/staroff.svg";
export default {
  data() {
    return {
      srcon: srcon1,
      srcoff: srcoff1,
      star: {
        star: 1,
        orderno: 0,
        sellerno: 0,
      },
      total: 0,
      i: 0,
      memno: "",
      order: [[]],
      item: [],
    };
  },

  created() {
    const api = this.path + "api_memberstatus.php";

    this.$http.post(api).then((res) => {
      this.memno = res.data.no;

      const api2 = this.path + "api_memberOrder.php";

      this.$http.post(api2, JSON.stringify(this.memno)).then((res) => {
        if (res.data.length == 0) {
          $(".Order_bottom").hide();
          $(".order_zero").show();
        } else {
          this.order = res.data;
          const api3 = this.path + "api_orderItem.php";

          this.$http
            .post(api3, JSON.stringify(this.order[this.i].no))
            .then((res) => {
              this.item = res.data;
            });
        }
      });
    });
  },

  updated() {
    if (this.order[this.i].payment_status == 0) {
      $(".starSend").attr("disabled", true);
    } else if (this.order[this.i].payment_status == 1) {
      $(".Evaluation_text").text("付款完成可以給評價了");
      $(".starSend").attr("disabled", false);
      if (this.order[this.i].status == 1) {
        $(".Evaluation_text").text("評價完成");
        $(".starSend").attr("disabled", true);
      }
    }
    document.getElementsByClassName("pageon")[this.i].classList.add("-on");
  },
  mounted() {},
  methods: {
    starSend: function() {
      this.star.sellerno = this.order[this.i].seller_no;
      this.star.orderno = this.order[this.i].no;
      this.$http
        .post(this.path + "api_orderReview.php", JSON.stringify(this.star))
        .then((res) => {
          if (res.data == 0) {
            alert("評價成功");
            this.$router.go(0);
          } else {
            alert("評價失敗");
            this.$router.go(0);
          }
        });
    },
    changepage: function($event) {
      this.i = $event.target.innerHTML - 1;
      $("ul > li").removeClass("-on");
      $event.target.classList.add("-on");
    },
    prevpage: function($event) {
      if (this.i >= 1 && this.i <= this.order.length) {
        this.i--;
      } else {
        this.i = this.i;
      }
      $("ul > li").removeClass("-on");
      document.getElementsByClassName("pageon")[this.i].classList.add("-on");
    },
    nextpage: function($event) {
      if (this.i >= 0 && this.i < this.order.length - 1) {
        this.i++;
      } else {
        this.i = this.i;
      }
      $("ul > li").removeClass("-on");
      document.getElementsByClassName("pageon")[this.i].classList.add("-on");
    },
    staron: function($event) {
      if ($event.target.getAttribute("value") == 1) {
        document.getElementsByClassName("staron")[0].src = this.srcon;
        document.getElementsByClassName("staron")[1].src = this.srcoff;
        document.getElementsByClassName("staron")[2].src = this.srcoff;
        document.getElementsByClassName("staron")[3].src = this.srcoff;
        document.getElementsByClassName("staron")[4].src = this.srcoff;
        this.star.star = 1;
      } else if ($event.target.getAttribute("value") == 2) {
        document.getElementsByClassName("staron")[0].src = this.srcon;
        document.getElementsByClassName("staron")[1].src = this.srcon;
        document.getElementsByClassName("staron")[2].src = this.srcoff;
        document.getElementsByClassName("staron")[3].src = this.srcoff;
        document.getElementsByClassName("staron")[4].src = this.srcoff;
        this.star.star = 2;
      } else if ($event.target.getAttribute("value") == 3) {
        document.getElementsByClassName("staron")[0].src = this.srcon;
        document.getElementsByClassName("staron")[1].src = this.srcon;
        document.getElementsByClassName("staron")[2].src = this.srcon;
        document.getElementsByClassName("staron")[3].src = this.srcoff;
        document.getElementsByClassName("staron")[4].src = this.srcoff;
        this.star.star = 3;
      } else if ($event.target.getAttribute("value") == 4) {
        document.getElementsByClassName("staron")[0].src = this.srcon;
        document.getElementsByClassName("staron")[1].src = this.srcon;
        document.getElementsByClassName("staron")[2].src = this.srcon;
        document.getElementsByClassName("staron")[3].src = this.srcon;
        document.getElementsByClassName("staron")[4].src = this.srcoff;
        this.star.star = 4;
      } else if ($event.target.getAttribute("value") == 5) {
        document.getElementsByClassName("staron")[0].src = this.srcon;
        document.getElementsByClassName("staron")[1].src = this.srcon;
        document.getElementsByClassName("staron")[2].src = this.srcon;
        document.getElementsByClassName("staron")[3].src = this.srcon;
        document.getElementsByClassName("staron")[4].src = this.srcon;
        this.star.star = 5;
      }
    },
  },
};
</script>
