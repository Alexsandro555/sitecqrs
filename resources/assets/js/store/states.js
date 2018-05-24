import * as actions from './actions'
import mutations from './mutations'
import cart from '../../../../Modules/Cart/Resources/assets/js/store/cart.js'
import auth from '../components/auth/store/state'
import sliderFullPage from './modules/slider-full-page/state'

export default function() {
    return {
       modules: {
           cart,
           auth,
           sliderFullPage
       }
    }
}