@extends('layout')

@section('title')
    Пост
@endsection
@section('main')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .container{
                position: relative;
            }
            .container button{
                position: absolute;
                left: 1000px;
            }
            .bg{

                -webkit-filter: blur(20px);
                -moz-filter: blur(20px);
                -o-filter: blur(20px);
                -ms-filter: blur(20px);
                filter: blur(20px);
                z-index: -10000;
                background: repeating-linear-gradient(
                    45deg,
                    #515050,
                    #090a15 10px,
                    #0a0a0a 10px,
                    #211e1e 20px
                );
                opacity: 0.75;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
            }

        </style>
    </head>

<div class="container">
    <div class="bg"></div>
        <h1 class="overflow-wrap text-break">{{$post->topic}}</h1>
        <img class="border border-white" style="text-align:center; max-width: 700px;" src="{{$post->image}}" alt="">
        <p class="overflow-wrap text-break">{{$post->text}}</p>
    <div>



        <h3>Добавить ответ</h3>
        <form method="post" action="/comment/add">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> Ответ слишком короткий </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <input type="hidden" name="id" id="id" value="{{$post->id}}">
        <textarea style="min-height: 60px; max-height: 100px" class="form-control" id="comment" name="comment" rows="3" placeholder="Текст ответа"></textarea>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
        </form>


    </div>
    <div class="container">
        <h2>Все ответы</h2>
        @foreach($comments as $comment)
                <div class="alert alert-info">
                    @if($comment->author_name == Auth::user()->name)
                        <form method="post" action="/comment/delete">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$comment->id}}">
                            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-close"></i></button>
                        </form>
                    @endif
                        <p>{{$comment->body}}</p>
                        <b>{{$comment->author_name}}</b>
                    <div class="row justify-content-center mt-1 mb-1 text-black-50">
                        -{{strtoupper(substr(date('d F',strtotime($comment->created_at)),0,6))}}-
                    </div>
                </div>
        @endforeach
    </div>
</div>




@endsection
