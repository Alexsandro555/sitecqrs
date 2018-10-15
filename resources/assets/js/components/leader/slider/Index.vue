<template>
    <div>
        <carousel name="carousel" :style="{ height: '428px'}"  :pagination-enabled=false :navigation-enabled=true :per-page=perpage  :per-page-custom="perCustom">
            <slide v-for="item in items" :key="item.id">
                <div class="special-product text-xs-center" align="center">
                    <div class="special-product__header text-xs-center">
                        <a :href="getUrl(item)">{{item.title.length>52?item.title.substr(0,50)+'...':item.title}}</a>
                    </div>
                    <div class="special-product__img">
                        <v-layout aligin-center row wrap>
                            <a href="#" class="img-shadow">
                                <img :src="getImage(item.files)"/>
                            </a>
                        </v-layout>
                    </div>
                    <br>
                    <div class="special-product__desc text-xs-center">Сделан на заказ</div>
                    <v-layout col wrap>
                        <v-flex xs8 class="special-product__price text-xs-center">
                            <span>{{Math.floor(item.price)}}</span> руб.
                        </v-flex>
                        <v-flex xs4 class="special-product__cart">
                            <img @click="addCart(item.id)" src="/images/product-cart.png"/>
                        </v-flex>
                    </v-layout>
                </div>
            </slide>
        </carousel>
    </div>
</template>
<script>
    import { Carousel, Slide } from 'vue-carousel';
    import { mapActions } from 'vuex'
    import { ACTIONS } from '@cart/constants'

    export default {
        props: {
            url: String,
            perpage: {
                type: Number,
                default: 3
            },
            perCustom: Array
        },
        data: function() {
            return {
                items:[],
            }
        },
        created() {
            axios.get(this.url).then(response => {
                this.items = response.data
            }).catch((error) => {
                console.log(error);
            });
        },
        methods: {
          getUrl(item) {
              let url = '/catalog/'
              if(item.type_product) {
                  url = url + item.type_product.url_key + '/'
              }
              else {
                  url = url + 'empty/'
              }
              if(item.producer_type_product) {
                  url = url + item.producer_type_product.url_key + '/'
              }
              else {
                  url = url + 'empty/'
              }
              url = url + item.url_key
              return url
          },
          addCart(id) {
                const count = 1
                this.addCartItem({id, count})
          },
          getImage(files) {
            if(files.length>0) {
                return '/storage/'+files[0].config.files.medium.filename
            }
            else {
                return '/images/no-image-medium.png'
            }
          },
          ...mapActions('cart',{ addCartItem: ACTIONS.ADD_CART })
        },
        components: {
            Carousel,
            Slide
        }
     }
</script>

<style>
    /* Добавление размытия по-краям */
    .img-shadow {
        position: relative;
        margin: 0 auto;
        max-width: 100%;
        float: left;
    }

    .img-shadow::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        box-shadow: 0 0 8px 8px white inset;
        -moz-box-shadow: 0 0 8px 8px white inset;
        -webkit-box-shadow: 0 0 8px 8px white inset;
    }

    .img-shadow img {
        float: left;
    }
    /* Конец добавления размытия по-краям */
</style>