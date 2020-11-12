<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .module {
            width: 250px;
            overflow: hidden;
        }

        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('welcome') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category') }}">Рубрики</a>
                </li>
            </ul>
        </div>
        <a class="btn btn-dark" href="{{ route('order') }}">Заказ</a>
        <a class="btn btn-dark" href="{{ route('feedback') }}">Обратная связь</a>
        @if(Auth::user())
            <a class="btn btn-dark" href="{{ route('admin') }}">Админ</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" class="btn btn-light" value="Выйти">
            </form>
        @else
            <a class="btn btn-light" href="{{ route('admin') }}">Войти</a>
        @endif
    </nav>

    <br>
    @if(isset($errors) && !empty($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    @yield('content')
    <script src="{{ mix('/js/app.js') }}"></script>
</div>
</body>
</html>
