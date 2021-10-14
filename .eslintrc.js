module.exports = {
  env: {
    browser: true,
    es2021: true
  },
  extends: [
    "plugin:vue/essential",
    "plugin:prettier/recommended",
    "eslint:recommended"
  ],
  parserOptions: {
    parser: "babel-eslint",
    ecmaVersion: 12,
    sourceType: "module"
  },
  rules: {
    "no-undef": "off",
    "vue/no-mutating-props": "off",
    "max-len": "off",
    "import/extensions": "off",
    "no-unused-vars": "off",
    "import/no-extraneous-dependencies": "off",
    "prefer-destructuring": "off",
    "import/no-unresolved": "off",
    "no-console": "off",
    "no-restricted-globals": "off",
    "no-shadow": "off",
    "import/no-dynamic-require": "off",
    "import/prefer-default-export": "off",
    "global-require": "off",
    "vue/no-parsing-error": "off",
    "no-use-before-define": "off"
  }
};
