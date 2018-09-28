<template>
    <v-container flud grid-list-md>
        <v-layout wrap row>
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
                                                    <form-builder :field="field" :num="num" :items="item" @update="updateItem"></form-builder>
                                                </template>
                                                <!--<file-box url="/files/upload" :fileable-id="Number(items.id)" :type-files="typeFiles" :model="model"></file-box>-->
                                                <v-btn large color="primary" :disabled="!valid" @click.prevent="onSubmit()">Сохранить</v-btn>
                                            </v-form>
                                        </div>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item key="attributes" :id="'attributes'">
                        <!--<product-attributes :attributes="attributes" :id="this.$route.params.id"></product-attributes>-->
                    </v-tab-item>
                </v-tabs-items>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
    import { mapActions, mapState} from 'vuex'
    import { ACTIONS, GLOBAL } from '@/constants'
    import formBuilder from '@/components/form/builder/FormBuilder'
    import fileBox from '@file/components/file-box/FileBox'
    import productAttributes from './attributes/Attributes';
    export default {
        props: {
            id: {
                type: Number,
                default: null
            },
        },
        data: function() {
            return {
                tabs: null,
                valid: false,
            }
        },
        beforeRouteEnter(to, from, next) {
            next(vm => vm.init())
        },
        beforeRouteUpdate(to, from, next) {
            this.init()
            next()
        },
        computed: {
            ...mapState('catalog', ['item', 'items', 'fields'])
        },
        components: {
            formBuilder,
            fileBox,
            productAttributes
        },
        methods: {
            init() {
                if(!this.items.length>0) {
                    this.$router.push({name: 'products'})
                }
                this.setFields(this.id)
            },
            ...mapActions('catalog',{setFields: GLOBAL.SET_FIELDS, updateItem: ACTIONS.UPDATE_ITEM, save: ACTIONS.SAVE_DATA}),
        }
    }
</script>