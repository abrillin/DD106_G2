<template>
  <div class="FarmBlog">
    <div class="FarmBlog_head">
      <div class="FarmBlog_head_text">
        <h2>日誌管理</h2>
      </div>
    </div>
    <div class="plusbutton">
      <div class="plus">
        <router-link to="/main/farm/blogupdate">
          <p>新增日誌</p>
        </router-link>
      </div>
    </div>
    <div class="FarmBlog_bottom">
      <div class="list_1">
        <div class="bottomheader">
          <table class="blogTab">
            <thead>
              <tr>
                <th>日誌編號</th>
                <th>標題</th>
                <th>內容</th>
                <th>發文時間</th>
                <th>狀態</th>
              </tr>
              <tr>
                <td>xxxx</td>
                <td>出發囉！賞螢採梅尋浪...</td>
                <td>台南梅嶺，這是一個有...</td>
                <td>2020-04-16 11:22</td>
                <td></td>
                <!-- <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                                        for="switch">Toggle<div class="after"></div></label></p> -->
              </tr>
            </thead>
          </table>
        </div>

        <!-- <div class="Blogputon">
                    <p class="title">狀態</p>
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
<script>
import $ from "jquery";
export default {
  mounted() {
    $(".statuslable").click(function() {
      $(".after").removeClass("scrol");
      $(this)
        .find(".after")
        .toggleClass("scrol");
      if ($(".after").hasClass("scrol")) {
        $(".statuslable").removeClass("color");
        $(this).addClass("color");
      } else {
        $(this).removeClass("color");
      }
    });
  },
};
</script>
