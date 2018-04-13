<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title>DIE呆呆</title>

    <!-- Fonts -->


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .headimg{
            box-shadow:0px 0px 10px #333333;
            padding: 6px;
            border-radius: 50%;
            width: 140px;
            transition:transform 1s;
        }
        .headimg:hover
        {
            transform: rotate(360deg);
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <img src="http://q1.qlogo.cn/g?b=qq&nk=945469282&s=5" class="headimg">
        </div>

        <div class="links">
            <a href="{{ route('home') }}">Blog</a>
            <a href="#">SIGN IN</a>
            <a href="https://plus.google.com/106060713350181890306">GOOGLE+</a>
            <a href="https://github.com/Disappointing">GitHub</a>
            <a href="https://coding.net/u/diedaidai">CODING</a>
        </div>
    </div>
</div>
</body>
</html>
