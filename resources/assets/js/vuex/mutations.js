import { GLOBAL, PRIVATE } from '@/constants'

export default {
    SET_FIELDS: (state, payload) => {
        state.fields = payload
    },
    SELECT_ITEM: (state, payload) => {
        const item = state.items.find(item => item.id === payload)
        state.item = Object.assign({}, item)
    },
    [GLOBAL.SET_ITEMS]: (state, payload) => {
        state.items = payload
    },
    SET_ITEM: (state, payload) => {
        state.item = Object.assign({},state.item, payload)
    },
    [PRIVATE.DELETE]: (state, payload) => {
        state.items = state.items.filter(item => item.id !== payload.id)
    },
    [PRIVATE.ADD]: (state, payload) => {
        state.items.push(payload)
    }
    /*GET_ITEM: (state, payload) => {
        const item = state.items.find(item => item.id === payload)
        console.log(state.items)
    }*/
}