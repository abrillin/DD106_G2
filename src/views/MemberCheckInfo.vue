<template>
  <div class="shopping">
    <div class="content">
      <div class="step-box"></div>
      <div class="form">
        <div class="form-content">
          <p class="title">訂購人資訊：</p>
          <div class="info-box">
            <p class="required">
              姓名：
              <input type="text" v-model="form.name" />
            </p>
            <p class="required">
              手機：
              <input type="text" v-model="form.phone" />
            </p>
            <p>
              電話：
              <input type="text" v-model="form.number" />
            </p>
            <p class="required">
              信箱：
              <input type="text" v-model="form.mail" />
            </p>
            <p class="required">
              地址：
              <!-- <input type="text" class="select">
              <input type="text" class="select">-->
            </p>
            <p>
              <input type="text" v-model="form.add" />
            </p>
            <p class="required">
              時間：
              <input type="text" v-model="form.time" />
              <!-- <select class="select"></select> -->
            </p>
          </div>
          <p class="title">選擇付款方式：</p>
          <div class="pay-box input">
            <p>
              <input
                id="card"
                name="pay"
                type="radio"
                class="checkbox"
                value="0"
                v-model="form.pay"
              />
              <label for="card">信用卡</label>
            </p>
            <!-- <p>
              <input id="atm" name="pay" type="radio" class="checkbox" value="1" v-model="form.pay" />
              <label for="atm">ATM轉帳</label>
            </p>
            <p>
              <input id="pay" name="pay" type="radio" class="checkbox" value="2" v-model="form.pay" />
              <label for="pay">貨到付款</label>
            </p> -->
          </div>
          <div class="btn-box">
            <button type="button" class="btn" @click="prevPage">上一步</button>
            <button type="button" class="btn" @click="nextPage">下一步</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: "",
        phone: "",
        number: null,
        add: "",
        mail: "",
        time: "",
        pay: ""
      }
    };
  },
  methods: {
    prevPage() {
      this.$router.go(-1);
    },
    nextPage() {
      for (let i in this.form) {
        if (this.form[i] == "") {
          alert("請確認欄位都有填寫");
          return;
        }
      }
      this.$emit("setInfo", this.form);
      this.$router.push({ name: "PayInfo" });
    }
  }
};
</script>