@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагувати петицію</h1>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h6>Назва петиції</h6>
                        <form action="{{ route('personal.post.update', $post->id )}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Назва петиції" value="{{$post->title}}">
                                @error('title')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                                @error('content')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="votes" placeholder="Кількість необхідних голосів" value="{{$post->votes}}">
                                @error('votes')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Обрати категорію</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id == $post->category_id ? 'selected' : ''}}>
                                             {{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>
                                    Активна петиція
                                </label>
                                <input name="visible" type="text" class="form-control" value="{{$post->visible}}"/>
                            </div>

                            <div class="form-group w-25">
                                <label>
                                    Доступна для анонімного голосування
                                </label>
                                <input name="can_anonim_vote" type="text" class="form-control" value="{{$post->can_anonim_vote}}"/>
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary" value="Оновити">
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
