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
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('vendor/select2/select2.min.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

    @yield('title')
    <link href="{{asset('font_awesome/css/all.css')}}" rel="stylesheet">
    @yield('header')
</head>

<body>
  @include('messages')
    <div class="page-container">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="/">
                    <img src="{{asset('images/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="{{route('search')}}" method="get">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar Productos" />
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
                        <div class="header-button">
                            <div class="account-wrap">
                                @if (Sentinel::check())
                                <div class="account-item clearfix js-item-menu">
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
                                                    <i class="zmdi zmdi-settings"></i>Lista de Deseos</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="{{route('user.cart')}}">
                                                    <i class="zmdi zmdi-settings"></i>Carrito de Compra</a>
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
            </div>
        </header>
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
                <p>Copyright © {{date("Y")}} Realizado por Rafael Tavarez</p>
            </div>
        </div>
    </div>
    
  <footer>
      <!-- Jquery JS-->
      <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
      <!-- Bootstrap JS-->
      <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
      <!-- Vendor JS       -->
      <script src="{{asset('vendor/slick/slick.min.js')}}">
      </script>
      <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
      <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
      </script>
      <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
      <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
      </script>
      <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
      <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
      <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('vendor/select2/select2.min.js')}}"></script>

      <!-- Main JS-->
      <script src="{{asset('js/main.js')}}"></script>
      @yield('footer')
  </footer>
</body>
</html>
