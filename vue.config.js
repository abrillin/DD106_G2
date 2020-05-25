module.exports = {
  // publicPath: "/demo-projects/DD106/DD106G2/",
  productionSourceMap: false,
  pages: {
    main: {
      entry: './src/mainPage.js',
      template: './public/main.html',
    },
    index: {
      entry: './src/indexPage.js',
      template: './public/index.html',
    },
    admin: {
      entry: './src/adminPage.js',
      template: './public/admin.html',
    },
  },
  devServer: {
    disableHostCheck: true,
    proxy: {
      "/api": {
        target: "http://localhost",
        ws: true,
        changeOrigin: true,
        autoRewrite: true,
      },
    },
  },
}
