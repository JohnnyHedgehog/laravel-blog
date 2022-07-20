@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
          <h1 class="m-0 mr-3">{{ $tag->title }}</h1>
          <a href="{{ route('admin.tag.edit', $tag->id)}}" class="text-success mr-2"><i
              class="fas fa-pencil-alt"></i></a>
          <form action="{{ route('admin.tag.delete', $tag->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent border-0"><i class="fas fa-trash-alt text-danger"></i></button>

          </form>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
            <li class="breadcrumb-item active">{{$tag->title}}</li>
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
        <div class="col-sm-2 mb-3">
          <a href="{{ route('admin.tag.index') }}" class="btn btn-block btn-primary btn-sm">Назад</a>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td>{{ $tag->id }}</td>
                  </tr>
                  <tr>
                    <td>Название</td>
                    <td>{{ $tag->title }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection