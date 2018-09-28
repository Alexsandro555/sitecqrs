import {ACTIONS, PRIVATE, GLOBAL} from '@/constants.js'

export default {
    [GLOBAL.SET_FIELDS] : ({ commit, state }, id) => {
        return new Promise((resolve, reject) => {
            axios.get('/initializer/fields/'+state.name).then(response => {
                commit('SET_FIELDS',response.data)
                commit('SELECT_ITEM', id)
                resolve()
            }).catch(err => {
                reject(error)
            })
        })
    },
    [GLOBAL.UPDATE_ITEM]: ({commit}, objField) => {
        commit(PRIVATE.SET_ITEM,objField)
    },
    [ACTIONS.GET_ITEM]: ({ commit }, id) => {
        commit(PRIVATE.GET_ITEM, id)
    }
}