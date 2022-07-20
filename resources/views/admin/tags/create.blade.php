@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление тега</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
            <li class="breadcrumb-item active">Добавление тега</li>
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
        <form action="{{ route('admin.tag.store') }}" method="POST" class="ml-2">
          @csrf
          <label for="inputText">Название</label>
          <input type="text" name="title" class="form-control" id="inputText" placeholder="Название тега">
          @error('title')
          <div class="text-danger">Это поле обязательно для заполнения</div>
          @enderror
          <input type="submit" class="btn btn-primary mt-2" value="Добавить">
        </form>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection