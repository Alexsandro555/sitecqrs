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
        <v-container fluid grid-list-xs text-xs-center>
            <header class="header-layout">
                <div class="header__menu">
                    <div class="header__main">
                        <v-layout row wrap>
                            <v-flex sm12>
                                <v-layout row wrap>
                                    <v-flex sm5>
                                        <nav class="menu">
                                            <ul>
                                                <li class="menu__first"><a href="#">о компании</a></li>
                                                <li><a href="#">новости</a></li>
                                                <li><a href="#">оборудование</a></li>
                                            </ul>
                                        </nav>
                                    </v-flex>
                                    <v-flex sm2 class="hidden-md-and-down">
                                        <a href="/"><img src="{{asset('images/logo-layer.png')}}"/></a>
                                    </v-flex>
                                    <v-flex sm5>
                                        <v-layout row wrap>
                                            <v-flex xs8>
                                                <nav class="menu">
                                                    <ul>
                                                        <li class="menu__first"><a href="#">доставка и оплата</a></li>
                                                        <li><a href="#">контакты</a></li>
                                                    </ul>
                                                </nav>
                                            </v-flex>
                                            <v-flex xs4 class="hidden-md-and-down">
                                                <v-layout row wrap>
                                                    <v-flex xs11>
                                                        <div class="cart">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td rowspan="2"><img src="{{asset('images/cart.png')}}"/></td>
                                                                    <td><span class="cart__col-yell">2</span> товара на</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="cart__col-yell">1 1000 000</span> руб.</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </v-flex>
                                                    <v-flex xs1 justify-center>
                                                        <img class="find" src="{{asset('images/find.png')}}"/>
                                                    </v-flex>
                                                </v-layout>
                                            </v-flex>
                                        </v-layout>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                            <v-flex sm12>
                                <v-layout row wrap>
                                    <v-flex sm4 class="hidden-md-and-down">
                                        <div class="main-slogan ">
                                            Инновационные <span class="sub-slogan">системы кормления</span>
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
                        </v-layout>
                        <div class="animal-panel">
                            <a href="#"><img src="{{asset('images/chicken-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/pig-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/cow-img-panel.png')}}"/></a>
                            <a href="#"><img src="{{asset('images/bar-img-panel.png')}}"/></a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content-wrapper text-xs-center">
                @yield('content')
            </div>
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
    </template>
</v-app>
<script src="/js/app.js" type="application/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</body>
</html>