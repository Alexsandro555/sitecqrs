import { ACTIONS, PRIVATE, GLOBAL } from "@/constants";
import { productApi } from "../api/product";

export default {
    [ACTIONS.LOAD]: ({commit}) => {
        productApi.get().then(response => {
            commit(GLOBAL.SET_ITEMS, response)
        }).catch(error => {})
    },
    /*[ACTIONS.UPDATE_ITEM]: ({commit}, objField) => {
        console.log('working')
        commit('SET_ITEM',objField)
        commit(PRIVATE.UPDATE_RELATIONS, objField)
    },*/
    [ACTIONS.UPDATE_FIELD]: ({ commit }, objField) => {
        commit('SET_ITEM',objField)
        commit(PRIVATE.UPDATE_RELATIONS, objField)
    },
    [ACTIONS.ATTRIBUTES]: ({ commit }, id) => {
        productApi.getAttributes(id)
            .then(response => {
                commit(PRIVATE.SET_ATTRIBUTES,response)
            })
            .catch(error => {})
    },
    [ACTIONS.ADD]: ({ commit }) => {
        productApi.add()
            .then(response => {})
            .catch(error => {})
    }
}