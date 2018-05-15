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
<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        background-size: cover;
        background-attachment: fixed;
        content: '';
        will-change: transform;
        z-index: -1;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background-image: url('');

    }


    body::before {

    }
    .content{min-height: 720px;margin-top: 100px;}
</style>
<body>
@Auth
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a></li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endAuth
<div class="content">
@yield('content')
</div>
<footer class="page-footer white grey-text">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 style="font-family: 'Indie Flower', cursive;" class=""><a  href="{{ route('home') }}">by DieDaiDai</a></h5>
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
        var date = new Date();
        var mon_day = date.getMonth() + 1 + '_' + date.getDate();
        $('body').css('background-image',"url('https://img.infinitynewtab.com/InfinityWallpaper/" + mon_day + ".jpg')");
    });


</script>
    @yield('scripts')
</body>
</html>