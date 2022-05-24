@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование комментария</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Комментарии</a></li>
            <li class="breadcrumb-item active">Редактирование комментария</li>
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

        <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w25 ml-2">
          @csrf
          @method('PATCH')
          <label for="inputText">Содержание комментария</label>
          <textarea name="message" class="form-control" id="inputText" cols="40"
            rows="10">{{ $comment->message }}</textarea>

          @error('message')
          <div class="text-danger">Это поле обязательно для заполнения</div>
          @enderror
          <input type="submit" class="btn btn-primary mt-2" value="Обновить">
        </form>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection