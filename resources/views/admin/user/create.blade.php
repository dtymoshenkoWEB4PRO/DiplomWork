@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Користувачі</h1>
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
                        <h6>Додати користувача</h6>
                        <form action=" {{ route('admin.user.store') }} " method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Ім'я користувача">
                                @error('name')
                                <div class="test-danger">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Еmail користувача">
                                @error('email')
                                <div class="test-danger">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Update user role</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == old('role_id') ? 'selected' : ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-block btn-primary" value="Add">
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
