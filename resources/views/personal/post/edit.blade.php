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
                                 <label>
                                    Кількість потрібних для набрання голосів
                                </label>
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
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="visible" value="0">
                                <input name="visible" class="custom-control-input custom-control-input-danger"
                                       type="checkbox" id="customCheckbox4" value="1"
                                    {{ old('visible', $post->visible) !=1?: 'checked' }} >

                                <label for="customCheckbox4" class="custom-control-label">Активна петиція</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="can_anonim_vote" value="0">
                                <input name="can_anonim_vote" class="custom-control-input" type="checkbox"
                                       id="customCheckbox2" value="1"
                                    {{ old('can_anonim_vote', $post->can_anonim_vote) !=1?: 'checked' }} >

                                <label for="customCheckbox2" class="custom-control-label">Доступна для анонімного
                                    голосування</label>
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
