<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="{{asset('storage/favicon_wam.ico')}}" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('view.style')
        <title>@yield('title')</title>
    </head>
    <body>
        <div id="app">
            <header class="header">
                <div class="header__layout">
                    <div class="header__main">
                        <div class="header-center">
                            <nav class="menu">
                                <ul>
                                    <li class="menu__first"><a href="#">о компании</a></li>
                                    <li><a href="#">новости</a></li>
                                    <li><a href="#">оборудование</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right find">
                            <img src="{{asset('images/find.png')}}"/>
                        </div>
                        <div class="header-right">
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
                        </div>
                        <div class="header-right">
                            <nav class="menu">
                                <ul>
                                    <li class="menu__first"><a href="#">доставка и оплата</a></li>
                                    <li><a href="#">контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="logo"><a href="/"><img src="{{asset('images/logo-layer.png')}}"/></a></div>
                        <div class="clear"></div>
                        <span class="main-slogan">
                            <span class="main-slogan__one">Инновационные <br> <span class="sub-slogan">системы кормления</span></span><br><br>
                            <span class="main-slogan__from">от европейских производителей</span>
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
            <div class="content-wrapper">
                <div class="content">
                    <div class="menu-left-wrapper">
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
                                <ul class="menu-left__sub-menu">
                                    <li>Проектирование</li>
                                    <li>Разработка</li>
                                </ul>
                            </span>
                            <span class="menu-left__main-menu">
                                <span class="menu-left-item">
                                    <a href="#">Скотоводство</a>
                                    <img src="{{asset('images/menu-left-item-arrow.png')}}"/>
                                </span>
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
        </div>
    </body>
</html>