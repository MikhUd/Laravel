@extends('layout')

@section('title')
    Регистрация
@endsection
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background:#333333;

            overflow-y: hidden;
        }
        #login {
            -webkit-perspective: 1000px;
            -moz-perspective: 1000px;
            perspective: 1000px;
            margin-top:50px;
            margin-left:30%;
        }
        .login {
            font-family: 'Josefin Sans', sans-serif;

        }

        .login article {

        }
        .login .form-group {
            margin-bottom:17px;
        }
        .login .form-control,
        .login .btn {
            border-radius:0;
        }
        .login .btn {
            text-transform:uppercase;
            letter-spacing:3px;

        }
        .input-group-addon {
            border-radius:0;
            color:#fff;
            background:#f3aa0c;
            border:#f3aa0c;
        }
        .forgot {
            font-size:16px;
        }
        .forgot a {
            color:#333;
        }
        .forgot a:hover {
            color:#5cb85c;
        }

        #inner-wrapper, #contact-us .contact-form, #contact-us .our-address {
            color: #1d1d1d;
            font-size: 19px;
            line-height: 1.7em;
            font-weight: 300;
            padding: 50px;
            box-shadow: 0 2px 5px 0 rgba(255, 255, 255, 0.16), 0 2px 10px 0 rgba(255, 255, 255, 0.12);
            margin-bottom: 100px;
        }
        .input-group-addon {
            border-radius: 0;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            color: #fff;
            background: #f3aa0c;
            border: #f3aa0c;
            border-right-color: rgb(243, 170, 12);
            border-right-style: none;
            border-right-width: medium;
        }
        .bg{
            height: 100%;
            width: 92%;
            z-index: -10000;
            background: repeating-linear-gradient(
                45deg,
                #3d3d43,
                #d4d5dd 10px,
                #666979 10px,
                #ececec 20px
            );
            opacity: 0.35;
            position: absolute;
            top: 4%;
            left: 8%;
        }
        .form-group span{
            background-color: #4dc0b5;
            min-width: 25px;
            padding: 5px;

        }
        .fa{
            margin-top: 4px;
        }
    </style>
</head>
@section('main')
    <div class="col-md-4 col-md-offset-4" id="login">

        <section id="inner-wrapper" class="login rounded border border-white">
            <div class="bg border border-white"></div>
            <article>

                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon border border-primary"><i class="fa fa-user-circle"> </i></span>

                            <input type="text" name="name" id="name" placeholder="Введите имя" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon border border-primary"><i class="fa fa-envelope"> </i></span>

                            <input type="email" name="email" id="email" placeholder="Введите почту" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon border border-primary"><i class="fa fa-key"> </i></span>

                            <input type="password" name="password" id="password" placeholder="Введите пароль" class="form-control @error('password') is-invalid @enderror"  required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon border border-primary"><i class="fa fa-key"> </i></span>

                            <input type="password" name="password_confirmation" id="password-confirm" placeholder="Подтвердите пароль" class="form-control"  required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Регистрация</button>
                </form>
            </article>
        </section>

    </div>
@endsection
