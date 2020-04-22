module.exports = {
  root: true,
  env: {
    node: true
  },
  'extends': [
    'plugin:vue/essential'
    // 'eslint:recommended'
  ],
  parserOptions: {
    ecmaVersion: 2020
  },
  "rules": {
    // "space-before-function-paren": 0,
    // "no-trailing-spaces": "warn",
    // "no-unused-vars": "warn",
    // "vue/no-unused-vars": "warn",
    // "indent": [
    //   "warn",
    //   2
    // ],
    "vue/no-unused-components": ["error", {
      "ignoreWhenBindingPresent": true
    }],
    "no-console": 1,
    "no-const-assign": 2,
    "no-param-reassign": 2,
    "no-use-before-define": 2,
    "no-void": 2,
    // "no-var": 1,
    "camelcase": 2,
    "default-case": 2,
    "semi": [
      1,
      "always"
    ]
  },
}