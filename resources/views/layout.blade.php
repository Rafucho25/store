@php
  $categories = DB::table('categories')->get();               
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')
        <link href="{{asset('font_awesome/css/all.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        @yield('header')
    </head>
    <body>
      @include('messages')
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="/">
                <img src="{{asset('images/logo.png')}}" width="100" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <form action="{{route('search')}}">
              <div class="input-group">
                <input type="text" class="form-control" name="text">
                <select class="form-control" name="category" id="category">
                  <option value="" selected>Todas</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->description}}</option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-outline-primary" value="Enviar">
              </div>
            </form>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              @if (Sentinel::check())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    Cuenta
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile')}}"><i class="fas fa-address-card"></i> Mi Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout')}}"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
                  </div>
                </li>
                <ul class="navbar-nav mr-auto">
                  <li>
                    <a href="{{route('user.wishlist')}}"><i class="far fa-heart text-danger"></i></a>
                  </li>
                  <li>
                    <a href="{{route('user.cart')}}"><i class="fas fa-shopping-cart"></i></a>
                  </li>
                  <li>
                    <a href="{{route('user.orders')}}"><i class="fas fa-shopping-bag text-primary"></i></a>
                  </li>
                </ul>
              @else
                <div class="top-right">
                  <ul class="navbar-nav mr-auto">
                    <li> 
                      <a href="/login"><i class="fas fa-user-circle text-primary"></i></a>
                    </li>
                  </ul>
                </div>
              @endif
            </div>
        </nav>

        @yield('body')
        
        <footer>
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
          @yield('footer')
        </footer>
    </body>
</html>
