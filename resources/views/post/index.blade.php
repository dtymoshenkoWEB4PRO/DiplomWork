<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Autocomplete Textbox From Database with jQuery Ajax - MakeCodes.ru</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/jаvascript">
       var siteUrl = "{{url('/')}}";
    </script>
</head>
<body>

<div class="container mt-4">

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <h2>Laravel 8 Autocomplete Textbox From Database using jQuery ajax - MakeCodes.ru</h2>
        </div>

        <div class="card-body">
            <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Поиск продукта по названию</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>

            </form>
        </div>
    </div>

</div>
<script src="{{ asset('auto.js') }}"></script>
</body>

</html>


@extends('layouts.main')

@section('content');

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Усі петиції</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <p class="blog-post-category">{{$post->category->title}}</p>
                        <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$post->title}}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -80px;">
                    {{$posts->links()}}
                </div>
            </div>
        </section>



        <div class="row">
            <div class="col-md-4 sidebar" align="right" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Топ-петицій</h5>
                    <ul class="post-list">
                        @foreach($likedPosts as $post)
                            <li class="post">
                                <p class="blog-post-category">{{$post->category->title}}</p>
                                <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$post->title}}</h6>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection();
