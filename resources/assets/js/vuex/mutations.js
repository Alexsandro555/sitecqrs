import { GLOBAL } from '@/constants'

export default {
    SET_FIELDS: (state, payload) => {
        for(let key in payload) {
            let obj = {}
            obj[key] = null;
            state.item = Object.assign({},state.item, obj)
        }
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
    GET_ITEM: (state, payload) => {
        //const item = state.items.find(item => item.id === payload)
        console.log(state.items)
    }
}