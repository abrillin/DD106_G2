import Vue from 'vue';
import App from './index.vue';
import "@/js/components";
import "@/style/main.scss";

Vue.config.productionTip = false;

new Vue({
  render: function (h) { return h(App); }
}).$mount('#app');
