<template>
    <v-flex xs5 class="detail__image">
        <v-container fluid grid-list-md>
            <v-layout column align-center wrap>
                <div class="detail__image-big">
                    <div class="detail-images-center">
                        <img v-if="curImage" class="text-xs-center" :src="curImage" />
                        <img v-else src="/images/no-image.png" class="text-xs-center" width="200px"/>
                    </div>
                </div>
                <div>
                    &nbsp;
                    <carousel v-if="items.length>0" name="carousel4"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
                        <slide v-for="item in items" :key="item.id">
                            <div class="carousel-slide" @click="selectSlide(item.id)">
                                <img :src="'/storage/'+item.file"/>
                            </div>
                        </slide>
                    </carousel>
                </div>
            </v-layout>
        </v-container>
        <!--<v-layout column wrap>
            <div class="detail__image-big">
                <div class="detail-images-center">
                    <img v-if="curImage" class="text-xs-center" :src="curImage" />
                    <img v-else src="/images/no-image.png" class="text-xs-center" width="200px"/>
                </div>
            </div>
            <div>
                &nbsp;
                <carousel v-if="items.length>0" name="carousel4"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
                    <slide v-for="item in items" :key="item.id">
                        <div class="carousel-slide" @click="selectSlide(item.id)">
                            <img :src="'/storage/'+item.file"/>
                        </div>
                    </slide>
                </carousel>
            </div>
        </v-layout>-->
        <!--

        </div>
        <div>
            <carousel name="carousel4" style="width: 270px; height: 100px; margin-left: 20px;"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
                <slide v-for="item in items" :key="item.id">
                    <div class="carousel-slide" @click="selectSlide(item.id)">
                        <img :src="'/storage/'+item.file"/>
                    </div>
                </slide>
            </carousel>
        </div>-->
    </v-flex>
</template>
<script>
    import { Carousel, Slide } from 'vue-carousel';

    export default {
        props: {
            url: String,
        },
        data: function() {
            return {
                elements: [],
                items:[],
                curImage: '',
            }
        },
        mounted() {
            axios.get(this.url).then(response =>
            {
                this.elements = response.data
                response.data.forEach(element => {
                    this.items.push({'id': element.id, 'file': element.config.files.small.filename});
                });
                this.curImage = this.items.length>0?'/storage/' + this.elements[0].config.files.main.filename:null
            }).catch(error => { console.log(error); });
        },
        components: {
            Carousel,
            Slide
        },
        methods: {
            selectSlide: function (id, event) {
                this.elements.forEach(element => {
                    if(element.id === id) {
                        this.curImage = '/storage/'+element.config.files.main.filename;
                    }
                });
            }
        }
    }
</script>

<style>
    .detail__image {
        display: block;
    }

    .detail__image-big {
        display: block;
        float: left;
        width: 306px;
        //height: 259px;
        background-color: white;
        margin-top:25px;
    }

    .detail-images-center {
        margin: 5px;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        height: 259px;
        line-height: 259px;
    }

    .detail-images-center img {
        display: inline-block;
        vertical-align: middle;
    }
</style>