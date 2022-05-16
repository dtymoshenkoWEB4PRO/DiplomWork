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

        </section>


    </div>

</main>

@endsection();
