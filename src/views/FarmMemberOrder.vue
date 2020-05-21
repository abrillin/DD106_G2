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
            <thead>
              <tr>
                <th>商品編號</th>
                <th>名稱</th>
                <th>價格</th>
                <th>上傳時間</th>
                <th>上架狀態</th>
              </tr>
              <tr>
                <td>xxxx</td>
                <td>慶中秋!台南玉璽文旦...</td>
                <td>200</td>
                <td>2020-04-16 11:22</td>
                <td></td>
                <!-- <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                                        for="switch">Toggle<div class="after"></div></label></p> -->
              </tr>
            </thead>
          </table>
        </div>

        <!-- <div class="Orderputon">
                    
                   
                    
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                </div> -->
      </div>

      <!-- <div class="pagination_block">
        <ul class="pagination">
          <li><a href="#">&lt;</a></li>
          <li><a href="#" class="-on">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">6</a></li>
          <li><a href="#">7</a></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><a href="#">10</a></li>
          <li><a href="#">&gt;</a></li>
        </ul>
      </div> -->
    </div>
  </div>
</template>
//
<script>
import $ from "jquery";
export default {
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
};
</script>
