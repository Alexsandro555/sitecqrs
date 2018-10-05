import { GLOBAL, PRIVATE } from '@/constants'

export default {
    SET_FIELDS: (state, payload) => {
        state.fields = payload
    },
    SELECT_ITEM: (state, payload) => {
        const item = state.items.find(item => item.id === payload)
        state.item = Object.assign({}, item)
    },
    [GLOBAL.UPDATE]: (state, payload) => {
        state.items.forEach((item, i, items) => {
            if(item.id == payload.id) {
                state.items[i] = Object.assign({}, payload)
            }
        })
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
    },
    SET_VARIABLE: (state,{module,variable,value}) => {
        _.set(state[module],variable,value)
    },
    INC_VARIABLE: (state,{module,variable}) => {
        _.set(state[module],variable,_.get(state[module],variable)+1)
    },
    DEC_VARIABLE: (state,{module,variable}) => {
        _.set(state[module],variable,_.get(state[module],variable)-1)
    },
    SET_VARIABLE_2: (state,payload) => {
        state[payload.module][payload.variable][payload.variable2]=payload.value
    },
    CHANGE_VALUE_IN_ARRAY: (state,{module,variable,object,key,value}) =>  {
        if (_.findIndex(state[module][variable],object)!=-1) state[module][variable][_.findIndex(state[module][variable],object)][key]=value
    },
    ADD_TO_ARRAY: (state,{module,value,variable}) =>{
        if (_.isArray(value))
        {
            state[module][variable]=state[module][variable].concat(value)
        } else {
            state[module][variable].push(value)
        }
    },
    ADD_TO_ARRAY_UNIQ_KEY: (state,payload) => {
        state[payload.module][payload.variable]=_.uniqBy(state[payload.module][payload.variable].concat(payload.value.filter(function (item) {return !_.isEmpty(item) })),payload.key)
    },
    UPDATE_ARRAY_BY_KEY: (state,payload) => {
        if (!_.isArray(payload.value))
        {
            state[payload.module][payload.variable]=state[payload.module][payload.variable].filter(function (item)
            {
                return item[payload.key]!=payload.value[payload.key]
            })
            state[payload.module][payload.variable].push(payload.value)
        } else {
            for (var i in payload.value) {
                let index=_.findIndex(state[payload.module][payload.variable], function(o) { return o[payload.key] == payload.value[i][payload.key]; })
                if (index==-1) {
                    state[payload.module][payload.variable].push(payload.value[i])
                } else {
                    state[payload.module][payload.variable][index]=payload.value[i]
                }
            }
        }
    },
    DELETE_ARRAY_BY_KEY: (state,payload) => {
        state[payload.module][payload.variable]=state[payload.module][payload.variable].filter(function (item)
        {
            return item[payload.key]!=payload.value[payload.key]
        })
    },
    REMOVE_FROM_ARRAY: (state,payload) => {
        state[payload.module][payload.variable]=state[payload.module][payload.variable].filter( item => item!=payload.value)
    },
    REMOVE_FROM_ARRAY_BY_KEY_VALUE: (state,{module,variable,key,value}) =>
    {
        _.set(state,[module,variable],_.get(state,[module,variable]).filter( item => item[key]!=value))
    }
}