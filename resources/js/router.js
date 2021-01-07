import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import home from './components/Home/Home'
import profile from './components/Profile/Index'

const routes = [
    {
        path: '/home',
        component: home
    },
    {
        path: '/profile',
        component: profile
    }
]

export default new Router({
    mode: 'history',
    routes
})