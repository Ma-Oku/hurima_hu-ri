import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue')
  },
  {
    path: '/signup',
    name: 'Signup',
    component: () => import('../views/Signup.vue')
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/Login.vue')
  },
  {
    path: '/product/registra',
    name: 'ProductRegistra',
    component: () => import('../views/ProductRegistra.vue')
  },
  {
    path: '/newproduct',
    name: 'NewProduct',
    component: () => import('../views/NewProductList.vue')
  },
  {
    path: '/product/list',
    name: 'ProductList',
    component: () => import('../views/ProductList.vue')
  },
  {
    path: '/product/:id',
    name: 'Product',
    component: () => import('../views/Product.vue')
  },
  {
    path: '/product/edit/:id',
    name: 'ProductEdit',
    component: () => import('../views/ProductEdit.vue')
  },
  {
    path: '/order/registra/:id',
    name: 'OrderRegistra',
    component: () => import('../views/OrderRegistra.vue')
  },
  {
    path: '/user/:id',
    name: 'UserPage',
    component: () => import('../views/UserPage')
  },
  {
    path: '/account',
    name: 'Account',
    component: () => import('../views/Account')
  },
  {
    path: '/account/infochange',
    name: 'AccountInfoChange',
    component: () => import('../views/AccountInfoChange')
  },
  {
    path: '/order/list',
    name: 'OrderList',
    component: () => import('../views/OrderList.vue')
  },
  {
    path: '/order/:id',
    name: 'Order',
    component: () => import('../views/Order.vue')
  },
  {
    path: '/error',
    name: 'Error',
    component: () => import('../views/Error.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
