<template>
    <tr>
        <td>
            <img :src="'storage/'+cartItem.options.filename" height="40px"/>
        </td>
        <td>
            <span>{{cartItem.options.type}}</span><br>
            {{cartItem.name}}
        </td>
        <td>
            <div class="tab-li-button">
                <input class="cart-col product_qty2" name="quantity[]" type="text" :value="cartItem.qty">
                <div @click="downQty(cartItem.rowId)" class="div-minus">-</div>
                <div @click="upQty(cartItem.rowId)" class="div-plus">+</div>
            </div>
        </td>
        <td>{{coursePrice}}</td>
        <td>{{cartItem.options.onstock}}</td>
        <td class="cart-table-del"><a href="#" @click.prevent="cartDelete(cartItem.rowId)"><img :src="'../css/images/close.gif'"/></a></td>
    </tr>
</template>
<script>
    import { ACTIONS } from "@/constants";
    import { mapActions } from 'vuex'

    export default {
        props: {
            cartItem: Object,
        },
        data: function() {
            return {

            }
        },
        computed: {
          coursePrice: function() {
              return this.cartItem.price;
          }
        },
        methods: {
            ...mapActions('cart',{ delete: ACTIONS.DELETE, upQty: ACTIONS.UP_QTY, downQty: ACTIONS.DOWN_QTY, cartDelete: ACTIONS.DELETE})
        }
    }
</script>