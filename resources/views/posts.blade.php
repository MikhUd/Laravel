@extends('layout')

@section('title')
    Посты
@endsection
@section('main')
<head>
    <style>
        .message{
            position: relative;
            color:black;

        }
        .message a{
            text-decoration: none;
            color: black;
        }
        .block h3{
            font-size: 14pt;
        }
        .card-img-top{
            padding: 5px;
        }
        .holder{
            position:relative;
        }
        .block{
            position:absolute;
            left:0;
            bottom:0;
            right:0;
            top:50%;
            background:rgba(255,255,255, 0.7);
            padding:5px;
            
        }
        


    </style>
</head>
<div class="container">

        <h1 class="text-center mt-3">Products</h1>
        <form action="{{route('postfilter')}}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Search</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


<div class="row mt-5">
    @foreach($posts as $post)

    <div class="col-lg-4 mb-3">
    <a href="/post/{{$post->id}}">
  <div class="holder">
            <img class="absolute img-fluid" src="{{$post->image}}"/>
        <div class="block">
               <h3 class="text-center overflow-wrap text-break">{{$post->topic}}</h3>
                    <div class="row justify-content-center mt-1 mb-1 text-black-50">
                    -{{strtoupper(substr(date('d F',strtotime($post->created_at)),0,6))}}-
                </div>
                <figcaption class="blockquote-footer">
                   Автор: {{$post->username}}
                </figcaption>
            </div>
        </div>
    </a>
    </div>

    @endforeach
</div>

<div>{{$posts->links('vendor.pagination.bootstrap-4')}}</div>

</div>



@endsection
