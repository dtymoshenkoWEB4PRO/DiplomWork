@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагувати користувача</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h6>Редагування</h6>
                        <form action="{{ route('admin.user.update', $user->id )}}" method="POST" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Ім'я користувача"
                                       value="{{$user->name}}">
                                @error('name')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="patronymic"
                                       placeholder="По-батькові користувача"
                                       value="{{$user->patronymic}}">

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="surname" placeholder="Фамілія користувача"
                                       value="{{$user->surname}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Еmail користувача"
                                       value="{{$user->email}}">
                                @error('email')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="mobilenumber"
                                       placeholder="Номер телефону користувача"
                                       value="{{$user->mobilenumber}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ticket"
                                       placeholder="Номер членства в організації/університеті користувача за наявністю"
                                       value="{{$user->ticket}}">
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <input type="submit" class="btn btn-block btn-primary" value="Оновити">
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
