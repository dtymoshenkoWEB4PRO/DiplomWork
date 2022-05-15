@extends('layouts.main')

@section('content');

<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Категорії</h1>
        <section class="related-posts">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                        <a href="{{route('category.post.index',$category->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$category->title}}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</main>

@endsection();

