@extends('layouts.root')

@section('content')
   <div class="content-wrapper-top"></div>
   <div class="content-wrapper text-xs-center">
      <div class="content">
        @include('main.menu')
        <v-flex xs12>
         <v-layout row wrap>
            <v-flex offset-xs3 xs6 class="hidden-md-and-down">
               <p class="content__header text-md-left">Наши акции и <span class="content__subheader">спецпредложения</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right hidden-md-and-down">
               <a class="content__buttom" href="#">Все акции <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-right hidden-md-and-down" offset-md3 xs9><img class="content__banner" src="{{asset('images/banner.png')}}"/></v-flex>
            <v-flex  offset-md3 xs8 md6>
               <p class="content__header text-sm-left">Рекомендуемые <span class="content__subheader hidden-sm-and-down">товары</span></p>
               <div class="banner"></div>
            </v-flex>
            <v-flex xs3 class="text-md-right hidden-xs-only">
               <a class="content__buttom" href="#">В каталог <v-icon color="yellow darken-2" medium>keyboard_arrow_right</v-icon></a>
            </v-flex>
            <v-flex class="text-md-center" offset-md3 offset-xs1 lg9 md8 sm9 xs10>
                <leader-slider :perpage=3 url="/catalog/special-products" :per-custom="[[200, 1], [480, 1], [720, 1], [960, 2], [1270, 3]]"></leader-slider>
            </v-flex>
         </v-layout>
      </v-flex>
    </div>
   </div>
   <div class="tree">
        <div class="about-wrapper about--green">
            <div class="about">
            <v-content>
                <div class="about__content">
                    <v-flex xs12>
                        <v-layout row wrap>
                            <v-flex xs10 sm10 md3 class="news hidden-sm-and-down">
                                <p class="content__header text-xs-left">Новости</p>
                                <div class="text-xs-left news__conent ">
                                    <span class="news__date">12.05.2017</span><br>
                                    <span class="news__header"><a href="#">Сегодня новые поставки</a></span><br>
                                    <v-flex xs4 sm12>
                                        Например, уровень экономического развития, рынка, кредитн...
                                    </v-flex>

                                </div>
                                <div class="text-xs-left news__conent">
                                    <span class="news__date">12.05.2017</span><br>
                                    <span class="news__header"><a href="#">Сегодня новые поставки</a></span><br>
                                    <v-flex xs4 sm12>
                                        Например, уровень экономического развития, рынка, кредитн...
                                    </v-flex>
                                </div>
                                <div class="text-xs-left">
                                    <a class="content__buttom news__button" href="#">Все новости</a>
                                </div>

                            </v-flex>
                            <v-flex class="text-xs-left" xs10 sm10 md6>
                                <p class="content__header text-md-left">О компании <span class="content__subheader hidden-sm-and-down">и оборудовании</span></p>
                                <v-flex class="about__left" xs3 sm6 md12>
                                    Группа Компаний - это универсальный поставщик оборудования и комплектующих для
                                    птицеводства. Это оптимальное решение для птицефабрик, которые имеют оборудование различных
                                    производителей и марок. В настоящее время мы поставляем запасные части, расходные материалы и
                                    оборудование для содержания птицы ведущих мировых компаний.
                                </v-flex>
                                <v-flex class="about__left about__cit" xs3 sm6 md12>
                                    Это всегда оригинальная продукция, стабильные сроки поставки Товара и гарантия качества. Склады запасных
                                    частей и расходных материалов расположены в городе Смоленске (Российская Федерация) и в городе Минске (Республика Беларусь)
                                </v-flex>
                                <a class="about-official about__left" href="#">Посетить оффициальный сайт</a>
                            </v-flex>
                            <v-flex xs3 class="hidden-md-and-down">
                                <p class="content__header text-md-left low-font">Внимание! <span class="content__subheader">акция</span></p>
                                <div class="stock about__left">
                                    <v-flex xs12>
                                        <v-layout row wrap>
                                            <v-flex xs4 class="stock__pr">
                                                <span>Скидка</span>
                                                15%
                                            </v-flex>
                                            <v-flex xs8 class="stock__desc text-xs-left">
                                                Поилки для кур rocwell
                                            </v-flex>
                                            <v-flex xs12 class="stock__price">
                                                <div class="stock__price--bottom">
                                                    148 800 <span class="stock__sub-price">руб.</span>
                                                    <a class="content__buttom stock__btn" href="#">Подробнее</a>
                                                </div>
                                            </v-flex>
                                        </v-layout>
                                    </v-flex>
                                </div>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                </div>
            </v-content>
            </div>
        </div>
   </div>
   <div class="delivery-wrapper">
      <!--<div class="delivery">-->
          <v-content>
            <v-flex xs12 sm12 md12 lg12 xl12>
            <v-layout row wrap>
               <v-flex xs12 sm12 md7 lg7 xl7 >
                   <v-layout row wrap>
                       <v-flex offset-xs1 xs11 sm7 xl7>
                           <p class="delivery__header text-xs-left">Новинки <span class="delivery__subheader">каталога</span></p>
                       </v-flex>
                       <v-flex xs5 sm4 xl4 class="text-md-right hidden-sm-and-down">
                           <a class="delivery__buttom" href="#">В каталог <v-icon color="green darken-2" medium>keyboard_arrow_right</v-icon></a>
                       </v-flex>
                       <v-flex offset-xs1 xs10 sm6 md10 lg10 class="text-xs-left">
                           <leader-slider :perpage="2" url="/catalog/special-products" :per-custom="[[200, 1], [480, 1], [720, 1], [960, 2], [1270, 2]]"></leader-slider>
                       </v-flex>
                   </v-layout>
               </v-flex>
                <v-flex xs12 sm12 md4 lg5 xl5>
                    <v-layout row wrap>
                        <v-flex xs10 offset-xs1 sm10 md10 lg10 xl10>
                            <p class="delivery__header text-xs-left">Наши <span class="delivery__subheader">бренды</span></p>
                        </v-flex>
                        <v-flex xs10 offset-xs1 sm10 md10 lg10 xl10>
                            <p class="delivery__header text-xs-left">Доставка и <span class="delivery__subheader">оплата</span></p>
                        </v-flex>
                        <v-flex xs11 offset-xs1 sm5 md8 lg10 xl10 class="delivery__desc text-xs-left text-xs-left text-md-left delivery__info">
                            Узнать подробнее об условиях доставки Вы можете при оформлении заказа у нашего специалиста по телефону<br>
                            <span class="delivery__tel">+7 (495) 780-47-96</span> или сделать запрос по электронной почте
                        </v-flex>
                        <v-flex xs12>
                            <v-layout row wrap>
                                <v-flex xs12 sm12 md12 class="text-md-left">
                                    <v-layout row wrap>
                                        <v-flex xs2 offset-xs1>
                                            <img align="left" src="{{asset('images/delivery-circle-1.png')}}"/>
                                        </v-flex>
                                        <v-flex xs6 md9 class="text-xs-left">
                                            <span class="deliverty_tabl">Оплата производиться <br> по безналичному расчету.</span>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                                <v-flex xs12 sm12 md12  class="text-md-left">
                                    <v-layout row wrap>
                                        <v-flex xs2 offset-xs1>
                                            <img align="left" src="{{asset('images/delivery-circle-2.png')}}"/>
                                        </v-flex>
                                        <v-flex xs6 md9 class="text-xs-left">
                                            <span class="deliverty_tabl">Возможна оплата наличными при доставке на объект Заказчика</span>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
         </v-flex>
          </v-content>
      <!--</div>-->
   </div>
@endsection