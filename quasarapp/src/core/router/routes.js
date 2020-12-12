import store from '../store'

const beforeEnter = (to, from, next) => {
  if (store().state.token) {
    next({ path: '/' })
  } else {
    // console.log(to, from)
  }
  next()
}


const routes = [
  {
    path: '/',
    component: () => import('core/layouts/MainLayout.vue'),
    meta: { auth: true },
    children: [
      { path: '', component: () => import('core/pages/Index.vue') }
    ]
  },

  {
    path: '/auth',
    name: 'auth',
    component: () => import('core/pages/auth/Auth.vue'),
    redirect: '/auth/login',
    children: [
      {
        path: 'login',
        name: 'auth.login',
        component: () => import('core/pages/auth/Login.vue'),
        meta: { title: 'Login' },
        beforeEnter: (to, from, next) => beforeEnter(to, from, next)
      },
    ],
  },

]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    // meta: { auth: true },
    component: () => import('core/pages/Error404.vue')
  })
}

export default routes
