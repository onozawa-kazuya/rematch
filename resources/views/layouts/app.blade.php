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
        <link href="{{ secure_asset('/css/app.css') }} rel="stylesheet">
        <link href="{{ secure_asset('/css/user.css') }} rel="stylesheet">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    
    
    <body style="padding-top: 4.5rem;">
        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark mb-4">
          <a class="navbar-brand" href="#">{{ config('APP_NAME', 'ReMatCh') }}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!--左側-->
          <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">ホーム <span class="sr-only">(現位置)</span></a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#">リンク</a>
              </li>
              
              
              <!--<li class="nav-item dropdown">-->
              <!--  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">dropdown</a>-->
              <!--  <div class="dropdown-menu" aria-labelledby="dropdown01">-->
              <!--    <a class="dropdown-item" href="#">リンク1</a>-->
              <!--    <a class="dropdown-item" href="#">リンク2</a>-->
              <!--    <a class="dropdown-item" href="#">リンク3</a>-->
              <!--  </div>-->
              <!--</li>-->
            </ul>
          　
              <!--右側-->
              <ul class="navbar-nav ml-auto">
                @guest
                <!--ログイン-->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                
                @else
                <!--ログアウト-->
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
        
        <main class="py-4">
            @yield('content')
        </main>
        
    </body>
</html>

