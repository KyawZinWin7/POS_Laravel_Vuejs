import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import Vant from 'vant'
import VueApexCharts from 'vue-apexcharts'
import Verte from 'verte'
import './firebase'

Vue.component('verte', Verte)
Vue.use(VueApexCharts)
Vue.use(Vant)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('apexchart', VueApexCharts)
