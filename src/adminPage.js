import Vue from "vue";
import App from "./admin.vue";
import router from "./router/admin";
import axios from "axios";

import "@/js/components";
import "@/style/main.scss";

Vue.config.productionTip = false;

Vue.prototype.$http = axios;

new Vue({
  router,
  render: function(h) {
    return h(App);
  },
}).$mount("#app");
