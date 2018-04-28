@extends('layouts.root')

@section('content')
   <div class="content">
      @include('main.menu')
      <v-flex xs12>
         <v-layout row wrap>
            <v-flex offset-xs3 xs6>
               <p class="content__header text-md-left">Наши акции и <span class="content__subheader">спецпредложения</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right">
               <a class="content__buttom" href="#">Все акции <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-right" offset-xs3 xs9><img src="{{asset('images/banner.png')}}"/></v-flex>
            <v-flex offset-xs3 xs6>
               <p class="content__header text-md-left">Рекомендуемые <span class="content__subheader">товары</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right">
               <a class="content__buttom" href="#">В каталог <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-center" offset-xs3 xs9>
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
                     <v-felx xs4 class="special-product__cart">
                        <img src="{{asset('images/product-cart.png')}}"/>
                     </v-felx>
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
                     <v-felx xs4 class="special-product__cart">
                        <img src="{{asset('images/product-cart.png')}}"/>
                     </v-felx>
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
                     <v-felx xs4 class="special-product__cart">
                        <img src="{{asset('images/product-cart.png')}}"/>
                     </v-felx>
                  </v-layout>
               </div>
            </v-flex>
         </v-layout>
      </v-flex>
   </div>
   <!--<div class="about-wrapper">
   </div>-->
   <div class="delivery-wrapper">
      <div class="delivery">
         <v-flex xs12>
            <v-layout row wrap>
               <v-flex xs6>
                  <v-layout row wrap>
                     <v-flex xs8>
                        <p class="delivery__header text-md-left">Новинки <span class="delivery__subheader">каталога</span></p>
                     </v-flex>
                     <v-flex xs4 class="text-md-right">
                        <a class="delivery__buttom" href="#">В каталог <v-icon color="green darken-2" medium>keyboard_arrow_right</v-icon></a>
                     </v-flex>
                     <v-flex xs12>
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
                              <v-felx xs4 class="special-product__cart">
                                 <img src="{{asset('images/product-cart.png')}}"/>
                              </v-felx>
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
                              <v-felx xs4 class="special-product__cart">
                                 <img src="{{asset('images/product-cart.png')}}"/>
                              </v-felx>
                           </v-layout>
                        </div>
                     </v-flex>
                  </v-layout>
               </v-flex>
               <v-flex xs6>
                  <v-flex xs12>
                     <p class="delivery__header text-md-left">Наши <span class="delivery__subheader">бренды</span></p>
                  </v-flex>
                  <v-flex xs12>
                     <p class="delivery__header text-md-left">Доставка и <span class="delivery__subheader">оплата</span></p>
                  </v-flex>
                  <v-flex xs12 class="delivery__desc text-md-left">
                     Узнать подробнее об условиях доставки Вы можете при оформлении заказа у нашего специалиста по телефону
                     <span class="delivery__tel">+7 (495) 780-47-96</span> или сделать запрос по электронной почте
                  </v-flex>
                  <v-flex xs12>
                     <v-layout row wrap>
                        <v-flex xs6 class="text-md-left">
                           <v-layout row wrap>
                              <v-flex xs3>
                                 <img align="left" src="{{asset('images/delivery-circle-1.png')}}"/>
                              </v-flex>
                              <v-flex xs9>
                                 <span class="deliverty_tabl">Оплата производиться по безналичному расчету.</span>
                              </v-flex>
                           </v-layout>
                        </v-flex>
                        <v-flex xs6 class="text-md-left">
                           <v-layout row wrap>
                              <v-flex xs3>
                                 <img align="left" src="{{asset('images/delivery-circle-2.png')}}"/>
                              </v-flex>
                              <v-flex xs9>
                                 <span class="deliverty_tabl">Возможна оплата наличными при доставке на объект Заказчика</span>
                              </v-flex>
                           </v-layout>
                        </v-flex>
                     </v-layout>
                  </v-flex>
               </v-flex>
            </v-layout>
         </v-flex>
      </div>
   </div>
@endsection