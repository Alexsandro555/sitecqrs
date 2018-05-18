<template>
    <div class="cart">
        <table>
            <tbody>
            <tr>
                <td rowspan="2"><img class="cart__img" src="images/cart.png"/></td>
                <td><span class="cart__col-yell">{{count}}</span> товара на</td>
            </tr>
            <tr>
                <td><span class="cart__col-yell">{{total}}</span> руб.</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import { createNamespacedHelpers } from 'vuex'

    const {mapState} = createNamespacedHelpers('cart')

    export default {
        created() {
            this.$store.dispatch('cart/current')
        },
        computed: {
            ...mapState({
                count: state => state.count,
                total: state => state.total
            })
        }
     }
</script>
