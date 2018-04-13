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
            <header class="header-page">
                <div class="header-page__layout">
                    <div class="header-page__main">
                        <div class="header-center">
                            <nav class="menu-nav">
                                <ul>
                                    <li><a href="#">о компании</a></li>
                                    <li><a href="#">новости</a></li>
                                    <li><a href="#">оборудование</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <nav class="login">
                                <ul>
                                    <li><a href="/login">Войти</a></li>
                                    <li><a href="/register">Регистрация</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <nav class="menu-nav">
                                <ul>
                                    <li><a href="#">доставка и оплата</a></li>
                                    <li><a href="#">контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="logo-layer"><a href="/"><img src="{{asset('storage/logo-layer.png')}}"/></a></div>
                        <div class="clear"></div>
                        <span class="main-slogan">Технологическое оборудование <br> <span class="sub-slogan">для производств</span></span>
                    </div>
                </div>
                <div class="header-page__contact-wrapper">
                    <div class="header-page__contact">
                        c 8 до 22 <span class="header__blue-mark">без выходных</span><br>
                        <span class="header__tel">8 (495) 989 67 89</span><br>
                        <a class="header__back-call" href="#">Заказать звонок</a>&nbsp;&nbsp;
                        <a class="header-page__email" href="#">INFO@WAM.RU</a>
                    </div>
                </div>
            </header>
            @yield('content')
        </div>
    </body>
</html>