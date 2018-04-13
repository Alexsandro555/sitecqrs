<template>
    <v-flex xs8>
        <v-card>
            <v-container fluid grid-list-md>
                <v-layout row wrap>
                    <v-flex xs8 offset-sm1 align-end flexbox>
                        <v-alert v-if="flagAlert" :type="alertType" :value="true">
                            {{resultMessage}}
                        </v-alert>
                        <h1>Добавление типа продукта</h1>
                        <div>
                            <v-form ref="form" lazy-validation v-model="valid">
                                <v-text-field
                                        name="title"
                                        label="Название типа продукта"
                                        v-model="form.title"
                                        :rules="titleRules"
                                        :counter="255"
                                        required></v-text-field>
                                <v-select
                                        :items="tnveds"
                                        v-model="form.tnved_id"
                                        item-text="title"
                                        item-value="id"
                                        label="ТНВЭД"
                                        single-line
                                ></v-select>
                                <v-text-field
                                        name="description"
                                        label="Описание"
                                        v-model="form.description"
                                        textarea
                                ></v-text-field>
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
                    id: null,
                    title: '',
                    tnved_id: 1,
                    description: '',
                    sort: ''
                }),
                tnveds: [],
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
            axios.get('/catalog/type-product/create', {}).then(response => {
                this.tnveds = response.data.tnveds;
                this.form.id = response.data.typeProduct.id;
                this.form.title = response.data.typeProduct.title;
                this.form.tnved_id = response.data.typeProduct.tnved_id;
                this.form.description = response.data.typeProduct.description;
                this.form.sort = response.data.typeProduct.sort;
            }).catch(error => {
                console.log(error);
            });
        },
        methods: {
            onSubmit() {
                if(this.$refs.form.validate()) {
                    this.form.submit('post', '/catalog/type-product/update').then(data => {
                        this.$router.push('/');
                        this.alertType = 'success';
                        this.flagAlert = true;
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