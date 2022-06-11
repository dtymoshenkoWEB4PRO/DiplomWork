@extends('layouts.main')

@section('content');

<main class="blog-post">


    <section class="post-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h1 class=" mx-auto" data-aos="fade-up">{{$post->title}}</h1>

                    <ul>
                        <li><strong>Автор петиції:</strong> {{$post->user->name}}</li>
                        <li><strong>Дата створення петиції:</strong> {{$data->translatedFormat('F')}} {{$data->day}}
                            ,{{$data->year}}
                            • {{$data->format('H:i')}} </li>
                        <li><strong>Категорія петиції:</strong> {{$post->category->title}} </li>
                    </ul>

                    <h3 align="center"><b> Зміст петиції </b></h3>
                    <div>{!! $post->content !!}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100" style="text-align: center;">
                    <div>
                        <p>Необхідна кількість голосів</p>
                        <p align="center" class="blog-post-category">{{$post->votes}}</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100" style="text-align: center;">
                    <div>
                        <p>Вже набрана кількість голосів</p>
                        <p align="center"
                           class="blog-post-category">{{count($post->likedUsers)+count($post->likedUsersAnonim)}}</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100" style="text-align: center;">
                    <div>
                        @auth()
                            @if(!(auth()->user()->likedPosts->contains($post->id) or auth()->user()->likedPostsAnonim->contains($post->id)))
                                @if($post->can_anonim_vote)
                                    <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                        @csrf

                                        <input class="btn btn-outline-primary" type="submit"
                                               value="Проголосувати за цю петицію">

                                    </form>
                                    <form action="{{route('post.likeanonim.store', $post->id)}}" method="POST">
                                        @csrf

                                        <input class="btn btn-outline-primary" type="submit"
                                               value="Проголосувати за цю петицію анонімно">

                                    </form>
                                @else
                                    <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                        @csrf

                                        <input class="btn btn-outline-primary" type="submit"
                                               value="Проголосувати за цю петицію">

                                    </form>
                                @endif
                            @else
                                <input class="btn btn-outline-primary" type="submit" disabled
                                       value="Ви вже проголосували за цю петицію">
                            @endif
                        @endauth
                        @guest()
                            <form action="{{route('personal.main.index')}}">
                                @csrf
                                <input class="btn btn-outline-primary" type="submit"
                                       value="Авторизуватися, щоб проголосувати">
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if($relatedPosts->count() > 0)
        <section class="related-posts">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title mb-4" align="center" data-aos="fade-up">Схожі петиції за
                            категорією</h2>
                    </div>
                    @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <p class="blog-post-category">{{$relatedPost->category->title}}</p>
                            <a href="{{route('post.show',$relatedPost->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$relatedPost->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="related-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title mb-5" align="center" data-aos="fade-up">Чат для обговорення петиції</h2>
                    @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                    <span class="username">
                        <div>{{$comment->user->name}}</div>
                      <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                    </span><!-- /.username -->
                            <div>{{$comment->message}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @auth()
        <section class="comment-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {{--                    <h2 class="section-title mb-5" align="center" data-aos="fade-up">Чат для обговорення петиції</h2>--}}
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf

                            <div class="form-group" data-aos="fade-up">
                                <label
                                    for="comment" class="sr-only">Ваше повідомлення</label>
                                <textarea name="message" id="comment" class="form-control"
                                          placeholder="Ваше повідомлення" rows="10">Повідомлення</textarea>
                            </div>

                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Відправити повідомлення" class="btn btn-warning">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endauth
    @guest()
        <section class="comment-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title mb-5" data-aos="fade-up">Щоб стати учасником форуму для обговорення
                            петиції,
                            будь ласка,<a href="{{route('personal.main.index')}}"> авторизуйтесь</a>
                        </h2>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endguest


</main>

@endsection();
