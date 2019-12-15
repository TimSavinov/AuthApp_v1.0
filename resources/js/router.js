import VueRouter from 'vue-router';

import Home from '@/js/pages/HomePage';
import Login from '@/js/pages/LoginPage';
import Register from '@/js/pages/RegisterPage';

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  }
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router;