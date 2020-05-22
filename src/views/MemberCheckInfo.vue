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
              <input type="text" />
            </p>
            <p class="required">
              手機：
              <input type="text" />
            </p>
            <p>
              電話：
              <input type="text" />
            </p>
            <p class="required">
              信箱：
              <input type="text" />
            </p>
            <p class="required">
              收件地址：
              <select class="select"></select>
              <select class="select"></select>
            </p>
            <p>
              <input type="text" />
            </p>
            <p class="required">
              收件時間：
              <select class="select"></select>
            </p>
          </div>
          <p class="title">選擇付款方式：</p>
          <div class="pay-box input">
            <p>
              <input id="card" name="pay" type="radio" class="checkbox" v-model="pay" />
              <label for="card">信用卡</label>
            </p>
            <p>
              <input id="atm" name="pay"  type="radio" class="checkbox" v-model="pay" />
              <label for="atm">ATM轉帳</label>
            </p>
            <p>
              <input id="pay" name="pay" type="radio" class="checkbox" v-model="pay" />
              <label for="pay">貨到付款</label>
            </p>
          </div>
          <div class="btn-box">
            <button type="button" class="btn" @click="prevPage">上一步</button>
            <button type="button" class="btn">下一步</button>
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
      card: false,
      atm: false,
      pay: false
    };
  },
  methods: {
    prevPage() {
      this.$router.go(-1);
    }
  }
};
</script>