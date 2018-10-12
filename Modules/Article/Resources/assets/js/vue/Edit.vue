<template>
    <v-container flud grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card>
                    <v-card-title><h1>Редактирование статьи</h1></v-card-title>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12>
                                    <v-form ref="form" lazy-validation v-model="valid">
                                        <template v-for="(field, num) in fields">
                                            <form-builder :field="field" v-if="num !== 'content'" :num="num" :items="item" @update="updateItem"></form-builder>
                                        </template>
                                        <wysiwyg
                                                :element-id="id"
                                                name="description"
                                                url="image-wysiwyg-upload"
                                                url-file="upload-file"
                                                type-file-upload="file"
                                                type-file="image-wysiwyg"
                                                model="Modules\Article\Entities\Article"
                                                v-model="item.content">
                                        </wysiwyg>
                                    </v-form>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" :disabled="false" flat @click.prevent="save()">Сохранить</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
    import { mapActions, mapState} from 'vuex'
    import { ACTIONS, GLOBAL } from '@/constants'
    import FormBuilder from '@/components/form/builder/FormBuilder.vue'

    export default {
        props: {
            id: {
                type: String,
                required: true
            },
        },
        data: function() {
            return {
                valid: false,
                form: null,
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
            ...mapState('article', ['item', 'items', 'fields'])
        },
        components: {
            FormBuilder
        },
        methods: {
            init(id) {
                if(this.items.length == 0) {
                    this.$router.push({name: 'articles'})
                }
                this.initialization(Number(id))
            },
            ...mapActions('article',{initialization: GLOBAL.INITIALIZATION, updateItem: GLOBAL.UPDATE_ITEM, load: ACTIONS.LOAD, save: ACTIONS.SAVE_DATA})
        }
     }
</script>