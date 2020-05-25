<template>
  <div class="FarmOrder">
    <div class="FarmOrder_head">
      <div class="FarmOrder_head_text">
        <h2>商品管理</h2>
      </div>
    </div>
    <div class="plusbutton">
      <div class="plus">
        <router-link to="/main/farm/product">
          <p>新增商品</p>
        </router-link>
      </div>
    </div>
    <div class="FarmOrder_bottom">
      <div class="list_1">
        <div class="bottomheader">
          <table class="orderTab">
            <thead id="thead">
              <tr>
                <th>商品編號</th>
                <th>名稱</th>
                <th>價格</th>
                <th>上傳時間</th>
                <th>上架狀態</th>
              </tr>
              <tr v-for="item in member" :key="item.no">
                <td>{{ item.no }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.price }}</td>
                <td>{{ item.date }}</td>
                <td>
                  <input
                    class="statusBtn"
                    type="checkbox"
                    :id="'switch' + item.no"
                    v-model="item.status"
                  />
                  <label
                    class="statusBtnLabel"
                    :for="'switch' + item.no"
                    @click="toggleStatus(item.no, item.status)"
                    >Toggle</label
                  >
                </td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
//
<script>
import $ from "jquery";
export default {
  data() {
    return {
      member: [],
    };
  },
  created() {
    const api = this.path + "api_farmorder.php";
    this.$http.post(api).then((res) => {
      const data = res.data;
      if (data != "") {
        this.member = data;

        data.forEach((i) => {
          i.status = parseInt(i.status);
        });
      }
    });
  },
  mounted() {
    $(".statuslable").click(function() {
      $(this)
        .find(".after")
        .toggleClass("scrol");

      if ($(".after").hasClass("scrol")) {
        $(this).addClass("color");
      } else {
        $(this).removeClass("color");
      }
    });
  },
  methods: {
    toggleStatus(no, status) {
      const api = this.path + "api_itemUpdate.php";
      let s;

      // 如果狀態是 1 (上架) 則切換成 0 (下架)
      if (status == 1) {
        s = 0;
      } else if (status == 0) {
        s = 1;
      }

      // 發送到 DB 更新商品的狀態
      this.$http.post(api, JSON.stringify({ no: no, status: s }));
    },
  },
};
</script>
