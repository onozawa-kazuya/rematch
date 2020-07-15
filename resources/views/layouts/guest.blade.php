<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!--CSRF TOKEN-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        <!--scripts-->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!--fonts-->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!--styles-->
        <link href="{{ secure_asset('/css/guest.css') }}" rel="stylesheet">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    
    
    <header>
      <h1 class="title">ReMatCh<a href="{{ url('guest/front') }}"></a></h1>
    </header>
      
        <nav class="navbar navbar-expand-md sticky-top navbar-light bg-light p-4">
          
          <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('guest/front') }}">HOME</a>
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" href="#">GUIDE</a>
              </li>
              
                @guest
                  <!--ログイン-->
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                @else
                  <!--ログアウト-->
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('user/mypage')}}">MY PAGE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                      @csrf
                    </form>
                  </li>
                @endguest
            </ul>
          </div>
        </nav>
        
    <body>
      <div id="wrapper">
        @yield('content')
      </div>
    </body>
    
        <footer>
          <h4 class="text-center">ReMatCh<a href="#"></a>
          <p class="copyright">Copyright © 2020 0624 All Rights Reserved.</p>
          </h4>
        </footer>
    
</html>