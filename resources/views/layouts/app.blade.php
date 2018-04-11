<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>blog</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="">laravel</a></li>
                <li><a href="">git</a></li>
                <li><a href="">vue</a></li>
                <li><a href="">talk about other</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="">laravel</a></li>
                <li><a href="">git</a></li>
                <li><a href="">vue</a></li>
                <li><a href="">talk about other</a></li>
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
</body>
</html>