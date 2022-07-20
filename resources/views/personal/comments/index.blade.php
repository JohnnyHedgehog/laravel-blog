@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Мои комментарии</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item active">Комментарии</li>
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
        @foreach ($comments as $comment)
        <div class="col-12 d-flex flex-wrap justify-content-center commented-post__container">
          <div class="commented-post col-lg-3">
            <a href="{{route('post.show', $comment->post->id)}}" class="commented-post__link">
              <div class="commented-post__image-container">
                <img src="{{ asset('storage/'.$comment->post->preview_image) }}" alt="{{$comment->post->title}}"
                  class="commented-post__image">
              </div>
              <div class="d-flex justify-content-between">
                <p class="commented-post__category">{{$comment->post->category->title}}</p>

              </div>
              <p class="commented-post__title">{{$comment->post->title}}</p>
            </a>
          </div>
          <div class="commented-post__comment col-lg-7">
            {{ $comment->message }}
          </div>
          <div class="commented-post__actions col-lg-1 d-flex justify-content-around">
            <a href="{{ route('personal.comment.edit', $comment->id)}}" class="text-success"><i
                class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('personal.comment.delete', $comment->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-transparent border-0 commented-post__button"><i
                  class="fas fa-trash-alt text-danger"></i></button>

            </form>
          </div>
        </div>
        @endforeach
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection