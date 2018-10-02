import { GETTERS } from "@/constants"

export default {
    [GETTERS.TOTAL_CART]: state => {
        let sum = 0
        state.cart.forEach(cartItem => {
            sum = sum + cartItem.price*cartItem.qty
        })
        return sum
    },
    [GETTERS.QTY_CART]: state => {
        let qty = 0
        state.cart.forEach(cartItem => {
            qty = qty + Number(cartItem.qty)
        })
        return qty
    }
}