export default {
    namespaced: true,
    state: {
        name: 'product',
        items: [],
        fields: []
    },
    actions: {
        init({commit}) {
            console.log('product init')
        },
        setFields({ commit }, fields) {
            commit('SET_FIELDS',fields)
        }
    },
    getters: {

    },
    mutations: {
        SET_FIELDS: (state, payload) => {
            let obj = {}
            payload.forEach(item => {
                obj[item.name] = null
            })
            state.fields = obj
        }
    }
}