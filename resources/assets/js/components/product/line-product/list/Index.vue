<template>
    <div>
        <v-progress-circular v-if="loader" indeterminate :size="50" color="primary"></v-progress-circular>
        <v-data-table v-if="!loader"
                      :headers="headers"
                      :items="items"
                      hide-actions
                      class="elevation-1">
            <template slot="items" slot-scope="props">
                <td>{{ props.item.id }}</td>
                <td class="text-xs-left">{{ props.item.name_line }}</td>
                <td class="text-xs-left">{{ props.item.sort }}</td>
                <td class="justify-center layout px-0">
                    <v-btn icon class="mx-0" @click="editItem(props.item)">
                        <v-icon color="teal">edit</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" @click="deleteItem(props.item)">
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
        <div class="text-xs-left pt-2">
        <v-dialog  v-model="dialog" max-width="500px">
            <v-btn color="primary" dark slot="activator" @click="$router.push(path)" class="text-left mb-2"><v-icon>add</v-icon></v-btn>
            <v-card>
                <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-form ref="form" lazy-validation v-model="valid">
                            <v-layout wrap>
                                <v-flex xs12 sm6 md12>
                                    <v-select
                                            :items="typeProducts"
                                            v-model="editedItem.type_product_id"
                                            item-text="title"
                                            item-value="id"
                                            label="Тип продукции"
                                            single-line
                                    ></v-select>
                                </v-flex>
                                <v-flex xs12 sm6 md12>
                                    <v-select
                                            :items="producers"
                                            v-model="editedItem.producer_id"
                                            item-text="title"
                                            item-value="id"
                                            label="Производитель"
                                            single-line
                                    ></v-select>
                                </v-flex>
                                <v-flex xs12 sm6 md12>
                                    <v-text-field
                                            name="name_line"
                                            label="Наименование линейки продукции"
                                            v-model="editedItem.name_line"
                                            :rules="titleRules"
                                            :counter="255"
                                            required></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md12>
                                    <v-text-field
                                            name="sort"
                                            label="Сорт."
                                            v-model="editedItem.sort"
                                    ></v-text-field>
                                </v-flex>
                        </v-layout>
                        </v-form>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click.native="close">Отмена</v-btn>
                    <v-btn color="blue darken-1" flat @click.native="save">Сохранить</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        </div>
    </div>
</template>
<script>
    import {Form} from '../../../form/Form.js'

    export default {
        data: function() {
            return {
                valid: false,
                editedItem: new Form({
                        id: 0,
                        name_line: '',
                        type_product_id: 1,
                        producer_id: 1,
                        sort: ''
                    }),
                defaultItem: new Form({
                    id: 0,
                    name_line: '',
                    type_product_id: 1,
                    producer_id: 1,
                    sort: ''
                }),
                titleRules: [
                    v => !!v || 'Наименование линейки продукта обязательно для заполнения',
                    v => v.length <=255 || 'Наименование линейки продукта должно иметь длину не более 255 символов'
                ],
                dialog: false,
                editedIndex: -1,
                loader: true,
                typeProducts: [],
                producers: [],
                headers: [
                    {
                        text: '#',
                        align: 'left',
                        sortable: false,
                        value: 'id'
                    },
                    { text: 'Название', align: 'left', value: 'name_line' },
                    { text: 'Сорт', value: 'sort' },
                    { text: 'Действия', sortable: false}
                ],
                items: []
            }
        },
        created() {
            axios.get('/catalog/line-product', {}).then(response => {
                this.loader = false;
                this.items = response.data.lineProducts;
                this.typeProducts = response.data.typeProducts;
                this.producers = response.data.producers;
            }).catch(error => {});
        },
        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Добавление линейки' : 'Редактирование линейки'
            }
        },
        methods: {
            editItem (item) {
                this.editedIndex = this.items.indexOf(item)
                this.editedItem = Object.assign(new Form({
                    id: 0,
                    name_line: '',
                    type_product_id: 1,
                    producer_id: 1,
                    sort: ''
                }), item)
                this.dialog = true
            },
            deleteItem (item) {
                const index = this.items.indexOf(item)
                if(confirm('Вы уверены что хотите удалить запись?')) {
                    axios.delete('/catalog/line-product/delete', {data: {id: this.items[index].id}}).then(response => {
                    }).catch(error => {

                    });
                    this.items.splice(index, 1)
                }
            },

            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = this.defaultItem;
                    //this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },
            save () {
                if (this.editedIndex > -1) {
                    if(this.$refs.form.validate()) {
                        let that = this;
                        Object.assign(that.items[that.editedIndex], that.editedItem)
                        this.editedItem.submit('post', '/catalog/line-product/update').then(data => {
                        }).catch(errors => {
                            console.log(errors);
                        });
                    }
                } else {
                    if(this.$refs.form.validate()) {
                        this.editedItem.submit('post', '/catalog/line-product/store').then(data => {
                            this.items.push(data.model)
                        }).catch(errors => {
                            console.log(errors);
                        });
                    }
                }
                this.close()
            }
        }
     }
</script>

<style scoped>
    div {
        text-align: center;
    }

    .progress-circular {
        margin: 1rem;
    }
</style>