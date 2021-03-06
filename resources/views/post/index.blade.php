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

        <section class="related-posts">
            <h2 class="section-title mb-4" align="center" data-aos="fade-up">Топ-петицій</h2>
            <div class="row">
                @foreach($likedPosts as $likePost)
                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                        <p class="blog-post-category">{{$likePost->category->title}}</p>
                        <a href="{{route('post.show',$likePost->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$likePost->title}}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>





{{--        <div class="row" >--}}
{{--            <div class="col-md-4 sidebar" data-aos="fade-left">--}}
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

    </div>

</main>

@endsection();
