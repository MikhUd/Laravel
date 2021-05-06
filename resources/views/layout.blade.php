<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Century Gothic', sans-serif;

        }
        body{
            background: url("https://cdn.pixabay.com/photo/2017/08/07/07/55/black-and-white-2601197_1280.jpg") no-repeat center center fixed;

            background-size: cover;
            min-height: 100vh;
        }

        header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 40px 100px;
            z-index: 1000000;
            background-color: #000;
        }

        header .logo{
            position: relative;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.6s;
            font-family: 'Jersey Sharp' , serif;
        }
        header ul{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
        }
        header ul li{
            position: relative;
            list-style: none;
        }
        header ul li a{
            position: relative;
            margin: 0 15px;
            text-decoration: none;
            color: #fff;
            letter-spacing: 2px;
            font-weight: 500;
            transition: 0.5s;
        }
        .container{

            margin-top: 150px;
            position: relative;
            width: 100%;
            height: 100vh;
        }
        header.hui{
            background: #ffffff;
            padding: 0px 100px;
            transition: 0.5s;
        }
        header span,
        header .logo,
        header ul li a:hover{
            color: #4dc0b5;
            transition: 0.5s;
            text-decoration: none;
        }
        .fa {

            color: black;
        }
        header .btn{
            background-color: white;
        }
        header ul li a button:hover{
            background-color: #4dc0b5;
            transition: 0.5s;
        }
        header.hui span,
        header.hui .logo,
        header.hui ul li a{
            color: black;
        }

    </style>

</head>

<body class="text-white content">
<header>
    <p class="logo">dvach</p>
    <ul>
        @if(\Illuminate\Support\Facades\Auth::user()==false)
        <li><a href="/registration">Регистрация</a></li>
        @endif
        <li><a href="/"><button class="btn"><i class="fa fa-home"></i></button></a></li>
        <li><a href="/posts">Вопросы</a></li>
        <li><a href="/about">О нас</a></li>
        <li><a href="/review">Отзывы</a></li>
        @if(\Illuminate\Support\Facades\Auth::user()==false)
        <li><a href="/login">Войти</a></li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user())
        <li><span class="ml-5">Привет, {{\Illuminate\Support\Facades\Auth::user()->name}}!</span></li>
        <li><a href="/logout">Выйти</a></li>
        @else
        
        <li><span class="ml-5">Привет, странник!</span></li>
        @endif
    </ul>

</header>
<script type="text/javascript">
    window.addEventListener("scroll", function (){
        let header = document.querySelector("header");
        header.classList.toggle("hui", window.scrollY > 0)
    })
</script>
<div class="container">
    @yield('main')
</div>


</body>
</html>
