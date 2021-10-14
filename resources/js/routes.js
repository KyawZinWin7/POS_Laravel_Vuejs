import NoneAuthRoutes from './routes_none_auth'
export const routes = [
  {
    path: '/login',
    component: render('auth/Login'),
  },
  {
    path: '/register',
    component: render('auth/Register'),
  },
  {
    path: '',
    component: render('MainApp'),
    children: NoneAuthRoutes,
  },
  {
    path: '/company/registration',
    component: render('company-register/RegistrationSteps'),
  },
  {
    path: '/pricing',
    component: render('company-register/ChoosePlan'),
    meta: {},
  },
  {
    path: '/404',
    component: render('ErrorPage'),
  },
]

function render(template) {
  return require(`@/pages/${template}.vue`).default
}
