//import {ADD_CART2} from '../../../../../../resources/assets/js/store/mutations'
import {ADD_CART2} from '../../../../../../resources/assets/js/store/mutations'
import new_mutations from './mutations'

const mutations = Object.assign({},new_mutations,old_mutations)

export default {
    namespaced: true,
    state: {
        count: 0,
        total: 0
    },
    mutations,
    actions: {
        add({ commit }, req) {
            axios.post('/cart/add', {id: req.id}).then((response) => {
                commit('ADD_CART', response.data)
            }).catch((error) => {
                console.log(error)
            })
        }
    }
}