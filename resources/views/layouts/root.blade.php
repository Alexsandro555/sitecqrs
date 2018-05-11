<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('storage/favicon_leader.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">-->
    @yield('view.style')
    <title>@yield('title')</title>
</head>
<body>
<v-app id="app">
    <template>
        <v-layout column wrap>
            <v-container fluid grid-list-xs text-xs-center>
                <header class="header">
                    <v-flex xs1>
                        <v-btn dark class="hidden-md-and-up" @click.stop="drawer = !drawer"><v-icon>reorder</v-icon></v-btn>
                    </v-flex>
                    <div class="header-menu hidden-sm-and-down">
                        <v-flex xl12 lg12 md12 sm12 xs12 class="wrapper">
                            <v-layout row wrap>
                                <v-flex xl4 lg4 md5 sm7 xs6>
                                    <v-list class="top-menu text-xs-right text-lg-center">
                                        <v-list-tile class="top-menu__item">о компании</v-list-tile>
                                        <v-list-tile class="top-menu__item">новости</v-list-tile>
                                        <v-list-tile class="top-menu__item">оборудование</v-list-tile>
                                    </v-list>
                                </v-flex>
                                <v-flex xl2 lg2 md2 class="hidden-sm-and-down">
                                    <a href="/"><img src="{{asset('images/logo-layer.png')}}"/></a>
                                </v-flex>
                                <v-flex xl6 lg6 md5 sm5 xs6>
                                    <v-layout row wrap>
                                        <v-flex md12 lg8 xl8 class="text-md-center">
                                            <v-list class="top-menu text-xs-left text-md-center text-sm-left text-lg-center">
                                                <v-list-tile class="top-menu__item">доставка и оплата</v-list-tile>
                                                <v-list-tile class="top-menu__item">контакты</v-list-tile>
                                            </v-list>
                                        </v-flex>
                                        <v-flex xs4 class="hidden-md-and-down">
                                            <v-layout row wrap>
                                                <v-flex xs10>
                                                    <cart-widget></cart-widget>
                                                </v-flex>
                                                <v-flex xs2 justify-center>
                                                    <img class="find" src="{{asset('images/find.png')}}"/>
                                                </v-flex>
                                            </v-layout>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </div>
                    <div class="wrapper">
                        <v-flex sm12>
                            <v-layout row wrap>
                                <v-flex sm4 class="hidden-md-and-down">
                                    <div class="main-slogan">
                                        Инновационные <span class="sub-slogan">системы кормления</span><br>
                                        <span class="main-slogan__from">от европейских производителей</span>
                                    </div>
                                </v-flex>
                                <v-flex sm3 offset-sm3 class="hidden-md-and-down">
                                    <div class="phone text-xs-right">
                                        c 8 до 22 <span class="phone__sun">без выходных</span><br>
                                        <span class="phone__number">+7 (495) 780 44 96</span><br>
                                        <a class="phone__callback" href="#">Заказать звонок</a>
                                    </div>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </div>
                    <div class="wrapper">
                        <div class="animal-panel hidden-md-and-down">
                            <a href="#"><img src="{{asset('images/chicken-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/pig-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/cow-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/bar-img-panel.png')}}"/></a>
                        </div>
                    </div>
                </header>
                @yield('content')
                <footer class="footer">
                    <div class="footer-wrapper">
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-layout row wrap>
                                    <v-flex xs8>
                                        <ul class="footer-top-menu">
                                            <li>О компании</li>
                                            <li>Новости</li>
                                            <li>Оборудование</li>
                                            <li>Доставка и оплата</li>
                                            <li>Контакты</li>
                                        </ul>
                                    </v-flex>
                                    <v-flex xs4>
                                        <img class="footer__sicial-icons" src="{{asset('images/footer-social-icons.png')}}"/>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                            <v-flex xs12>
                                <v-layout row wrap>
                                    <v-flex xs6 class="footer__menu">
                                        <v-layout row wrap>
                                            <v-flex xs4 class="text-xs-left">
                                                <v-list>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Вентиляция
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Комплексные решения
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Кормление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Поение
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Навозоудаление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Содержание
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Доильное оборудлвание
                                                    </v-list-tile>
                                                </v-list>
                                            </v-flex>
                                            <v-flex xs4 class="text-xs-left">
                                                <v-list>
                                                    <v-list-tile avatar>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Вентиляция
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Комплексные решения
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Кормление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Поение
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Навозоудаление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Содержание
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Доильное оборудлвание
                                                    </v-list-tile>
                                                </v-list>
                                            </v-flex>
                                            <v-flex xs4 class="text-xs-left">
                                                <v-list>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Вентиляция
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Комплексные решения
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Кормление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Поение
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Навозоудаление
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Содержание
                                                    </v-list-tile>
                                                    <v-list-tile>
                                                        <img class="footer-menu-ava" src="{{asset('images/footer-menu-ava.png')}}" />
                                                        Доильное оборудлвание
                                                    </v-list-tile>
                                                </v-list>
                                            </v-flex>
                                        </v-layout>
                                    </v-flex>
                                    <v-flex xs2>
                                        <img class="footer__chicken" src="{{asset('images/footer-chicken.png')}}"/>
                                    </v-flex>
                                    <v-flex xs4 class="text-xs-right">
                                        <v-layout column wrap>
                                            <v-flex xs8>
                                                <br>
                                                <span class="footer__phone">
                                                            c 8 до 22 <span class="phone__sun">без выходных</span><br>
                                                            <span class="phone__number">+7 (495) 780 44 96</span><br>
                                                            <a class="phone__callback" href="#">Заказать звонок</a>
                                                        </span>
                                            </v-flex>
                                            <v-flex xs4 class="footer__address text-xs-right">
                                                <v-flex offset-xs6 class="text-xs-left">
                                                    <br>
                                                    <img align="top" src="{{asset('images/footer-mail-img.png')}}"/>
                                                    <span class="footer__mail">info@mail.ru</span><br>
                                                    <img align="top" src="{{asset('images/footer-map-marker-img.png')}}"/>
                                                    Г.Москва, Большая<br> Семеноская д.15<br>
                                                </v-flex>
                                                <img align="middle" src="{{asset('images/logo-small.png')}}"/>&nbsp;&nbsp;&nbsp;© Copyright 2018
                                            </v-flex>
                                        </v-layout>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </div>
                </footer>
            </v-container>
            <v-navigation-drawer v-model="drawer" temporary dark absolute>
                <v-toolbar flat class="transparent">
                    <v-list>
                        <v-list-tile>О компании</v-list-tile>
                        <v-list-tile>Новости</v-list-tile>
                        <v-list-tile>Оборудование</v-list-tile>
                        <v-list-tile>Доставка и оплата</v-list-tile>
                        <v-list-tile>Контакты</v-list-tile>
                    </v-list>
            </v-navigation-drawer>
        </v-layout>
    </template>
</v-app>
<script src="/js/app.js" type="application/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</body>
</html>