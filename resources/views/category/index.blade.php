@extends('layouts.main')

@section('content');


<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Категорії</h1>

        <section class="featured-posts-section">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <a href="{{route('category.show',$category->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$category->title}}</h6>
                        </a>
                        <form action="{{route('category.show',$category->id)}}" method="GET">
                            @csrf
                            <input class="btn btn-outline-primary" type="submit"
                                   value="До петицій цієї категорії">

                        </form>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -80px;">
                    {{$categories->links()}}
                </div>
            </div>
            </section>
    </div>
</main>

@endsection();

