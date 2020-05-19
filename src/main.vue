<template>
  <div id="app">
    <!-- 4. 傳遞 memberStatus 的值（login）到子層 -->
    <!-- b. 接到子層的 logout 的值，傳進 checkLogin 方法 -->
    <Navbar :memberStatus="login" @logout="checkLogin" />
    <keep-alive>
      <!-- 2. 接到子層的 loginStatus 的值，傳進 checkLogin 方法 -->
      <!-- (blog)b. 接到子層的 blogInf 的事件，傳進 blogInfMethod 方法 -->
      <!-- (blog)d. 傳遞 blogInf 的值（blog）到子層的 blogInfProps -->
      <router-view
        @loginStatus="checkLogin"
        @blogInf="blogInfMethod"
        :blogInfProps="blog"
        :c="c"
      />
    </keep-alive>
  </div>
</template>
<script>
export default {
  data() {
    return {
      login: false,
      blog: [],
      c: '',
    };
  },
  methods: {
    // 3. c. 接到 loginStatus 的值（status），傳給 login
    checkLogin(status) {
      this.login = status;
    },
    // 3. c.(blog) 接到 blogInf 的值（b），傳給 this.blog
    blogInfMethod(b) {
      // this.blog = b.aa;
      // this.c=b.bb
      this.blog = b;
    },
  },
};
</script>
