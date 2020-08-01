@php
  $categories = DB::table('categories')->get();               
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">

    @yield('title')
    <link href="/font_awesome/css/all.css" rel="stylesheet">
    @yield('header')
</head>

<body>
  @include('messages')
    <div class="">
        <!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="/">
                    <img src="{{asset('images/logo.jpg')}}" height="40px" width="150px" alt="Store" />
                </a>
            </div>
            <form class="form-header" action="{{route('search')}}" method="get">
                <input class="au-input au-input--xl" type="text" name="text" placeholder="Buscar Productos" />
                <select class="form-control" name="category" id="category">
                    <option value="" selected>Todas</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->description}}</option>
                    @endforeach
                </select>
                <button class="au-btn--submit" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </form>
            <div class="header__tool">
                <div class="account-wrap">
                    @if (Sentinel::check())
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{asset(Sentinel::getUser()->photo)}}" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{Sentinel::getUser()->first_name}}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{asset(Sentinel::getUser()->photo)}}" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">{{Sentinel::getUser()->first_name }} {{Sentinel::getUser()->last_name}}</a>
                                    </h5>
                                    <span class="email">{{Sentinel::getUser()->email}}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="{{ route('user.profile')}}">
                                        <i class="zmdi zmdi-account"></i>Mi cuenta</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="{{route('user.wishlist')}}">
                                        <i class="zmdi zmdi-label-heart"></i>Lista de Deseos</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="{{route('user.cart')}}">
                                        <i class="zmdi zmdi-shopping-cart"></i>Carrito de Compra</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="{{route('user.orders')}}">
                                        <i class="zmdi zmdi-money-box"></i>Ordenes</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="{{ route('logout')}}">
                                    <i class="zmdi zmdi-power"></i>Cerrar Sesion</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="account-item clearfix js-item-menu">
                        <div class="image">
                            <a href="{{route('login')}}">
                                <img src="{{asset('images/users/template.png')}}" alt="User" />
                            </a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="{{route('login')}}">
                                        <i class="zmdi zmdi-account"></i>Iniciar Sesion</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="{{route('register')}}">
                                        <i class="zmdi zmdi-settings"></i>Registrarse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <form class="form-header" action="{{route('search')}}" method="get">
                <input class="au-input au-input--xl" type="text" name="text" placeholder="Buscar Productos" />
                <select class="form-control" name="category" id="category">
                    <option value="" selected>Todas</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->description}}</option>
                    @endforeach
                </select>
                <button class="au-btn--submit" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </form>
        </div>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <div class="account-wrap">
            @if (Sentinel::check())
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="{{asset(Sentinel::getUser()->photo)}}" alt="John Doe" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{Sentinel::getUser()->first_name}}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="{{asset(Sentinel::getUser()->photo)}}" alt="John Doe" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{Sentinel::getUser()->first_name }} {{Sentinel::getUser()->last_name}}</a>
                            </h5>
                            <span class="email">{{Sentinel::getUser()->email}}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                            <a href="{{ route('user.profile')}}">
                                <i class="zmdi zmdi-account"></i>Mi cuenta</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="{{route('user.wishlist')}}">
                                <i class="zmdi zmdi-label-heart"></i>Lista de Deseos</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="{{route('user.cart')}}">
                                <i class="zmdi zmdi-shopping-cart"></i>Carrito de Compra</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="{{route('user.orders')}}">
                                <i class="zmdi zmdi-money-box"></i>Ordenes</a>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="{{ route('logout')}}">
                            <i class="zmdi zmdi-power"></i>Cerrar Sesion</a>
                    </div>
                </div>
            </div>
            @else
            <div class="account-item clearfix js-item-menu">
                <div class="image">
                    <a href="{{route('login')}}">
                        <img src="{{asset('images/users/template.png')}}" alt="User" />
                    </a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                            <a href="{{route('login')}}">
                                <i class="zmdi zmdi-account"></i>Iniciar Sesion</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="{{route('register')}}">
                                <i class="zmdi zmdi-settings"></i>Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
    </div>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © {{date("Y")}} Realizado por Nombre: Rafael Tavarez Matricula: 100401245 Asignatura: Lenguaje de Programación III Sección: 03 Profesor: Jimmy Rosario Bernard</p>
            </div>
        </div>
    </div>
    
  <footer>
      <!-- Jquery JS-->
      <script src="/vendor/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap JS-->
      <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
      <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
      <!-- Vendor JS       -->
      <script src="/vendor/slick/slick.min.js">
      </script>
      <script src="/vendor/wow/wow.min.js"></script>
      <script src="/vendor/animsition/animsition.min.js"></script>
      <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
      </script>
      <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
      <script src="/vendor/counter-up/jquery.counterup.min.js">
      </script>
      <script src="/vendor/circle-progress/circle-progress.min.js"></script>
      <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
      <script src="/vendor/select2/select2.min.js"></script>

      <!-- Main JS-->
      <script src="/js/main.js"></script>
      @yield('footer')
  </footer>
</body>
</html>
