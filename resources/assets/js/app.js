import sliderFullPage from "./store/modules/slider-full-page/state";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Импорт основных библиотек
window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);
import Vuetify from 'vuetify';
Vue.use(Vuetify);

import VueCarousel from 'vue-carousel';

// Импорт CSS-файлов, которые могут потребоваться
import 'material-design-icons/iconfont/material-icons.css'
import 'vuetify/dist/vuetify.min.css'

// создание хранилища
import createStore from './vuex/states.js'

import VueRouter from 'vue-router';
Vue.use(VueRouter);


import site from './components/site';

// Глобальные компоненты доступные в любом месте
Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('site', require('./components/site/Index.vue'));
Vue.component('app', require('./components/app/Index.vue'));
//Vue.component('cart-widget', require('../../../Modules/Cart/Resources/assets/js/components/cart/widget'));
Vue.component('dialog-registration', require('./components/auth/register'));
Vue.component('dialog-login', require('./components/auth/login'));
Vue.component('auth-widget', require('./components/auth/login-widget'));
Vue.component('leader-slider', require('./components/leader/slider'));
Vue.component('leader-detail-image', require('./components/leader/leader-detail-image'));
Vue.component('left-menu', require('./components/menu/LeftMenu'));
Vue.component('cart-widget', require('@cart/vue/Widget'));
import Wysiwyg from '@/components/wysiwyg/Index'
Vue.component('wysiwyg', Wysiwyg)
import Notifications from '@/vue/Notifications.vue'
Vue.component('notifications', Notifications)
import NamvigationMenu  from '@/vue/NavigationMenu.vue'
Vue.component('navigation-menu', NamvigationMenu)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/* Возможно код ниже следуе вынести в отдельный файл route.js */
import listCategories from './components/product/category/list';
import listLineProducts from './components/product/line-product/list';
import listTypeProducts from './components/product/type-product/list';
import listProducers from './components/product/producer/list';
import listAttributes from './components/product/attribute/list';
import bindAttributes from './components/product/attribute/binding';
import typeFiles from './components/files/type-file';
import banner from '../../../Modules/Banner/Resources/assets/js/Banner';
import tnved from './components/product/tnved/list';
import swal from 'sweetalert';
import initializer from "./store/modules/initializer";
import EditArticle from "@article/vue/Edit"
import Articles from "@article/vue/Articles"
import Products from "@catalog/vue/Products"
import EditCatalog from "@catalog/vue/Edit"

const routes = [
    {path: '/', name: 'products', component: Products},
    {
        path: '/catalog/edit/:id',
        name: 'edit-catalog',
        component: EditCatalog,
        props: true
    },
    {path: '/categories', name: 'categories', component: listCategories},
    {path: '/list-line-products', name: 'list-line-products', component: listLineProducts},
    {path: '/list-type-products', name: 'list-type-products', component: listTypeProducts},
    {path: '/list-producers', name: 'list-producers', component: listProducers},
    {path: '/list-attributes', name: 'list-attributes', component: listAttributes},
    {path: '/bind-attributes', name: 'bind-attributes', component: bindAttributes},
    {path: '/type-files', name: 'type-files', component: typeFiles},
    {path: '/banner', name: 'banner', component: banner},
    {path: '/tnved', name: 'tnved', component: tnved},
    //{path: '/testForm/:id', name: 'test-form', component: product},
    {
        path: '/article/edit/:id',
        name: 'edit-article',
        component: EditArticle,
        props: true
    },
    {path: '/articles', name: 'articles', component: Articles}
];

const router = new VueRouter({
    routes,
    //mode: 'history',
    base: 'admin'
})

const app = new Vue({
    el: '#app',
    $_veeValidate: {
        validator: 'new'
    },
    router,
    store: new Vuex.Store(createStore()),
    data: {
        drawer: null,
    },
    components: {
      site
    },
    computed: {
        chickens() {
          return this.$store.state.sliderFullPage.slides.chickens
        },
        cows() {
          return this.$store.state.sliderFullPage.slides.cows
        },
        pigs() {
            return this.$store.state.sliderFullPage.slides.pigs
        },
        rams() {
            return this.$store.state.sliderFullPage.slides.rams
        },
        main() {
            return this.$store.state.sliderFullPage.slides.main
        },
    },
    created() {
        this.$store.dispatch('initializer/init')
    },
    methods: {
        login() {
            // если client аутентифицирован уже
            if(this.$store.getters['auth/getAdmin']) {
                // отображаем панель администрирования
                this.$store.dispatch('auth/adminView')
                this.$router.push('admin')
            }
            else {
                this.$store.dispatch('auth/active')
            }
        },
        addCart(id) {
            this.$store.dispatch('cart/add', { id })
        },
        changeSlide(val) {
            this.$store.dispatch('sliderFullPage/change',val)
        }
    }
});

/*router.beforeEach((to, from, next) => {
    if(localStorage.getItem('isAdmin') !== true) {
        console.log(this.$store)
        //this.$store.dispatch('auth/disableAdminView')
    }
})*/