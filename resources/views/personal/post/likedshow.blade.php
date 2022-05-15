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
                            <table class="table table-hover text-nowrap">
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
                                    <td>Дата подання петиції</td>
                                    <td>{{($post->created_at)}}</td>
                                </tr>
                                <tr>
                                    <td>Кількість необхідних голосів</td>
                                    <td>{{$post->votes}}</td>
                                </tr>
                                <tr>
                                    <td>Кількість вже набраних голосів</td>
                                    <td>{{count($post->likedUsers)}}</td>
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
