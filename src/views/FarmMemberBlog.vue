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
              <tr v-for="item in member" :key="item.no">
                <td>{{item.no}}</td>
                <td>{{item.title}}</td>
                <td>{{item.content}}</td>
                <td>{{item.date}}</td>
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
                  >Toggle</label>
                </td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
import { log } from "three";
export default {
  data() {
    return {
      member: []
    };
  },
  created() {
    const api = "/api/api_farmblog.php";
    this.$http.post(api).then(res => {
      const data = res.data;
      if (data != "") {
        this.member = data;
      }
    });
  },
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
  methods: {
    toggleStatus(no, status) {
      const api = "/api/api_blogUpdate.php";
      let s;

      // 如果狀態是 1 (上架) 則切換成 0 (下架)
      if (status == 1) {
        s = 0;
      } else if (status == 0) {
        s = 1;
      }

      // 發送到 DB 更新日誌的狀態
      this.$http.post(api, JSON.stringify({ no: no, status: s }));
    }
  }
};
</script>
