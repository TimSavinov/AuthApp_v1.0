/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

import ('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify';


import VueAxios from 'vue-axios'
import 'es6-promise/auto'
import axios from 'axios'


import VueAuth from '@websanova/vue-auth'
import auth from './auth'

import App from '@/js/views/App';

import VueRouter from 'vue-router'
import router from './router'


Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`

Vue.use(VueAuth, auth)

Vue.router = router
Vue.use(VueRouter)

Vue.use(Vuetify)
const vuetify = new Vuetify({
    theme: {
        dark: true,
        themes: {
          dark: {
            primary: '#31E16E',
            accent: '#E9FF40',
            secondary: '#FFE18D',
            success: '#7CE102',
            info: '#841D9F',
            warning: '#DEFB00',
            error: '#E82626'
          },
          light: {
            primary: '#1976D2',
            accent: '#e91e63',
            secondary: '#30b1dc',
            success: '#4CAF50',
            info: '#2196F3',
            warning: '#FB8C00',
            error: '#FF5252'
          }
        }
    }
});

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    render: h => h(App),
});

export default app;