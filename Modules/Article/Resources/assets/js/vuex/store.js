import module_actions from './actions.js'
import standart_actions from '@/vuex/actions.js'
import module_mutations from './mutations.js'
import standart_mutations from '@/vuex/mutations.js'
import module_getters from './getters.js'

var default_actions = {
    init({ dispatch, commit, getters, rootGetters }) {
    },
}

var actions=Object.assign({}, module_actions, standart_actions)
var getters=Object.assign({}, module_getters)
var mutations = Object.assign({}, module_mutations, standart_mutations)

const state = {
    name: 'article',
    item: {},
    items: [],
    fields: [],
    url: '/article',
    model: 'Modules\\Article\\Entities\\Article'
}

const module = {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}

export default module;