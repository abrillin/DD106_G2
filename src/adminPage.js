import Vue from "vue";
import App from "./admin.vue";
import router from "./router/admin";
import axios from "axios";

import "@/js/components";
import "@/style/main.scss";

Vue.config.productionTip = false;

Vue.prototype.$http = axios;
// Vue.prototype.path = "/demo-projects/DD106/DD106G2/api/";
Vue.prototype.path = "/api/";
Vue.prototype.img = "/api/";

new Vue({
  router,
  render: function(h) {
    return h(App);
  },
}).$mount("#app");
