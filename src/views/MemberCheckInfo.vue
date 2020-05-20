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
              <input type="checkbox" class="checkbox" name id />
              <label></label>信用卡
            </p>
            <p>
              <input type="checkbox" class="checkbox" name id />
              <label></label>ATM轉帳
            </p>
            <p>
              <input type="checkbox" class="checkbox" name id />
              <label></label>貨到付款
            </p>
          </div>
          <div class="btn-box">
            <button type="button" class="btn">上一步</button>
            <button type="button" class="btn">下一步</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>