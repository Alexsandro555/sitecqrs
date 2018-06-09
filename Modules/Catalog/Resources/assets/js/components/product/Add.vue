<template>
    <v-flex xs8>
        <v-toolbar color="indigo darken-1" dark tabs>
                <v-tabs slot="extension" left v-model="tabs" slider-color="white" color="transparent">
                    <v-tab href="#main" class="subheading">Основные параметры</v-tab>
                    <v-tab href="#attributes" class="subheading">Аттрибуты</v-tab>
                </v-tabs>
            </v-toolbar>
        <v-tabs-items v-model="tabs">
            <v-tab-item key="main" :id="'main'">
                <v-card>
                    <v-container fluid grid-list-md>
                        <v-layout row wrap>
                            <v-flex xs2></v-flex>
                                <v-flex xs8 center align-end flexbox>
                                    <div>
                                        <v-form ref="form" lazy-validation v-model="valid">
                                            <template v-for="(field, num) in fields">
                                                <form-builder :field="field" :num="num" :items="items" @update="updateItem"></form-builder>
                                            </template>
                                            <v-btn large color="primary" :disabled="!valid" @click.prevent="onSubmit()">Сохранить</v-btn>
                                        </v-form>
                                    </div>
                                </v-flex>
                        </v-layout>
                    </v-container>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-flex>
</template>
<script>
    import { createNamespacedHelpers } from 'vuex'
    const module = createNamespacedHelpers('product')
    import formBuilder from '../../../../../../../resources/assets/js/components/form/builder/FormBuilder'
    export default {
        props: { },
        data: function() {
            return {
                tabs: null,
                valid: false,
            }
        },
        mounted: function() {
            //console.log("Val: ", this.$store.state.product.items)
        },
        computed: {
            ...module.mapState({
                fields: state => state.fields,
                items: state => state.items,
            }),
        },
        watch: {
            items: function (newItems, oldItems) {
                if(newItems.type_product !== oldItems.type_product) {
                    //console.log(this.$data)
                    if(this.fields && this.fields.type_product) {
                        console.log(this.fields.type_product.items.filter(item => item.id === newItems.type_product))
                    }
                    //
                    //this.originalLinesProduct.filter(item => item.id === this.form.type_product_id)[0] || [];
                }
            }
        },
        components: {
          formBuilder
        },
        methods: {
            updateItem(obj) {
                this.$store.dispatch('product/updateItem', obj)
            },
            /*...mapActions('product',[
                'updateItem'
            ]),*/

            onSubmit() { /*
                if(this.$refs.form.validate()) {
                    axios.post('/catalog/update', {id: '7', title: this.title, vendor: this.vendor, IEC: this.IEC, price: this.price,
                        description: this.description, qty: this.qty, sort: this.sort, onsale: this.onsale,
                        special: this.special, need_order: this.need_order, active: this.active,
                        type_product: this.type_product, producer: this.producer, producer_type_product: this.producer_type_product }).then(response => {
                        }).catch(err => {
                            console.log(err)
                        })
                    }
                    else {
                        return;
                    }*/

            },
        }
     }
</script>