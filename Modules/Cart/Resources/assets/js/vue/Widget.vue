<template>
    <div class="cart">
        <table>
            <tbody>
            <tr>
                <td rowspan="2"><img class="cart__img" @click="show" src="/images/cart.png"/></td>
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
    import { ACTIONS, MUTATIONS, GETTERS } from "@cart/constants"
    import { mapState, mapActions, mapMutations, mapGetters } from 'vuex'
    export default {
        props: {},
        data: function() {
            return {
            }
        },
        mounted() {
            this.load()
        },
        computed: {
            ...mapGetters('cart', {total: GETTERS.TOTAL_CART, count: GETTERS.QTY_CART}),
        },
        methods: {
            ...mapActions('cart',{load: ACTIONS.LOAD}),
            ...mapMutations('cart', {show: MUTATIONS.SHOW_MODAL})
        }
     }
</script>