@extends('layouts.main')

@section('content');


<main class="blog">
    <div class="container">

        <h1 class="edica-page-title" data-aos="fade-up">Результат пошуку за запитом "{{$search}}"</h1>
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
        </section>
    </div>
</main>
{{--<main class="blog">--}}
{{--    <div class="container">--}}
{{--        <h2 class="section-title mb-4" align="center" data-aos="fade-up">Результат пошуку за запитом "{{$search}}"</h2>--}}
{{--        <section class="featured-posts-section">--}}
{{--            <div class="row">--}}
{{--                @foreach($posts as $post)--}}
{{--                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">--}}
{{--                        <p class="blog-post-category">{{$post->category->title}}</p>--}}
{{--                        <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">--}}
{{--                            <h6 class="blog-post-title">{{$post->title}}</h6>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        <div class="row" style="margin-right: 20px;" >--}}
{{--            <div class="col-md-4 sidebar" align="right" data-aos="fade-left">--}}
{{--                <div class="widget widget-post-list">--}}
{{--                    <h5 class="widget-title">Топ-петицій</h5>--}}
{{--                    <ul class="post-list">--}}
{{--                        @foreach($likedPosts as $post)--}}
{{--                            <li class="post">--}}
{{--                                <p class="blog-post-category">{{$post->category->title}}</p>--}}
{{--                                <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">--}}
{{--                                    <h6 class="blog-post-title">{{$post->title}}</h6>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</main>--}}

@endsection();

