@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$post->title}}</h1>
                        <a href="{{ route('admin.post.edit', $post->id )}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.post.delete', $post->id )}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Модератор</a></li>
                            <li class="breadcrumb-item active">{{auth()->user()->name}}</li>
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
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <td>Назва петиції</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <td>Категорія петиції</td>
                                    <td>{{$post->category->title}}</td>
                                </tr>
                                <tr>
                                    <td>Зміст петиції</td>
                                    <td>{{strip_tags($post->content)}}</td>
                                </tr>
                                <tr>
                                    <td>Автор петиції</td>
                                    <td><a href="{{route('admin.user.show', $post->user_id)}}">
                                            {{$post->user->name.' '.$post->user->patronymic.' '.$post->user->surname}}</a></td>
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
                                    <td>Спільно вже набрано голосів</td>
                                    <td>{{count($post->likedUsers)+count($post->likedUsersAnonim)}}</td>
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
