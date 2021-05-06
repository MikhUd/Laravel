@extends('layout')

@section('title')
    Отзывы
@endsection
@section('main')
    <h1>Форма добавления отзыва</h1>


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/review/check">
        @csrf
        @if(\Illuminate\Support\Facades\Auth::user()==false)
        <input type="email" name="email" id="email" placeholder="email@mail.com" class="form-control"/><br>
        @else
            <input type="hidden" name="email" id="email" value="{{$user->email}}">
        @endif

        <input type="text" name="subject" id="subject" placeholder="Тема отзыва" class="form-control"/><br>
        <textarea style="min-height: 50px;" name="message" id="message" placeholder="Введите сообщение" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br>
    <h1>Все отзывы</h1>
    @foreach($reviews as $element)
        <div class="alert alert-info">
            <h3>{{$element->subject}}</h3>
            <b>{{$element->email}}</b>
            <p>{{$element->message}}</p>
        </div>
    @endforeach
@endsection
