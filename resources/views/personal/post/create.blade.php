@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
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
                        <h6>Add posts</h6>
                        <form action=" {{ route('personal.post.store') }} " method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Posts name">
                                @error('title')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content"></textarea>
                                 @error('content')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="votes" placeholder="Number of desired votes">
                                @error('votes')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Select category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary" value="Add">
                            </div>
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
