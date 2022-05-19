<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm py-3" style="background-color:#afeeee;">
            <div class="container">
                <a class="navbar-brand mb-0 h1 fw-bolder" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
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

        <main class="main">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
        @endif
          <div class="row" style='height: 92vh;'>
            <div class="col-md-3 p-0">
              <div class="card h-100">
              <div class="card-header d-flex" style="background-color:#FFFFEE;">お金を管理する<a class='ml-auto'><i class="fas fa-plus-circle"></i></a></div>
              <div class="card-body py-2 px-4 mb-3">
                    <form class="ms-1 mt-1" method="post" action="/store">
                        @csrf
                            <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">

                            <div class="col-md-8">
                                {{ __('ジャンル') }}
                                <br>
                                    <select class="form-control mb-2 mt-1" name="genre">
                                        <option value="eat" {{ old('genre') === 'eat' ? 'selected' : ''}}>食費</option>
                                        <option value="daily" {{ old('genre') === 'daily' ? 'selected' : ''}}>日用品</option>
                                        <option value="dat"{{ old('genre') === 'dat' ? 'selected' : ''}}>交際費</option>
                                        <option value="wor"{{ old('genre') === 'wor' ? 'selected' : ''}}>仕事関係</option>
                                        <option value="uti"{{ old('genre') === 'uti' ? 'selected' : ''}}>光熱費など</option>
                                        <option value="mov"{{ old('genre') === 'mov' ? 'selected' : ''}}>交通費</option>
                                        <option value="ent"{{ old('genre') === 'ent' ? 'selected' : ''}}>趣味・娯楽費</option>
                                        <option value="etc"{{ old('genre') === 'etc' ? 'selected' : ''}}>その他</option>
                                    </select>
                            </div><!-- class="col-md-8"> -->

                            <div class="col-md-8">
                                {{ __('詳細') }}
                                    <br>
                                        <input type="text" name="name" class="mb-2 form-control mt-1" value="{{ old('name') }}" placeholder="例：お昼ごはん etc...">
                                            @if($errors->has('name'))
                                                @foreach($errors->get('name') as $message)
                                                    <p class="small text-danger">→ {{ $message }} </p>
                                                @endforeach
                                            @endif 
                            </div><!-- class="col-md-8"> --> 

                            <div class="col-md-8">
                                {{ __('金額') }}
                                <br>
                                <input type="number" name="price" class="mb-2 form-control mt-1" value="{{ old('price') }}" placeholder="例：10000">
                                    @if($errors->has('price'))
                                        @foreach($errors->get('price') as $message)
                                            <p class="small text-danger">→ {{ $message }} </p>
                                        @endforeach
                                    @endif 
                            </div><!--  class="col-md-8"> -->

                            <div class="col-md-8">
                                {{ __('日付') }}
                                <br>
                                <input type="date" name="use_at" class="mb-2 form-control mt-1" value="{{ old('use_at') }}" >
                                @if($errors->has('use_at'))
                                    @foreach($errors->get('use_at') as $message)
                                        <p class="small text-danger">→ {{ $message }} </p>
                                    @endforeach
                                @endif 
                            </div><!--  class="col-md-8"> -->


                            <div class="col-md-8 mt-4">
                                    <button type="submit"  class="btn btn-primary">
                                        {{ __('登録する') }}
                                    </button>
                            </div><!-- class="col-md-8"> -->
                    </form>

            　　</div>
              </div>
        　　</div>
            <div class="col-md-4 p-0">
                <div class="card h-100">
                    <div class="card-header d-flex" style="background-color:#FFFFEE;">詳しく見る<a class='ml-auto'><i class="fas fa-plus-circle"></i></a></div>
                        <div class="card-body p-3 mb-3">
                            <table class="table">
                                <div class="text-center">
                                    <h3>
                                    {{ $date -> year }} 年 {{ $date -> month }} 月 
                                    </h3>
                                </div>
                                <thead>
                                    <tr>
                                        <th>カテゴリー</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="list-group">
                                <a href="{{ route('list')}}" class="btn list-group-item list-group-item-action">{{ __('全体') }}</a></th>
                                <a href="{{ route('eat')}}" class="btn list-group-item list-group-item-action">{{ __('食費') }}</a></th>
                                <a href="{{ route('daily')}}" class="btn list-group-item list-group-item-action">{{ __('日用品') }}</a></th>
                                <a href="{{ route('dat')}}" class="btn list-group-item list-group-item-action">{{ __('交際費') }}</a></th>
                                <a href="{{ route('wor')}}" class="btn list-group-item list-group-item-action">{{ __('仕事関係') }}</a></th>
                                <a href="{{ route('uti')}}" class="btn list-group-item list-group-item-action">{{ __('光熱費など') }}</a></th>
                                <a href="{{ route('mov')}}" class="btn list-group-item list-group-item-action">{{ __('交通費') }}</a></th>
                                <a href="{{ route('ent')}}" class="btn list-group-item list-group-item-action">{{ __('趣味・娯楽') }}</a></th>
                                <a href="{{ route('etc')}}" class="btn list-group-item list-group-item-action">{{ __('その他') }}</a></th>
                            </div><!-- list-group -->
                        </div>
                    </div>    
                </div> <!-- col-md-3 -->
            <div class="col-md-5 p-0">
                @yield('content')
            </div>
          </div> <!-- row justify-content-center -->
        </main>
    </div>
    @yield('footer')
</body>
</html>