<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
    <title>blog</title>
</head>
<body>
@Auth
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a></li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endAuth
@yield('content')
<footer class="page-footer white grey-text">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 style="font-family: 'Indie Flower', cursive;" href="{{ route('index') }}" class="">by DieDaiDai</h5>
                <p class="text-lighten-4">~</p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $(".button-collapse").sideNav();
    });
</script>
    @yield('scripts')
</body>
</html>