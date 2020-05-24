<template>
  <div class="shopping">
    <div class="content">
      <div class="step-box"></div>
      <div class="form">
        <div class="form-content">
          <p class="title">購物清單：</p>
          <div class="info-box pay">
            <div class="pay-th">
              <div class="name">商品名稱</div>
              <div class="price">價錢</div>
              <div class="amount">數量</div>
              <div class="sub">小計</div>
            </div>
            <div class="pay-tr" v-for="item in cart" :key="item.no">
              <div class="name">{{item.name}}</div>
              <div class="price">{{item.price}}</div>
              <div class="amount">{{item.amount}}</div>
              <div class="sub">NT$ {{item.price * item.amount}} 元</div>
            </div>
            <div class="pay-tr transport">
              <p class="transport">運費：NT$ 65 元</p>
            </div>
            <div class="pay-tr">
              <p class="total">總金額：NT$ {{total}} 元</p>
            </div>
          </div>
          <p class="title">付款方式與寄送資訊：</p>
          <div class="info-box info">
            <div class="pay-tr">配送方式：{{form.transport}}</div>
            <div class="pay-tr">付款方式：{{form.pay}}</div>
            <div class="pay-tr">收件者：{{form.name}}</div>
            <div class="pay-tr">聯絡電話：{{form.phone}}</div>
            <div class="pay-tr">e-mail：{{form.mail}}</div>
            <div class="pay-tr">收件地址：</div>
            <p class="address">{{form.add}}</p>
            <div class="pay-tr">收件時間：{{form.time}}</div>
          </div>
          <div class="btn-box">
            <button type="button" class="btn" @click="prevPage">上一步</button>
            <button type="button" class="btn" @click="send">確認送出</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: { getCart: Array, getInfo: Object },
  data() {
    return {
      form: {},
      cart: [],
      total: 0
    };
  },
  activated() {
    this.sub();
  },
  methods: {
    prevPage() {
      this.$router.go(-1);
    },
    sub() {
      this.cart = this.getCart;

      let sub = 0;

      for (let i in this.cart) {
        sub += this.cart[i].price * this.cart[i].amount;
      }

      this.total = sub + 65;

      this.form = this.getInfo;
      this.form["transport"] = "宅配到府";
    },
    send() {
      const apiOrder = "/api/api_addOrder.php";

      let detail = [];
      let itemList = [];

      for (let i in this.cart) {
        detail[i] = {
          price: this.cart[i]["price"],
          amount: this.cart[i]["amount"]
        };

        itemList[i] = this.cart[i]["no"];
      }

      this.$http
        .post(
          apiOrder,
          JSON.stringify({
            no: this.cart[0].sellerNo,
            info: this.form,
            detail: detail,
            itemNo: itemList
          })
        )
        .then(res => {
          const data = res.data;

          if (data == 1) {
            let storage = localStorage;
            let itemArr = storage["itemNo"];

            itemArr = itemArr.substr(0, itemArr.length - 1);
            itemArr = itemArr.split(",");

            for (let i = 0; i < this.cart.length; i++) {
              const index = itemArr.indexOf(this.cart[i].no);

              itemArr.splice(index, 1);
              storage["itemNo"] = itemArr.toString() + ",";
            }

            alert("結帳完成！");
            this.$router.push({ name: "Shopping" });
          }
        });
    }
  }
};
</script>