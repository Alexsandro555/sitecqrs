
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vuetify from 'vuetify';
Vue.use(Vuetify);
import 'vuetify/dist/vuetify.min.css'

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('app', require('./components/app/Index.vue'));

const app = new Vue({
    el: '#app',
    data: {
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
        ]
    }
});
