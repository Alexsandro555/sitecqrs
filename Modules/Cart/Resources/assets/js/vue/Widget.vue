<template>
    <span>
        <a @click="show" href="#">{{count}}  товар(ов), {{total}} руб.</a>
    </span>
</template>
<script>
    import { ACTIONS, MUTATIONS, GETTERS } from "@/constants.js"
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
            ...mapState('cart', ['count', 'total']),
            ...mapGetters('cart', {total: GETTERS.TOTAL_CART, count: GETTERS.QTY_CART}),
        },
        methods: {
            ...mapActions('cart',{load: ACTIONS.LOAD}),
            ...mapMutations('cart', {show: MUTATIONS.SHOW_MODAL})
        }
     }
</script>