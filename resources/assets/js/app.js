
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
import Vuetify from 'vuetify';
Vue.use(Vuetify);
import 'material-design-icons/iconfont/material-icons.css'
import 'vuetify/dist/vuetify.min.css'
import createStore from './store/states.js'

import VueRouter from 'vue-router';
Vue.use(Vuex);
Vue.use(VueRouter);

import site from './components/site';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('site', require('./components/site/Index.vue'));
Vue.component('app', require('./components/app/Index.vue'));
Vue.component('cart-widget', require('../../../Modules/Cart/Resources/assets/js/components/cart/widget'));
Vue.component('dialog-registration', require('./components/auth/register'));
Vue.component('dialog-login', require('./components/auth/login'));
Vue.component('auth-widget', require('./components/auth/login-widget'));
//Vue.component('tableProducts', require('./components/table-products'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/* Возможно код ниже следуе вынести в отдельный файл route.js */
import tableProducts from './components/product/table-products';
import updateProduct from './components/product/create';
import listLineProducts from './components/product/line-product/list';
import listTypeProducts from './components/product/type-product/list';
import listProducers from './components/product/producer/list';
import listAttributes from './components/product/attribute/list';
import bindAttributes from './components/product/attribute/binding';
import typeFiles from './components/files/type-file';

const routes = [
    //{path: '/', name: 'site', component: site},
    {path: '/admin', name: 'table-products', component: tableProducts},
    {path: '/admin/update-product/:id', name: 'update-product', component: updateProduct},
    {path: '/admin/list-line-products', name: 'list-line-products', component: listLineProducts},
    {path: '/admin/list-type-products', name: 'list-type-products', component: listTypeProducts},
    {path: '/admin/list-producers', name: 'list-producers', component: listProducers},
    {path: '/admin/list-attributes', name: 'list-attributes', component: listAttributes},
    {path: '/admin/bind-attributes', name: 'bind-attributes', component: bindAttributes},
    {path: '/admin/type-files', name: 'type-files', component: typeFiles}
];
//import routes from './routes';

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,
    store: new Vuex.Store(createStore()),
    data: {
        //isAdminView: false,
        drawer: null,
        items: [
            {
                title: 'Attractions',
                submenu: [
                    {
                        title: 'List Item',
                        recept: [
                            { header: 'Today' },
                            { avatar: 'https://vuetifyjs.com/static/doc-images/lists/1.jpg', title: 'Brunch this weekend?', subtitle: "<span class='text--primary'>Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?" },
                            { divider: true, inset: true },
                            { avatar: 'https://vuetifyjs.com/static/doc-images/lists/2.jpg', title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>', subtitle: "<span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend." },
                            { divider: true, inset: true },
                            { avatar: 'https://vuetifyjs.com/static/doc-images/lists/3.jpg', title: 'Oui oui', subtitle: "<span class='text--primary'>Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?" },
                            { divider: true, inset: true },
                            { avatar: 'https://vuetifyjs.com/static/doc-images/lists/4.jpg', title: 'Birthday gift', subtitle: "<span class='text--primary'>Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?" },
                            { divider: true, inset: true },
                            { avatar: 'https://vuetifyjs.com/static/doc-images/lists/5.jpg', title: 'Recipe to try', subtitle: "<span class='text--primary'>Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos." }
                        ]
                    },
                ],
                active: true
            },
            {
                title: 'Dining',
                submenu: [
                    {
                        title: 'Breakfast & brunch',
                        recept: [
                            {title: 'Eag'},
                            {title: 'Meat'},
                            {title: 'Sugar'}
                        ]
                    },
                    {
                        title: 'New American',
                        recept: [
                            {title: 'Bronx'},
                            {title: 'Avenu'}
                        ]
                    },
                    {title: 'Sushi'}
                ],
                active: true
            },
            {
                title: 'Education',
                submenu: [
                    {title: 'List Item'},
                    {title: 'Three-Two'}
                ],
                active: true
            },
        ],
        menus: [
            {
                title: 'Птицеводство',
                active: true,
                submenu: [
                    {
                        title: 'Кормление',
                        active: true,
                        items: [
                            {
                                title: 'Подпункт меню 1',
                            },
                            {
                                title: 'Подпункт меню 2',
                            },
                            {
                                title: 'Подпункт меню 3',
                            }
                        ]
                    },
                    {
                        title: 'Обогрев',
                        active: true
                    }
                ],
            },
            {
                title: 'Свиноводство',
                active: true
            },
            {
                title: 'Скотоводство',
                active: true
            },
            {
                title: 'Прочее',
                active: true
            }
        ]
    },
    components: {
      site
    },
    mounted() {
    },
    computed: {
      isAdminView() {
          return this.$store.state.auth.isAdminView;
      },
      isAdmin() {
          return this.$store.state.auth.isAdmin;
      }
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
        }
    }
});

/*router.beforeEach((to, from, next) => {
    if(localStorage.getItem('isAdmin') !== true) {
        console.log(this.$store)
        //this.$store.dispatch('auth/disableAdminView')
    }
})*/