export default {
    namespaced: true,
    state: {
        name: 'product',
        items: {},
        fields: [],
        typeFiles: ['image-product'],
        model: 'Modules\\Catalog\\Entities\\Product',
        attributes: []
    },
    getters: {
        typeProduct: state => {
            return state.items.type_product
        }
    },
    actions: {
        init({commit}) {
            console.log('product init')
        },
        setFields({ commit }, fields) {
            commit('SET_FIELDS',fields)
        },
        updateRelations({commit},data) {
            let obj = {'type_product': data}
            commit('UPDATE_RELATIONS',obj)
        },
        updateItem({commit}, objField) {
            commit('SET_ITEM',objField)
            commit('UPDATE_RELATIONS', objField)
        },
        filterListProducers({commit},typeProduct) {
            commit('FILTER_LIST_PRODUCERS,typeProduct')
        },
        create({commit}) {
            return new Promise((resolve, reject) => {
                // создание нового продукта с значениями по-умолчанию
                axios.get('/catalog/create').then(response => {
                    commit('FILL',response.data)
                    resolve()
                }).catch(error => {
                    console.log(error)
                    reject(error)
                });
            })
        },
        update({commit},id) {
            return new Promise((resolve, reject) => {
                axios.get('/catalog/edit/'+id, {}).then(response => {
                    commit('FILL',response.data)
                    resolve()
                }).catch(error => {
                    console.log(error)
                    reject(error)
                });
            })

        },
        attributes({commit},id) {
            axios.get('/catalog/attributes/'+id, {}).then(response => {
                let attributes = [];
                let productAttributes = response.data;
                axios.get('/catalog/attribute-values/'+id).then(res => {
                    productAttributes.forEach(productAttribute => {
                        let filtered = res.data.filter(item => item["id"] === productAttribute["id"]);
                        attributes.push({attribute_id: productAttribute["id"], title: productAttribute["title"], value: filtered.length !== 0? filtered[0]["pivot"]["value"]:""})
                    });
                    commit('SET_ATTRIBUTES',attributes)
                }).catch(error => {
                    console.log(error);
                })
            }).catch(error => {
                console.log(error)
            })
        },
        resetAttributes({commit}) {
            commit('RESET_ATTRIBUTES')
        }
    },
    mutations: {
        SET_FIELDS: (state, payload) => {
            for(let key in payload) {
                let obj = {}
                obj[key] = null;
                state.items = Object.assign({},state.items, obj)
            }
            state.fields = payload
        },
        SET_ITEM: (state, payload) => {
            state.items = Object.assign({},state.items, payload)
        },
        FILTER_LIST_PRODUCERS: (state, payload) => {

        },
        UPDATE_RELATIONS: (state, payload) => {
            // при выборе типа продукта у производителя и линейки обновляется список в соответствии с отношениями
            for(let key in payload) {
                if(key === 'producer') return 1;
                if(state.fields[key].relations) {
                    state.fields[key].relations.forEach(relation => {
                        relation = relation.substr(0,relation.length-1)
                        if(state.fields[relation]) {
                            let keyItem = payload[key]
                            state.fields[key].items.forEach(item => {
                                if(item.id == keyItem) {
                                    state.fields[relation].items = item[relation+'s']
                                }
                            })
                        }
                    })
                }
            }
        },
        FILL: (state, payload) => {
            if (!payload) {
                console.log('warning!')
            }
            // очищаем предыдущее состояние
            for(let key in state.items) {
                state.items[key] = null
            }
            for(let key in payload) {
                if(state.items.hasOwnProperty(key)) {
                    if(typeof payload[key] === "object" && payload[key] !== null) {
                        //commit('UPDATE_RELATIONS',{key: payload[key]['id']})
                        state.items[key] = payload[key]['id']
                    }
                    else {
                        state.items[key] = payload[key]
                    }
                }
            }
        },
        SET_ATTRIBUTES: (state, payload) => {
            state.attributes = payload
        },
        RESET_ATTRIBUTES: (state) => {
            state.attributes = []
        }
    }
}