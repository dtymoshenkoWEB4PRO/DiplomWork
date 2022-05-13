@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категорії</h1>
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
                        <h6>Додати категорію</h6>
                        <form action=" {{ route('admin.category.store') }} " method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Ім'я категорії">
                                @error('title')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-block btn-primary" value="Додати">
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
