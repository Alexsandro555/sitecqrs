<template>
        <v-flex xs8>
            <v-card>
                <v-container fluid grid-list-md>
                    <v-layout row wrap>
                        <v-flex xs8 offset-sm1 align-end flexbox>
                                <v-alert v-if="flagAlert" :type="alertType" :value="true">
                                    {{resultMessage}}
                                </v-alert>
                                <h1>Добавление нового продукта</h1>
                                <div>
                                    <v-form ref="form" lazy-validation v-model="valid">
                                        <v-text-field
                                            name="title"
                                            label="Название продукта"
                                            v-model="form.title"
                                            :rules="titleRules"
                                            :counter="255"
                                            required></v-text-field>
                                        <v-text-field
                                                name="vendor"
                                                label="Артикул"
                                                v-model="form.vendor"
                                                :rules="vendorRules"
                                                :counter="12"
                                                ></v-text-field>
                                        <v-text-field
                                                name="IEC"
                                                label="IEC"
                                                v-model="form.IEC"
                                                :rules="IECRules"
                                                :counter="255"
                                        ></v-text-field>
                                        <v-text-field
                                                name="price"
                                                label="Цена"
                                                v-model="form.price"
                                                :rules="priceRules"
                                                :counter="12"
                                                prefix="₽"
                                                required
                                        ></v-text-field>
                                        <v-text-field
                                                name="description"
                                                label="Описание"
                                                v-model="form.description"
                                                textarea
                                        ></v-text-field>
                                        <v-text-field
                                                name="qty"
                                                label="Количество"
                                                value="1"
                                                v-model="form.qty"
                                                :rules="qtyRules"
                                                :counter="15"
                                        ></v-text-field>
                                        <v-text-field
                                                name="sort"
                                                label="Сортировка"
                                                value="1"
                                                v-model="form.sort"
                                                :rules="sortRules"
                                        ></v-text-field>
                                        <v-checkbox
                                            label="Скидка"
                                            v-model="form.onsale"></v-checkbox>
                                        <v-checkbox
                                                label="Спецпредложение"
                                                v-model="form.special"></v-checkbox>
                                        <v-checkbox
                                                label="Необходимо заказывать"
                                                v-model="form.need_order"></v-checkbox>
                                        <v-checkbox
                                                label="Активен"
                                                v-model="form.active"></v-checkbox>
                                        <v-select
                                            :items="typeProducts"
                                            v-model="selTypeProduct"
                                            item-text="title"
                                            item-value="id"
                                            label="Тип продукции"
                                            single-line
                                        ></v-select>
                                        <v-select
                                            :items="curTypeProduct.producers"
                                            v-model="selProducer"
                                            item-text="title"
                                            item-value="id"
                                            label="Производитель"
                                            single-line
                                            ></v-select>
                                        <v-select
                                            :items="productLines"
                                            v-model="selLineProduct"
                                            item-text="pivot.name_line"
                                            item-value="pivot.id"
                                            label="Линейка продукции"
                                            single-line
                                            ></v-select>
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
    import {Form} from '../../form/Form.js'

    export default {
        props: { },
        data: function() {
            return {
                valid: false,
                form: new Form({
                    id: '',
                    title: '',
                    vendor: '',
                    IEC: '',
                    price: '',
                    description: '',
                    qty: '',
                    sort: '',
                    onsale: false,
                    special: false,
                    need_order: false,
                    active: true,
                }),
                titleRules: [
                    v => !!v || 'Название продукта обязательно для заполнения',
                    v => v.length <=255 || 'Название продукта должно иметь длину не более 255 символов'
                ],
                vendorRules: [
                    v => v.length <=12 || 'Артикул должен иметь длину не более 12 символов'
                ],
                IECRules: [
                    v => v.length <=255 || 'IEC должен иметь длину не более 255 символов'
                ],
                priceRules: [
                    v => !!v || 'Цена продукта обязательна для заполнения',
                    v => /^[0-9].*$/.test(v) || 'Цена должна содержать только цифры',
                    v => v.length <=12 || 'Цена не может превышать 12 цифр'
                ],
                qtyRules: [
                    v => /^[0-9]*$/.test(v) || 'Количество может содержать только цифры'
                ],
                sortRules: [
                    v => /^[0-9]*$/.test(v) || 'Сорт. может содержать только цифры',
                ],
                originalLinesProduct: [],
                typeProducts: [],
                selTypeProduct: 1,
                selProducer: 1,
                selLineProduct: 1,
                resultMessage: '',
                flagAlert: false,
                alertType: 'info'
            }
        },
        created() {
            this.initial();
        },
        watch: {
          '$route' (to, from) {
              this.initial();
          }
        },
        computed: {
          curTypeProduct() {
              return this.originalLinesProduct.filter(item => item.id === this.selTypeProduct)[0] || [];
          },
          productLines() {
            return this.curTypeProduct.producers && this.curTypeProduct.producers.filter(item => item.id === this.selProducer) || [];
          }
        },
        mounted: function() {
        },
        methods: {
            initial() {
                if(this.$route.params.id == -1) {
                    axios.get('/catalog/create', {}).then(response => {
                        this.originalLinesProduct = response.data.typeProducts;
                        response.data.typeProducts.forEach((item)=> {
                            this.typeProducts.push({title: item.title, id: item.id});
                        });
                        for(let key in response.data.defaultProduct) {
                            if(this.form.hasOwnProperty(key) && response.data.defaultProduct[key] !== null) {
                                this.form[key] = response.data.defaultProduct[key];
                            }
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                }
                else {
                    axios.get('/catalog/edit/'+this.$route.params.id, {}).then(response => {
                        this.originalLinesProduct = response.data.typeProducts;
                        response.data.typeProducts.forEach((item)=> {
                            this.typeProducts.push({title: item.title, id: item.id});
                        });
                        for(let key in response.data.product) {
                            if(this.form.hasOwnProperty(key) && response.data.product[key] !== null) {
                                this.form[key] = response.data.product[key];
                            }
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            onSubmit() {
                if(this.$refs.form.validate()) {
                    this.form.submit('post', '/catalog/update').then(data => {
                        for(let key in data.model) {
                            if(this.form.hasOwnProperty(key) && data.model[key] !== null) {
                                this.form[key] = data.model[key];
                            }
                        }
                        /*this.form.title = data.model.title;
                        this.form.vendor = data.model.vendor;
                        this.form.IEC = data.model.IEC;
                        this.form.price = data.model.price;
                        this.form.description = data.model.description;
                        this.form.onsale = data.model.onsale;
                        this.form.special = data.model.special;
                        this.form.need_order = data.model.need_order;
                        this.form.active = data.model.active;*/
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