@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Нова петиція</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Головна сторінка</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('personal.post.index')}}">Мої петиції</a></li></li>
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
                        <h6>Додати петицію</h6>
                        <form action=" {{ route('personal.post.store') }} " method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Назва петиції">
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
                                <label>
                                    Кількість потрібних для набрання голосів
                                </label>
                                <input type="number" class="form-control" name="votes" placeholder="Кількість необхідних голосів">
                                @error('votes')
                                <div class="test-danger">It is must have field. {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Обрати категорію</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            </div>
{{--                            <div class="form-group w-25">--}}
{{--                            <fieldset>--}}
{{--                                <label> Активна петиція</label>--}}
{{--                                <div>--}}
{{--                                    <input type="radio" id="visible" name="visible"--}}
{{--                                           value="1">--}}
{{--                                    <label for="visible">Так</label>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <input type="radio" id="visible" name="visible" value="0">--}}
{{--                                    <label for="visible">Ні</label>--}}
{{--                                </div>--}}
{{--                            </fieldset>--}}
{{--                            </div>--}}
{{--                            <div class="form-group w-25">--}}
{{--                                <fieldset>--}}
{{--                                    <label>Доступна для анонімного голосування</label>--}}
{{--                                    <div>--}}
{{--                                        <input type="radio" id="can_anonim_vote" name="can_anonim_vote"--}}
{{--                                               value="1">--}}
{{--                                        <label for="can_anonim_vote">Так</label>--}}
{{--                                    </div>--}}

{{--                                    <div>--}}
{{--                                        <input type="radio" id="can_anonim_vote" name="can_anonim_vote" value="0">--}}
{{--                                        <label for="can_anonim_vote">Ні</label>--}}
{{--                                    </div>--}}
{{--                                </fieldset>--}}
{{--                            </div>--}}
                                <div class="form-group w-50">
                                    <label>Активна петиція</label>
                                    <select name="visible" class="form-control">
                                        <option value="1">Так</option>
                                        <option value="0">Ні</option>
                                    </select>
                                </div>

                                <div class="form-group w-50">
                                    <label>Доступна для анонімного голосування</label>
                                    <select name="can_anonim_vote" class="form-control">
                                        <option value="1">Так</option>
                                        <option value="0">Ні</option>
                                    </select>
                                </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary" value="Додати">
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
