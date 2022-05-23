@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование поста</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Посты</a></li>
            <li class="breadcrumb-item active">{{$post->title}}</li>
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
        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="w25 ml-2"
          enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group w-50">
            <label for="inputText">Название</label>
            <input type="text" name="title" class="form-control" id="inputText" placeholder="Название поста"
              value="{{$post->title}}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="summernote">Контент</label>
            <textarea id="summernote" name="content">{{$post->content}}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group w-75">
            <label for="exampleInputFile">Изменить превью</label>
            <div class="w-50 mb-2">
              <img src="{{url('storage/'.$post->preview_image)}}" alt="preview_image" class="w-50">
            </div>
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
            <label for="exampleInputFile">Изменить основное изображение</label>
            <div class="w-50 mb-2">
              <img src="{{url('storage/'.$post->main_image)}}" alt="main_image" class="w-50">
            </div>
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
              <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : '' }}
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
              <option value="{{  $tag->id }}" {{ is_array($post->tags->pluck('id')->toArray()) &&
                in_array($tag->id, $post->tags->pluck('id')->toArray()) ?
                'selected' : '' }}>{{ $tag->title}}</option>
              @endforeach
            </select>
            @error('tag_ids')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary mt-2" value="Обновить">
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