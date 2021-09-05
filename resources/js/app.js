/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import router from './router'

import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.config.ignoredElements = [/^ion-/]

//Events
let Event = new Vue()
window.Event = Event;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('side-nav-left', require('./components/Navigation/SideBarLeft.vue').default);
Vue.component('side-nav-right', require('./components/Navigation/SideBarRight.vue').default);
Vue.component('home', require('./components/Home/Home.vue').default);
Vue.component('profile', require('./components/Profile/Index.vue').default);
Vue.component('like', require('./components/LikeDislike/Like.vue').default);
Vue.component('dislike', require('./components/LikeDislike/Dislike.vue').default);

Vue.component('reactions', require('./components/Reactions.vue').default);
Vue.component('wildcat-svg', require('./components/Wildcat.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
