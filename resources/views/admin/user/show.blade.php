@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$user->name}}</h1>
                        <a href="{{ route('admin.user.edit', $user->id )}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.user.delete', $user->id )}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
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
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <td>Ім'я</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td>По-батькові</td>
                                    <td>{{$user->patronymic}}</td>
                                </tr>
                                <tr>
                                    <td>Фамілія</td>
                                    <td>{{$user->surname}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Номер телефону</td>
                                    <td>{{$user->mobilenumber}}</td>
                                </tr>
                                <tr>
                                    <td>Членський білет в органзіації</td>
                                    <td>{{$user->ticket}}</td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('admin.post.user', $user->id )}}" class="text-warning">
                                            <span align="center" >До всіх петицій користувача</span>
                                        </a>
                                    </td>
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
