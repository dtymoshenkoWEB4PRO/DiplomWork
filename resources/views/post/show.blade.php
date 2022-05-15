@extends('layouts.main')

@section('content');

<main class="blog-post">
    <div class="container">
        <h1 class="col-lg-9 mx-auto" data-aos="fade-up">{{$post->title}}</h1>
        <p class="col-lg-9 mx-auto" data-aos="fade-up" data-aos-delay="200">
            <br><strong>• Автор петиції:</strong> {{$post->user->name}}<strong> • </strong>
            <br><strong>• Дата створення петиції:</strong> {{$data->translatedFormat('F')}} {{$data->day}},{{$data->year}} • {{$data->format('H:i')}} <strong> • </strong>
            <br><strong>• Категорія петиції:</strong> {{$post->category->title}} • </p>

        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h6 align="center"><b> Зміст петиції </b></h6>
                    <div align=" center ">{!! $post->content !!}</div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <div class="row">
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <p>Необхідна кількість голосів</p>
                            <p align="center" class="blog-post-category">{{$post->votes}}</p>
                        </div>
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <p>Вже набрана кількість голосів</p>
                            <p align="center" class="blog-post-category">{{count($post->likedUsers)}}</p>
                        </div>
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                @csrf
                                @auth()
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <input class="btn btn-outline-primary" type="submit" disabled value="Ви вже проголосували за цю петицію">
                                    @else
                                        <input class="btn btn-outline-primary" type="submit" value="Проголосувати за цю петицію">
                                    @endif
                                @endauth
                            </form>
                            @guest()
                                <form action="{{route('personal.main.index')}}" >
                                    @csrf
                                    <input class="btn btn-outline-primary" type="submit" value="Авторизуватися, щоб проголосувати">
                                </form>
                            @endguest
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" align="center" data-aos="fade-up">Схожі петиції за категорією</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <p class="blog-post-category">{{$relatedPost->category->title}}</p>
                                    <a href="{{route('post.show',$relatedPost->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$relatedPost->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
                <section class="related-posts">
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
                </section>
                @auth()
                    <section class="comment-section">
                        {{--                    <h2 class="section-title mb-5" align="center" data-aos="fade-up">Чат для обговорення петиції</h2>--}}
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Ваше повідомлення</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Ваше повідомлення" rows="10">Повідомлення</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Відправити повідомлення" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                @endauth
                @guest()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Щоб стати учасником форуму для обговорення петиції,
                            будь ласка,<a href="{{route('personal.main.index')}}"> авторизуйтеся</a>
                        </h2>
                        </form>
                    </section>
                @endguest
            </div>
        </div>
    </div>
</main>

@endsection();
