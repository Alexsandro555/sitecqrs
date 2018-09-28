import { ACTIONS, PRIVATE, GLOBAL } from "@/constants";
import { productApi } from "../api/product";

export default {
    [ACTIONS.LOAD]: ({commit}) => {
        productApi.get().then(response => {
            commit(GLOBAL.SET_ITEMS, response)
        }).catch(error => {})
    },
    [ACTIONS.UPDATE_ITEM]: ({commit}, objField) => {
        commit('SET_ITEM',objField)
        commit('UPDATE_RELATIONS', objField)
    },
}