@extends('layouts.root')

@section('content')
   <div class="content-wrapper-top"></div>
   <div class="content-wrapper text-xs-center">
      <div class="content">
      @include('main.menu')
      <v-flex xs12>
         <v-layout row wrap>
            <v-flex offset-xs3 xs6 class="hidden-sm-and-down">
               <p class="content__header text-md-left">Наши акции и <span class="content__subheader">спецпредложения</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right hidden-sm-and-down">
               <a class="content__buttom" href="#">Все акции <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-right hidden-sm-and-down" offset-md3 xs9><img class="content__banner" src="{{asset('images/banner.png')}}"/></v-flex>
            <v-flex  offset-md3 xs8 md6>
               <p class="content__header text-sm-left">Рекомендуемые <span class="content__subheader">товары</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right hidden-xs-only">
               <a class="content__buttom" href="#">В каталог <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-center" offset-md3 xs9>
               <div class="special-product">
                  <a href="#">Воздухонагреватель GP 95 230В (природный газ)</a>
                  <div class="special-product__img">
                     <img src="{{asset('images/special-product.png')}}"/>
                  </div>
                  <div class="special-product__desc">Сделан на заказ из стандартных компонентов</div>
                  <v-layout col wrap>
                     <v-flex xs8 class="special-product__price">
                        <span>145 800 </span> руб.
                     </v-flex>
                     <v-flex xs4 class="special-product__cart">
                        <img @click.prevent="addCart(6)" src="{{asset('images/product-cart.png')}}"/>
                     </v-flex>
                  </v-layout>
               </div>
               <div class="special-product">
                  <a href="#">Вентилятор стеновой Munters EM36 36 дюймов</a>
                  <div class="special-product__img">
                     <img src="{{asset('images/special-product.png')}}"/>
                  </div>
                  <div class="special-product__desc">Сделан на заказ из стандартных компонентов</div>
                  <v-layout col wrap>
                     <v-flex xs8 class="special-product__price">
                        <span>145 800 </span> руб.
                     </v-flex>
                     <v-flex xs4 class="special-product__cart">
                        <img src="{{asset('images/product-cart.png')}}"/>
                     </v-flex>
                  </v-layout>
               </div>
               <div class="special-product">
                  <a href="#">Вохдухонагреватель P mobile 40 230В (дизельное топливо)</a>
                  <div class="special-product__img">
                     <img src="{{asset('images/special-product.png')}}"/>
                  </div>
                  <div class="special-product__desc">Сделан на заказ из стандартных компонентов</div>
                  <v-layout col wrap>
                     <v-flex xs8 class="special-product__price">
                        <span>145 800 </span> руб.
                     </v-flex>
                     <v-flex xs4 class="special-product__cart">
                        <img src="{{asset('images/product-cart.png')}}"/>
                     </v-flex>
                  </v-layout>
               </div>
            </v-flex>
         </v-layout>
      </v-flex>
   </div>
   </div>
   <div class="tree">
        <div class="about-wrapper about--green">
            <div class="about">
                <div class="about__content">
                    <v-flex xs12>
                        <v-layout row wrap>
                            <v-flex xs3 class="news">
                                <p class="content__header text-md-left">Новости</p>
                                <div class="text-xs-left news__conent">
                                    <span class="news__date">12.05.2017</span><br>
                                    <span class="news__header"><a href="#">Сегодня новые поставки</a></span><br>
                                    Например, уровень экономического развития, рынка, кредитн...
                                </div>
                            </v-flex>
                            <v-flex xs6></v-flex>
                            <v-flex xs3></v-flex>
                        </v-layout>
                    </v-flex>
                </div>
            </div>
        </div>
   </div>
   <div class="delivery-wrapper">
      <div class="delivery">
         <v-flex xs12 sm12 md12 lg12 xl12>
            <v-layout row wrap>
               <v-flex xs12 sm12 md7 lg7 xl7 class="text-xs-left text-md-center text-sm-left">
                   <v-layout row wrap>
                       <v-flex offset-xs1 sm6 xl6>
                           <p class="delivery__header text-xs-left">Новинки <span class="delivery__subheader">каталога</span></p>
                       </v-flex>
                       <v-flex xs5 sm5 xl4 class="text-md-right hidden-sm-and-down">
                           <a class="delivery__buttom" href="#">В каталог <v-icon color="green darken-2" medium>keyboard_arrow_right</v-icon></a>
                       </v-flex>
                       <v-flex xs10 offset-xs1 sm10 md12 class="text-xs-left">
                           <div class="special-product text-xs-center">
                               <a href="#">Воздухонагреватель GP 95 230В (природный газ)</a>
                               <div class="special-product__img">
                                   <img src="{{asset('images/special-product.png')}}"/>
                               </div>
                               <div class="special-product__desc">Сделан на заказ из стандартных компонентов</div>
                               <v-layout col wrap>
                                   <v-flex xs8 class="special-product__price">
                                       <span>145 800 </span> руб.
                                   </v-flex>
                                   <v-flex xs4 class="special-product__cart">
                                       <img src="{{asset('images/product-cart.png')}}"/>
                                   </v-flex>
                               </v-layout>
                           </div>
                           <div class="special-product text-xs-center">
                               <a href="#">Воздухонагреватель GP 95 230В (природный газ)</a>
                               <div class="special-product__img">
                                   <img src="{{asset('images/special-product.png')}}"/>
                               </div>
                               <div class="special-product__desc">Сделан на заказ из стандартных компонентов</div>
                               <v-layout col wrap>
                                   <v-flex xs8 class="special-product__price">
                                       <span>145 800 </span> руб.
                                   </v-flex>
                                   <v-flex xs4 class="special-product__cart">
                                       <img src="{{asset('images/product-cart.png')}}"/>
                                   </v-flex>
                               </v-layout>
                           </div>
                       </v-flex>
                   </v-layout>
               </v-flex>
                <v-flex xs12 sm12 md4 lg4 xl4>
                    <v-layout row wrap>
                        <v-flex xs10 offset-xs1 sm10 md10 lg10 xl10>
                            <p class="delivery__header text-xs-left">Наши <span class="delivery__subheader">бренды</span></p>
                        </v-flex>
                        <v-flex xs10 offset-xs1 sm10 md10 lg10 xl10>
                            <p class="delivery__header text-xs-left">Доставка и <span class="delivery__subheader">оплата</span></p>
                        </v-flex>
                        <v-flex xs3 offset-xs1 sm5 md8 lg10 xl10 class="delivery__desc text-xs-left text-xs-left text-md-left">
                            Узнать подробнее об условиях доставки Вы можете при оформлении заказа у нашего специалиста по телефону
                            <span class="delivery__tel">+7 (495) 780-47-96</span> или сделать запрос по электронной почте
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
         </v-flex>
      </div>
   </div>
@endsection