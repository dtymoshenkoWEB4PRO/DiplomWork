@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$post->title}}</h1>
                        <a href="{{ route('personal.post.edit', $post->id )}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('personal.post.delete', $post->id )}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Головна сторінка</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('personal.post.index')}}">Мої петиції</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <td>Назва</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <td>Зміст петиції</td>
                                    <td>{{strip_tags($post->content)}}</td>
                                </tr>
                                <tr>
                                    <td>Категорія петиції</td>
                                    <td>{{$post->category->title}}</td>
                                </tr>
                                <tr>
                                    <td>Дата подання петиції</td>
                                    <td>{{($post->created_at)}}</td>
                                </tr>
                                <tr>
                                    <td>Петиція активна</td>
                                    <td>@if($post->visible)Так @else Ні @endif </td>
                                </tr>
                                <tr>
                                    <td>Петиція доступна для анонімного голосування</td>
                                    <td>@if($post->can_anonim_vote)Так @else Ні @endif </td>
                                </tr>
                                <tr>
                                    <td>Кількість необхідних голосів</td>
                                    <td>{{$post->votes}}</td>
                                </tr>
                                <tr>
                                    <td>Кількість проголосовавших анонімно</td>
                                    <td>{{count($post->likedUsersAnonim)}}</td>
                                </tr>
                                <tr>
                                    <td>Кількість проголосувавших з власного імені</td>
                                    <td>{{count($post->likedUsers)}}</td>
                                </tr>
                                <tr>
                                    <td>Люди, що підписали петицію</td>
                                    <td>
                                    @foreach($users as $user)
                                            <p>{{$user->name}}</p>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Спільно вже набрано голосів</td>
                                    <td>{{count($post->likedUsers)+count($post->likedUsersAnonim)}}</td>
                                </tr>
                                <tr>
                                    <td>Завантажити у пдф</td>
                                    <td><a class="btn btn-primary" href="{{route('personal.post.pdf', $post->id)}}">Експорт
                                            у PDF</a></td>
                                </tr>
                                <tr>
                                    <td>Перейти до форум під петицією</td>
                                    <td><a class="btn btn-primary"  href="{{route('post.show',$post->id)}}">До петиції на сайті</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->
               </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
