<template>
    <div>
        <v-btn dark class="hidden-md-and-up" @click="open"><v-icon>reorder</v-icon></v-btn>
        <v-navigation-drawer v-model="drawer" temporary absolute dark style="position:fixed; top:0; left:0; overflow-y:scroll;">
            <v-toolbar flat>
                <v-list class="pa-0">
                    <v-list-tile>
                        Страницы
                    </v-list-tile>
                </v-list>
            </v-toolbar>
            <v-list>
                <v-list-tile>О компании</v-list-tile>
                <v-list-tile>Новости</v-list-tile>
                <v-list-tile>Оборудование</v-list-tile>
                <v-list-tile>Доставка и оплата</v-list-tile>
                <v-list-tile>Контакты</v-list-tile>
                <v-subheader>Рубрикатор</v-subheader>
            </v-list>
            <v-divider></v-divider>
            <v-toolbar flat>
                <v-list>
                    <v-list-tile>
                        Рубрики
                    </v-list-tile>
                </v-list>
            </v-toolbar>
        </v-navigation-drawer>
    </div>
</template>
<script>
    import { mapGetters, mapActions, mapState, mapMutations } from 'vuex'
    export default {
        props: {},
        data: function() {
            return {
                drawer: false
            }
        },
        computed: {
            //...mapState('name_module', ['item']),
            //...mapGetters('name_module', {}),
        },
        methods: {
            open() {
                this.drawer = !this.drawer
            }
            //...mapActions('name_module',{load: ACTIONS.LOAD, save: ACTIONS.SAVE_DATA)
        }
     }
</script>