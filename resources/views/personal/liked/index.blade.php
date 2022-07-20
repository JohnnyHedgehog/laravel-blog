@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Понравившиеся посты</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item active">Понравившиеся посты</li>
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
        <div class="col-12 d-flex flex-wrap">
          @foreach ($posts as $post)

          <div class="col-lg-4 col-sm-6">

            <div class="liked-post">
              <a href="{{route('post.show', $post->id)}}" class="liked-post__link">
                <div class="liked-post__image-container">
                  <img src="{{ asset('storage/'.$post->preview_image) }}" alt="{{$post->title}}"
                    class="liked-post__image">
                </div>
                <div class="d-flex justify-content-between">
                  <p class="liked-post__category">{{$post->category->title}}</p>
                  <form action="{{ route('personal.liked.delete', $post->id)}}" method="POST"
                    class="liked-post__dislike">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent border-0 liked-post__button"><i
                        class="fas fa-heart-broken text-danger"></i></button>

                  </form>

                </div>
                <p class="liked-post__title">{{$post->title}}</p>
              </a>
            </div>

          </div>

          @endforeach
        </div>

        </>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection