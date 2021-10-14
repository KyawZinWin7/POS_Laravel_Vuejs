import Vue from 'vue'
import DashboardNav from '@/layouts/DashboardNav'
import Sidebar from '@/layouts/Sidebar'
import Input from './Input'
import MultiInput from './MultiInput'
import Uploader from './Uploader'
import Button from './Button'
import ErrorMessage from './ErrorMessage'
import helpers from './helpers'
import Svg from './Svg'
import FrontendNav from '@/layouts/FrontendNav'
import FrontendFooter from '@/layouts/FrontendFooter'
import PreviewSvg from '@/layouts/PreviewSvg'
import ColorPicker from '@/layouts/ColorPicker'

window.getErrors = helpers.getErrors
window.$helpers = helpers
Vue.component('LeftSidebar', Sidebar)
Vue.component('DashboardNav', DashboardNav)
Vue.component('Input', Input)
Vue.component('MultiInput', MultiInput)
Vue.component('Uploader', Uploader)
Vue.component('Button', Button)
Vue.component('ErrorMessage', ErrorMessage)
Vue.component('b-svg', Svg)
Vue.component('FrontendNav', FrontendNav)
Vue.component('FrontendFooter', FrontendFooter)
Vue.component('PreviewSvg', PreviewSvg)
Vue.component('ColorPicker', ColorPicker)
