<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('storage/favicon_leader.ico')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('view.style')
    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
        <v-app id="inspire">
            <template>
                <v-container fluid grid-list-xs text-xs-center>
                    <header class="header">
                        <div class="header__layout">
                            <div class="header__main">
                                <v-layout row wrap>
                                    <v-flex xs12>
                                        <v-layout row wrap>
                                            <v-flex xs5>
                                                <nav class="menu">
                                                    <ul>
                                                        <li class="menu__first"><a href="#">о компании</a></li>
                                                        <li><a href="#">новости</a></li>
                                                        <li><a href="#">оборудование</a></li>
                                                    </ul>
                                                </nav>
                                            </v-flex>
                                            <v-flex xs2>
                                                <a href="/"><img src="{{asset('images/logo-layer.png')}}"/></a>
                                            </v-flex>
                                            <v-flex xs5>
                                                <v-layout row wrap>
                                                    <v-flex xs7>
                                                        <nav class="menu">
                                                            <ul>
                                                                <li class="menu__first"><a href="#">доставка и оплата</a></li>
                                                                <li><a href="#">контакты</a></li>
                                                            </ul>
                                                        </nav>
                                                    </v-flex>
                                                    <v-flex xs5>
                                                        <v-layout row wrap>
                                                            <v-flex xs8>
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
                                                            <v-flex xs4 justify-center>
                                                                <img class="find" src="{{asset('images/find.png')}}"/>
                                                            </v-flex>
                                                        </v-layout>
                                                    </v-flex>
                                                </v-layout>
                                            </v-flex>
                                        </v-layout>
                                    </v-flex>
                                </v-layout>
                                <span class="main-slogan">
                                    <span class="main-slogan__one">
                                        Инновационные <br>
                                        <span class="sub-slogan">системы кормления</span>
                                    </span> <br>
                                    <p class="text-xs-left">
                                        <span class="main-slogan__from">от европейских производителей</span>
                                    </p>
                                </span>
                                <span class="phone">
                                    c 8 до 22 <span class="phone__sun">без выходных</span><br>
                                    <sapn class="phone__number">+7 (495) 780 44 96</sapn><br>
                                    <a class="phone__callback" href="#">Заказать звонок</a>
                                </span>
                                <div class="animal-panel">
                                    <a href="#"><img src="{{asset('images/chicken-img-panel.png')}}"/></a>
                                    <a href="#"><img src="{{asset('images/pig-img-panel.png')}}"/></a>
                                    <a href="#"><img src="{{asset('images/cow-img-panel.png')}}"/></a>
                                    <a href="#"><img src="{{asset('images/bar-img-panel.png')}}"/></a>
                                </div>
                            </div>
                        </div>

                    </header>
                    <div class="content-wrapper text-xs-left">
                        <div class="content">
                            <div class="menu-left-wrapper">
                                <img class="menu-left__hr-img" src="{{asset('images/menu-left-hr.png')}}"/>
                                <div class="menu-left">
                                    <div class="menu-left__header">КАТАЛОГ ПРОДУКЦИИ</div>
                                    <span class="menu-left__main-menu">
                                <span class="menu-left-item">
                                    <a href="#">Птицеводство</a>
                                    <img src="{{asset('images/menu-left-item-arrow.png')}}"/>
                                </span>
                            </span>
                                    <span class="menu-left__main-menu">
                                <span class="menu-left-item">
                                    <a href="#">Свиноводство</a>
                                    <img src="{{asset('images/menu-left-item-arrow.png')}}"/>
                                </span>
                                <ul>
                                    <li><a href="#"><img src="{{asset('images/menu-left-item-sub-arr.png')}}"/>&nbsp;&nbsp;Кормление</a></li>
                                    <li><a href="#"><img src="{{asset('images/menu-left-item-sub-arr.png')}}"/>&nbsp;&nbsp;Поение</a></li>
                                    <li><a href="#"><img src="{{asset('images/menu-left-item-sub-arr.png')}}"/>&nbsp;&nbsp;Сбор</a></li>
                                </ul>

                            </span>
                                    <span class="menu-left__main-menu">
                                <span class="menu-left-item">
                                    <a href="#">Скотоводство</a>
                                    <img src="{{asset('images/menu-left-item-arrow.png')}}"/>
                                </span>
                                <div class="sub-menu">
                                    <div class="sub-menu__block">
                                        <ul>
                                             <li>
                                                 <span><a href="#">Кормление</a></span>
                                                <ul class="sub-menu__items">
                                                    <li><a href="#">Проектирование</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span><a href="#">Обогрев</a></span>
                                                <ul class="sub-menu__items">
                                                    <li><a href="#">Проектирование</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="sub-menu__block">
                                        <ul>
                                             <li>
                                                 <span><a href="#">Кормление</a></span>
                                                <ul class="sub-menu__items">
                                                    <li><a href="#">Проектирование</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span><a href="#">Обогрев</a></span>
                                                <ul class="sub-menu__items">
                                                    <li><a href="#">Проектирование</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                    <li><a href="#">Разработка</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </span>
                                    <span class="menu-left__main-menu">
                                <span class="menu-left-item">
                                    <a href="#">Прочее</a>
                                    <img src="{{asset('images/menu-left-item-arrow.png')}}"/>
                                </span>
                            </span>
                                </div>
                            </div>
                            <br>
                            @yield('content')
                        </div>
                    </div>
                </v-container>
            </template>
        </v-app>
    </div>
    <script src="/js/app.js" type="application/javascript"></script>
</body>
</html>