import * as actions from './actions'
import mutations from './mutations'
import auth from '../components/auth/store/state'
import sliderFullPage from '../store/modules/slider-full-page/state'
import initializer from '../store/modules/initializer'
import product from '../../../../Modules/Catalog/Resources/assets/js/components/product/store/states'
import article from '@article/vuex/store'
import catalog from '@catalog/vuex/store'

export default function() {
    return {
       modules: {
           auth,
           sliderFullPage,
           initializer,
           product,
           article,
           catalog
       },
    }
}