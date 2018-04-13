<template>
    <v-flex xs8>
        <v-card>
            <v-container fluid grid-list-md>
                <v-layout row wrap>
                    <v-flex xs8 offset-sm1 align-end flexbox>
                        <v-alert v-if="flagAlert" :type="alertType" :value="true">
                            {{resultMessage}}
                        </v-alert>
                        <h1>Добавление линейки проукции</h1>
                        <div>
                            <v-form ref="form" lazy-validation v-model="valid">
                                <v-select
                                        :items="typeProducts"
                                        v-model="form.type_product_id"
                                        item-text="title"
                                        item-value="id"
                                        label="Тип продукции"
                                        single-line
                                ></v-select>
                                <v-select
                                        :items="producers"
                                        v-model="form.producer_id"
                                        item-text="title"
                                        item-value="id"
                                        label="Производитель"
                                        single-line
                                ></v-select>
                                <v-text-field
                                        name="name_line"
                                        label="Наименование линейки продукции"
                                        v-model="form.name_line"
                                        :rules="titleRules"
                                        :counter="255"
                                        required></v-text-field>
                                <v-text-field
                                        name="sort"
                                        label="Сорт."
                                        v-model="form.sort"
                                ></v-text-field>
                                <v-btn large color="primary" :disabled="!valid" @click.prevent="onSubmit()">Сохранить</v-btn>
                            </v-form>
                        </div>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </v-flex>
</template>
<script>
    import {Form} from '../../../form/Form.js'

    export default {
        props: { },
        data: function() {
            return {
                valid: false,
                form: new Form({
                    name_line: '',
                    type_product_id: 1,
                    producer_id: 1,
                    sort: ''
                }),
                typeProducts: [],
                producers: [],
                titleRules: [
                    v => !!v || 'Наименование типа-продукта обязательно для заполнения',
                    v => v.length <=255 || 'Наименование типа-продукта должно иметь длину не более 255 символов'
                ],
                resultMessage: '',
                flagAlert: false,
                alertType: 'info'
            }
        },
        created() {
            axios.get('/catalog/line-product/create', {}).then(response => {
                this.typeProducts = response.data.typeProducts;
                this.producers = response.data.producers;
                this.form.type_product_id = response.data.typeProducts[0].id;
                this.form.producer_id = response.data.producers[0].id;
                this.form.sort = response.data.sort;
            }).catch(error => {
                console.log(error);
            });
        },
        methods: {
            onSubmit() {
                if(this.$refs.form.validate()) {
                    this.form.submit('post', '/catalog/line-product/store').then(data => {
                        this.form.name_line = data.model.name_line;
                        this.form.type_product_id = data.model.type_product_id;
                        this.form.producer_id = data.model.producer_id;
                        this.form.sort = data.model.sort;
                        this.alertType = 'success';
                        this.flagAlert = true;
                        setTimeout(() => this.flagAlert = false, 2000);
                        this.resultMessage = data.message;
                    }).catch(errors => {
                        this.alertType = 'error';
                        this.flagAlert = true;
                        this.resultMessage = 'Ошибка! '+errors;
                    });
                }

            },
        }
     }
</script>