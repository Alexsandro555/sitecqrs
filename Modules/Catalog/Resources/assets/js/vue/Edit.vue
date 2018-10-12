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
                                                    <form-builder :field="field" v-if="num!=='description'" :num="num" :items="item" @update="updateField"></form-builder>
                                                </template>
                                                <wysiwyg
                                                    :element-id="id"
                                                    name="description"
                                                    url="image-wysiwyg-upload"
                                                    url-file="upload-file"
                                                    type-file-upload="file"
                                                    type-file="image-wysiwyg"
                                                    model="Modules\Catalog\Entities\Product"
                                                    v-model="item.description">
                                                </wysiwyg>
                                                <file-box url="/files/upload" :fileable-id="Number(item.id)" :type-files="typeFiles" :model="model"></file-box>
                                                <v-btn large color="primary" :disabled="!valid" @click.prevent="onSubmit">Сохранить</v-btn>
                                            </v-form>
                                        </div>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item key="attributes" :id="'attributes'">
                        <product-attributes :attributes="attributes" :id="id"></product-attributes>
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
                type: String,
                required: true
            },
        },
        data: function() {
            return {
                tabs: null,
                valid: false,
            }
        },
        beforeRouteEnter(to, from, next) {
            next(vm => vm.init(to.params.id))
        },
        beforeRouteUpdate(to, from, next) {
            this.init(to.params.id)
            next()
        },
        computed: {
            ...mapState('catalog', ['item', 'items', 'fields', 'typeFiles', 'model', 'attributes', 'model'])
        },
        watch: {
            'fields' (to, from) {
                if(!_.isEmpty(to)) {
                    this.updateRelations(this.item.type_product_id)
                }
            }
        },
        components: {
            formBuilder,
            fileBox,
            productAttributes
        },
        methods: {
            init(id) {
                if(this.items.length == 0) {
                    this.$router.push({name: 'products'})
                }
                this.initialization(Number(id))
                this.getAttributes(Number(id))
            },
            onSubmit() {
                if(this.$refs.form.validate()) {
                    this.save(this.item)
                }
            },
            ...mapActions('catalog',{
                initialization: GLOBAL.INITIALIZATION,
                save: ACTIONS.SAVE_DATA,
                updateField: ACTIONS.UPDATE_FIELD,
                getAttributes: ACTIONS.ATTRIBUTES,
                updateRelations: ACTIONS.UPDATE_RELATIONS
            }),
        }
    }
</script>