import Vue from 'vue';
import App from './main.vue';
import router from './router';
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
  render: function (h) {
    return h(App);
  },
}).$mount('#app');

router.beforeEach((to, from, next) => {
  
  if (to.meta.requiresAuth) {

    const api = Vue.prototype.path + "api_memberStatus.php";
    axios.post(api).then(response => {

      if (response.data.no) {
        next();
      } else {
        next({
          path: '/loginMember'
        });
      }
    });

  } else next();

});