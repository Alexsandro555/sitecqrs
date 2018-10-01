import {ACTIONS, PRIVATE, GLOBAL} from '@/constants.js'

export default {
    [GLOBAL.INITIALIZATION] : ({dispatch, commit, state}, id) => {
        dispatch(GLOBAL.SET_FIELDS)
        commit('SELECT_ITEM', id)
    },
    [GLOBAL.SET_FIELDS] : ({ commit, state }) => {
        return new Promise((resolve, reject) => {
            axios.get('/initializer/fields/'+state.name).then(response => {
                commit('SET_FIELDS',response.data)
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