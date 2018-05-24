<template>
    <div>
        <carousel name="carousel" :style="{ height: '428px'}"  :pagination-enabled=false :navigation-enabled=true :per-page=perpage  :per-page-custom="perCustom">
            <slide v-for="item in items" :key="item.id">
                <div class="special-product text-xs-center" align="center">
                    <div class="special-product__header text-xs-center">
                        <a href="'/catalog/detail/'+item.slug">{{item.title.length>52?item.title.substr(0,50)+'...':item.title}}</a>
                    </div>
                    <div class="special-product__img">
                        <img src="/images/special-product.png"/>
                    </div>
                    <div class="special-product__desc text-xs-center">Сделан на заказ из стандартных компонентов</div>
                    <v-layout col wrap>
                        <v-flex xs8 class="special-product__price text-xs-center">
                            <span>{{Math.floor(item.price)}}</span> руб.
                        </v-flex>
                        <v-flex xs4 class="special-product__cart">
                            <img @click.prevent="addCart(6)" src="/images/product-cart.png"/>
                        </v-flex>
                    </v-layout>
                </div>
                <!--<div class="product-wrapper">
                    <div class="product">
                        <div class="product-image">
                            <template v-for="(file, index) in item.file">
                                <img v-if="index === 'medium'" :src="'/storage/'+file.filename"/>
                            </template>
                            <img v-if="!item.file" :src="'/storage/no-image.png'" height="200px"/>
                        </div>
                        <div class="product-name"><a :href="'/catalog/detail/'+item.slug">{{item.title.length>52?item.title.substr(0,50)+'...':item.title}}</a></div>
                        <div class="product-desc">
                            Сделан на заказ из стандартных компонентов
                            <hr class="product-hr">
                            <div>
                                <span class="product-price">{{Math.floor(item.price)}}</span><span class="product-rub"> руб.</span>
                                <a href="#" @click.prevent="addCart(item.id)"><img src="/storage/product-cart.png"/></a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </slide>
        </carousel>
    </div>
</template>
<script>
    import { Carousel, Slide } from 'vue-carousel';

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
                if(response.data.length > 0) {
                    response.data.forEach(element => {
                        let obj = {
                            'id': element.id,
                            'title': element.title,
                            'price': element.price,
                            'file': element.files.length>0?element.files.shift().config.files:null,
                            'slug': element.url_key
                        };
                        this.items.push(obj);
                    });
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        methods: {
        },
        components: {
            Carousel,
            Slide
        }
     }
</script>