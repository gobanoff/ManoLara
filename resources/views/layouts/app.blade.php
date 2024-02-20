<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Mados Namai
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Masters</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('master.index')}}">Masters List</a></li>
                                <li><a class="dropdown-item" href="{{route('master.create')}}">New Master</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outfits</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                <li><a class="dropdown-item" href="{{route('outfit.index')}}">Outfits List</a></li>
                                <li><a class="dropdown-item" href="{{route('outfit.create')}}">New Outfit</a></li>
                            </ul>
                        </li>
                        









                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
       @if ($errors->any())
          <div class="alert">
             <ul class="list-group">
               @foreach ($errors->all() as $error)
                 <li class="list-group-item list-group-item-danger">{{$error}}</li>
               @endforeach
             </ul> 
            </div>
        @endif
    </div>
  </div>
</div>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-9">
           @if (session()->has('success_message'))
              <div class="alert alert-success" role="alert">
                  {{session()->get('success_message')}}
              </div>
           @endif
           @if (session()->has('info_message'))
              <div class="alert alert-info" role="alert">
               {{session()->get('info_message')}}
               </div>
           @endif
           @if (session()->has('danger_message'))
           <div class="alert alert-danger role="alert">
            {{session()->get('danger_message')}}
            </div>
        @endif



        </div>
    </div>
</div>







        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
