import Vue from 'vue';
import App from './main.vue';
import router from './router';
import axios from "axios";

import "@/js/components";
import "@/style/main.scss";

Vue.config.productionTip = false;

Vue.prototype.$http = axios;

new Vue({
  router,
  render: function (h) {
    return h(App);
  },
}).$mount('#app');

router.beforeEach((to, from, next) => {
  
  if (to.meta.requiresAuth) {

    const api = "/api/api_memberStatus.php";
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