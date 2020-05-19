import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "*",
    redirect: "/admin",
  },
  {
    path: "/admin",
    name: "Home",
    component: () => import("@/views/AdminLogin.vue"),
  },
  {
    path: "/admin/center",
    name: "Center",
    component: () => import("@/views/AdminCenter.vue"),
    children: [
      {
        path: "manage",
        name: "Manage",
        component: () => import("@/views/AdminManage.vue"),
      },
      {
        path: "addAdmin",
        name: "AddAdmin",
        component: () => import("@/views/AddAdmin.vue"),
      },
      {
        path: "fan",
        name: "Fan",
        component: () => import("@/views/AdminFanManage.vue"),
      },
      {
        path: "seller",
        name: "Seller",
        component: () => import("@/views/AdminSellerManage.vue"),
      },
      {
        path: "ency",
        name: "Ency",
        component: () => import("@/views/AdminEncyManage.vue"),
      },
      {
        path: "encyEdit",
        name: "EncyEdit",
        component: () => import("@/views/AdminEncyEdit.vue"),
      },
      {
        path: "blog",
        name: "Blog",
        component: () => import("@/views/AdminBlog.vue"),
      },
      {
        path: "comment",
        name: "Comment",
        component: () => import("@/views/AdminComment.vue"),
      },
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

const routerPush = VueRouter.prototype.push;

VueRouter.prototype.push = function push(location) {
  return routerPush.call(this, location).catch((error) => error);
};

export default router;
