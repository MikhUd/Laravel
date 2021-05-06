@extends('layout')

@section('title')
    Главная страница
@endsection

@section('main')

    <div class="container">
        <h1>Задать вопрос</h1>
            <form action="/post/add" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" name="topic" id="topic" placeholder="Тема поста">
                <br>
                <textarea style="min-height: 80px; max-height: 120px;" class="form-control" name="text" id="text" placeholder="Текст поста"></textarea>
                <br>
                <input class="form-control-sm mb-3" name="file" id="file" type="file">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger mt-1 mb-1"><li>{{ $error }}</li></div>
                @endforeach
                <br>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
    </div>

@endsection
