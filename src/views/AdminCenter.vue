<template>
  <div class="msContainer">
    <div class="msFrame">
      <aside class="msSideBar">
        <ul>
          <img class="mng_logo" src="@/assets/LOGO.svg" alt />
          <span class="admin_name">
            園長
            <span class="adminNameColor">{{admin.name}}</span> 巡邏中
            <button @click="logOut">
              <span>下班</span>
            </button>
          </span>

          <li>
            <router-link to="/admin/center/manage">管理員管理</router-link>
          </li>
          <li>
            <router-link to="/admin/center/fan">果粉管理</router-link>
          </li>
          <li>
            <router-link to="/admin/center/seller">果農管理</router-link>
          </li>
          <li>
            <router-link to="/admin/center/ency">知識百科管理</router-link>
          </li>
          <!-- <li>
            <router-link to="/admin/center/blog">果農日誌管理</router-link>
          </li>-->
          <li>
            <router-link to="/admin/center/comment">日誌留言管理</router-link>
          </li>
        </ul>
      </aside>
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      login: false,
      admin: {
        name: ""
      }
    };
  },
  created() {
    const api = this.path + "api_adminStatus.php";

    this.$http.post(api).then(res => {
      const data = res.data;

      this.admin.name = res.data.name;
    });
  },
  methods: {
    logOut() {
      // 抓sessoin裡面的管理員資料
      // 如果有東西就清除 接著回到導入頁
      const api = this.path + "api_adminStatus.php";

      this.$http.post(api).then(res => {
        const data = res.data;

        if (data.admin_no != "") {
          const api = this.path + "api_adminLogOut.php";

          this.$http.post(api);
          this.login = false;
          this.name = "";
          localStorage.clear();

          // this.$emit("logOut", false);
          // 要跟navbar說我要登出ㄌ 但這邊沒有該父元素所以不用寫

          alert(" 閃人囉，掰掰！！！ (๑´ỏ｀๑)zZ ");
          this.$router.push("/");
        }
      });
    }
  }
};
</script>
