import { ACTIONS, PRIVATE, GLOBAL } from "@/constants";
import { productApi } from "../api/product";

export default {
    [ACTIONS.UPDATE_RELATIONS]: ({commit, store},data) => {
        let obj = {'type_product': data}
        commit(PRIVATE.UPDATE_RELATIONS,obj)
    },
    [ACTIONS.UPDATE_FIELD]: ({ commit }, objField) => {
        commit('SET_ITEM',objField)
        commit(PRIVATE.UPDATE_RELATIONS, objField)
    },
    [ACTIONS.ATTRIBUTES]: ({ commit, dispatch }, id) => {
        productApi.getAttributes(id)
            .then(response => {
                commit(PRIVATE.SET_ATTRIBUTES,response)
            })
            .catch(error => {})
    },
    [ACTIONS.SAVE_DATA]: ({commit, dispatch}, data) => {
        productApi.patch(data)
            .then(response => {
                dispatch('successSaveNotification', response.message, {root: true})
                commit(GLOBAL.UPDATE, response.model)
            })
    },
    [ACTIONS.SAVE_ATTRIBUTES]: ({commit, dispatch}, data) => {
        productApi.saveAttributes(data).then(response => {
            dispatch('successSaveNotification', response.message, {root: true})
        })
    }
}