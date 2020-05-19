import Vue from "vue";

//註冊全域共用元件
Vue.component("ButtonMore", () => import("@/components/buttonMore"));
Vue.component("Navbar", () => import("@/layout/navbar"));
Vue.component("Footer", () => import("@/layout/footer"));
