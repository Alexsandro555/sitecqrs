export default {
    namespaced: true,
    state: {
        name: 'product',
        items: {},
        fields: []
    },
    actions: {
        init({commit}) {
            console.log('product init')
        },
        setFields({ commit }, fields) {
            commit('SET_FIELDS',fields)
        },
        updateItem({commit}, objField) {
            commit('SET_ITEM',objField)
        },
        filterListProducers({commit},typeProduct) {
            commit('FILTER_LIST_PRODUCERS,typeProduct')
        }
    },
    getters: {
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

        }
    }
}