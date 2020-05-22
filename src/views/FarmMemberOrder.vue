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
                <td>{{item.no}}</td>
                <td>{{item.name}}</td>
                <td>{{item.price}}</td>
                <td>{{item.date}}</td>
                <td><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                                        for="switch">Toggle<div class="after"></div></label></td>
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
        member: {
          no: "",
          name: "",
          price: "",
          date: "",
        },
      };
    },
    created() {
      const api = "/api/api_farmorder.php";
      this.$http.post(api).then((res) => {
        const data = res.data;
        console.log(res.data)
        if (data != "") {
          
          this.member = data;
          console.log(this.member)
        }
      });
    },
    mounted() {
      $(".statuslable").click(function () {
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
  };
</script>