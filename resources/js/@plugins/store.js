import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    theme: window.$themeColor,
  },
  mutations: {
    setTheme(state, value) {
      state.theme = value
    },
  },
})

export default store
