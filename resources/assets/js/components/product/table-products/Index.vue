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
                <td class="text-xs-left">{{ props.item.title }}</td>
                <td class="text-xs-left">{{ props.item.url_key }}</td>
                <td class="text-xs-left">{{ props.item.price }}</td>
                <td class="justify-center layout px-0">
                    <v-btn icon class="mx-0" @click="$router.push('/update-product/'+props.item.id)">
                        <v-icon color="teal">edit</v-icon>
                    </v-btn>
                    <v-btn :disabled="props.item.url_key === 'po-umolchaniyu'" icon class="mx-0" @click="deleteItem(props.item)">
                        <v-icon color="pink">delete</v-icon>
                    </v-btn>
                </td>
            </template>
            <template slot="no-data">
                <v-alert :value="true" color="error" icon="warning">
                    Sorry, nothing to display here :(
                </v-alert>
            </template>
        </v-data-table>
        <div class="text-xs-left pt-2">
            <router-link to="/update-product/-1">
                <v-btn color="primary" dark class="text-left mb-2"><v-icon>add</v-icon></v-btn>
            </router-link>
        </div>
    </div>
</template>
<script>
    export default {
        props: { },
        data: function() {
            return {
                loader: true,
                headers: [
                    {
                        text: '#',
                        align: 'left',
                        sortable: true,
                        value: 'id'
                    },
                    { text: 'Название', value: 'title' },
                    { text: 'Путь', value: 'url_key' },
                    { text: 'Цена (руб.)', value: 'price' },
                    { text: 'Действия', value: 'title', sortable: false}
                ],
                items: []
            }
        },
        created() {
            axios.get('/catalog/', {}).then(response => {
                this.loader = false;
                this.items = response.data;
            }).catch(error => {

            });
        },
        mounted: function() {
        },
        methods: {
            deleteItem (item) {
                const index = this.items.indexOf(item)
                if(confirm('Вы уверены что хотите удалить запись?')) {
                    axios.delete('/catalog/delete', {data: {id: this.items[index].id}}).then(response => {
                    }).catch(error => {});
                    this.items.splice(index, 1)
                }
            },
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