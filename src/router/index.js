import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "*",
    redirect: "/main",
  },
  {
    path: "/main",
    name: "Home",
    component: () => import("@/views/Home.vue"),
  },
  {
    path: "/main/book",
    name: "Book",
    component: () => import("@/views/Book.vue"),
    children: [
      {
        path: "bookIndex",
        name: "Index",
        component: () => import("@/views/BookIndex.vue"),
      },
      {
        path: "bookContent",
        name: "BookContent",
        component: () => import("@/views/BookContent.vue"),
      },
    ],
  },
  {
    path: "/main/blog-post",
    name: "Blog-post",
    component: () => import("@/views/Blog-post.vue"),
  },
  {
    path: "/main/blog",
    name: "Blog-post2",
    component: () => import("@/views/Blog-post2.vue"),
  },
  {
    path: "/main/blog/landing",
    name: "Blog-landing",
    component: () => import("@/views/Blog-landing.vue"),
  },
  {
    path: "/main/blog-post3",
    name: "Blog-post3",
    component: () => import("@/views/Blog-post3.vue"),
  },
  {
    path: "/main/shop",
    name: "Shop",
    component: () => import("@/views/Shop.vue"),
  },
  {
    path: "/main/shopitem",
    name: "Shopitem",
    component: () => import("@/views/ShopItem.vue"),
  },
  {
    path: "/loginMember",
    name: "LoginMember",
    component: () => import("@/views/MemberLogin.vue"),
  },

  {
    path: "/main/member",
    name: "Member",
    component: () => import("@/views/Member.vue"),
    children: [
      {
        // children 指的是 member router（路由）內的"子頁"，例如網址只要符合 /member/information 就會嵌入 Member.vue 樣板及 Information.vue 元件
        path: "information",
        name: "Information",
        meta: {
          requiresAuth: true,
        },
        component: () => import("@/views/MemberInfo.vue"),
      },
      {
        path: "update",
        name: "Update",
        component: () => import("@/views/MemberUpdate.vue"),
      },
      {
        path: "order",
        name: "Order",
        component: () => import("@/views/MemberOrder.vue"),
      },
      {
        path: "track",
        name: "Track",
        component: () => import("@/views/MemberTrack.vue"),
      },
      {
        path: "shopping",
        name: "Shopping",
        meta: {
          requiresAuth: true,
        },
        component: () => import("@/views/MemberShopping.vue"),
      },
      {
        path: "checkInfo",
        name: "CheckInfo",
        component: () => import("@/views/MemberCheckInfo.vue"),
      },
      {
        path: "payInfo",
        name: "PayInfo",
        component: () => import("@/views/MemberPayInfo.vue"),
      },
      {
        path: "farmRegistered",
        name: "FarmRegistered",
        component: () => import("@/views/FarmRegistered.vue"),
      },
    ],
  },

  {
    path: "/main/farm",
    name: "Farm",
    component: () => import("@/views/FarmMember.vue"),
    children: [
      {
        path: "info",
        name: "Info",
        component: () => import("@/views/FarmMemberInfo.vue"),
      },
      {
        path: "update",
        name: "FarmUpdate",
        component: () => import("@/views/FarmMemberupdate.vue"),
      },
      {
        path: "order",
        name: "FarmOrder",
        component: () => import("@/views/FarmMemberOrder.vue"),
      },
      {
        path: "Product",
        name: "Product",
        component: () => import("@/views/FarmMemberProductUpdate.vue"),
      },
      {
        path: "blog",
        name: "FarmBlog",
        component: () => import("@/views/FarmMemberBlog.vue"),
      },
      {
        path: "blogupdate",
        name: "BlogUpdate",
        component: () => import("@/views/FarmMemberBlogUpdate.vue"),
      },
      {
        path: "list",
        name: "List",
        component: () => import("@/views/FarmMemberList.vue"),
      },
      {
        path: "listupdate",
        name: "ListUpdate",
        component: () => import("@/views/FarmMemberListUpdate.vue"),
      },
    ],
  },
  {
    path: "/admin",
    name: "AdminLogin",
    component: () => import("@/views/AdminLogin.vue"),
  },
  {
    path: "/center",
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
  // mode: "history",
  base: process.env.BASE_URL,
  routes,
});

const routerPush = VueRouter.prototype.push;

VueRouter.prototype.push = function push(location) {
  return routerPush.call(this, location).catch((error) => error);
};

export default router;
