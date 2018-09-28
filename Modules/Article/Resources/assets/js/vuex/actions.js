import { ACTIONS, PRIVATE, GLOBAL } from "@/constants"
import axios from "axios/index";
import { articleApi } from "@article/api/article";

export default {
    [ACTIONS.LOAD]: ({commit}) => {
        articleApi.get().then(response => {
            commit(GLOBAL.SET_ITEMS, response)
        }).catch(error => {})
    },
    [ACTIONS.SAVE_DATA]: ({state}) => {
        articleApi.patch(state.item)
            .then(response => {})
            .catch(error => {})
    },
    [ACTIONS.ADD]: ({commit}) => {
        return new Promise((resolve, reject) => {
            articleApi.getDefault().then(response => {
                commit(PRIVATE.ADD, response)
                resolve(response)
            }).catch(error => {
                reject()
            })
        })

    }
}