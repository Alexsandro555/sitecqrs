import {ACTIONS, PRIVATE, GLOBAL} from '@/constants.js'
import { api } from '@/api/main.js'

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
            }).catch(error => {
                reject(error)
            })
        })
    },
    [GLOBAL.UPDATE_ITEM]: ({commit}, objField) => {
        commit(PRIVATE.SET_ITEM,objField)
    },
    [GLOBAL.LOAD]: ({commit, state}) => {
        api.get(state.url).then(response => {
            commit(GLOBAL.SET_ITEMS, response)
        }).catch(error => {})
    },
    [GLOBAL.DELETE]: ({ commit, state }, id) => {
        api.delete({url: state.url, id})
            .then(response => {
                commit(PRIVATE.DELETE, response)
            })
            .catch(error => {})
    },
    [GLOBAL.ADD]: ({ commit, state }) => {
        return new Promise((resolve, reject) => {
            api.create(state.url).then(response => {
                commit(PRIVATE.ADD, response)
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    }
    /*[ACTIONS.GET_ITEM]: ({ commit }, id) => {
        commit(PRIVATE.GET_ITEM, id)
    }*/
}