<template>
    <v-flex xs8>
        <v-card>
            <v-container fluid grid-list-md>
                <v-layout row wrap>
                    <v-flex xs8 offset-sm1 align-end flexbox>
                        <v-alert v-if="flagAlert" :type="alertType" :value="true">
                            {{resultMessage}}
                        </v-alert>
                        <h1>Добавление производителя</h1>
                        <div>
                            <v-form ref="form" lazy-validation v-model="valid">
                                <v-text-field
                                        name="title"
                                        label="Название производителя"
                                        v-model="form.title"
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
                    id: null,
                    title: '',
                    sort: ''
                }),
                titleRules: [
                    v => !!v || 'Наименование производителя обязательно для заполнения',
                    v => v.length <=255 || 'Наименование производителя должно иметь длину не более 255 символов'
                ],
                resultMessage: '',
                flagAlert: false,
                alertType: 'info'
            }
        },
        created() {
            axios.get('/catalog/producer/create', {}).then(response => {
                this.form.id = response.data.id;
                this.form.title = response.data.title;
                this.form.sort = response.data.sort;
            }).catch(error => {
                console.log(error);
            });
        },
        mounted: function() {
        },
        methods: {
            onSubmit() {
                if(this.$refs.form.validate()) {
                    this.form.submit('post', '/catalog/producer/update').then(data => {
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