@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление поста</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
            <li class="breadcrumb-item active">Добавление поста</li>
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
        <form action="{{ route('admin.post.store') }}" method="POST" class="ml-2 col-lg-8 col-sm-12"
          enctype="multipart/form-data">
          @csrf
          <div class="form-group w-50">
            <label for="inputText">Название</label>
            <input type="text" name="title" class="form-control" id="inputText" placeholder="Название поста"
              value="{{old('title')}}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="summernote">Контент</label>
            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group w-75">
            <label for="exampleInputFile">Добавить превью</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Загрузить</span>
              </div>
            </div>
            @error('preview_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group w-75">
            <label for="exampleInputFile">Добавить основное изображение</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Загрузить</span>
              </div>
            </div>
            @error('main_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Выбрать категорию</label>
            <select class="form-control w-50" name="category_id">
              @foreach($categories as $category)
              <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : '' }}
                >{{$category->title}}</option>
              @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Теги</label>
            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги"
              style="width: 100%;">
              @foreach ($tags as $tag)
              <option value="{{  $tag->id }}" {{ is_array(old('tag_ids')) && in_array($tag->id,old('tag_ids')) ?
                'selected' : '' }}>{{ $tag->title}}</option>
              @endforeach
            </select>
            @error('tag_ids')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary mt-2" value="Добавить">
          </div>
        </form>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection