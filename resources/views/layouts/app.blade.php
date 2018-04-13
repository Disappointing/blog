<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
    <title>blog</title>
</head>
<style>
    body{background-color: #fafafa}
</style>
<body>
    <nav>
        <div class="nav-wrapper">
            <a style="font-family: 'Indie Flower', cursive;" href="{{ route('index') }}" class="brand-logo center">DieDaidai</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('home') }}" >主页</a></li>
                @Auth
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endAuth

            </ul>
            <ul class="side-nav" id="mobile-demo">
                <a href="{{ route('home') }}" >主页</a>

            </ul>
        </div>
    </nav>
@yield('content')
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