import * as actions from './actions'
import mutations from './mutations'
import cart from '../../../../Modules/Cart/Resources/assets/js/store/cart.js'

export default function() {
    return {
       modules: {
           cart
       }
    }
}