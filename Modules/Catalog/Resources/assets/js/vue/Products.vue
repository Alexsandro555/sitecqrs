<template>
    <v-container flud grid-list-md>
        <v-layout wrap row>
            <v-flex offset-xs2 xs8>
                <v-card width="1200px">
                    <v-card-title>
                        Продукты
                        <v-spacer></v-spacer>
                        <v-text-field
                                v-model="search"
                                append-icon="search"
                                label="Поиск"
                                single-line
                                hide-details
                        ></v-text-field>
                    </v-card-title>
                    <v-card-text>
                        <v-data-table :headers="headers"
                                      :items="items"
                                      :search="search"
                                      class="elevation-1">
                            <template slot="items" slot-scope="props">
                                <td>{{ props.item.id }}</td>
                                <td class="text-xs-left">{{ props.item.title }}</td>
                                <td class="text-xs-left">{{ props.item.price }}</td>
                                <td class="justify-center layout px-0">
                                    <v-btn @click="goToPage(props.item.url_key)" icon class="mx-0">
                                        <v-icon>find_in_page</v-icon>
                                    </v-btn>
                                    <v-btn icon class="mx-0" @click="$router.push('/catalog/edit/'+props.item.id)">
                                        <v-icon color="teal">edit</v-icon>
                                    </v-btn>
                                    <v-btn :disabled="props.item.url_key === 'po-umolchaniyu'" icon class="mx-0" @click="deleteItem(props.item)">
                                        <v-icon color="pink">delete</v-icon>
                                    </v-btn>
                                </td>
                            </template>
                            <template slot="no-data">
                                <v-alert :value="true" color="error" icon="warning">
                                    Извините, нет данных для отображения :(
                                </v-alert>
                            </template>
                        </v-data-table>
                    </v-card-text>
                    <div class="text-xs-left pt-2">
                        <v-btn @click="addArticle" color="primary" dark class="text-left mb-2">
                            <v-icon>add</v-icon>
                        </v-btn>
                    </div>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
    import { ACTIONS } from "@/constants";
    import { mapActions, mapState } from 'vuex'
    import { productApi } from '@catalog/api/product'

    export default {
        props: {},
        data: function() {
            return {
                headers: [
                    {
                        text: '#',
                        align: 'left',
                        sortable: false,
                        value: 'id'
                    },
                    {
                        text: 'Заголовок',
                        value: 'title',
                        sortable: false
                    },
                    {
                        text: 'Действия',
                        value: 'title',
                        sortable: false
                    }
                ],
                search: ''
            }
        },
        beforeRouteEnter(to, from, next) {
            next(vm => vm.load())
        },
        beforeRouteUpdate(to, from, next) {
            this.load()
            next()
        },
        computed: {
            ...mapState('catalog', ['items']),
        },
        methods: {
            addArticle() {
                productApi.add()
                    .then(response => {
                        this.$router.push({name: 'update-product', params: { id: response.id.toString()}})
                    })
                    .catch(error => {})
            },
            ...mapActions('catalog',{load: ACTIONS.LOAD, add: ACTIONS.ADD})
        }
     }
</script>