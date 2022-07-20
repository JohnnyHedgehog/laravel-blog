@extends('layouts.main')

@section('title')
<title>My Travel Blog | Категории постов</title>
@endsection

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <a href="{{route('category.post.index', $category->id)}}" class="blog-post-permalink">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/'.$category->posts->first()->preview_image) }}" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{$category->PostsCount}}</p>

                        <h6 class="blog-post-title">{{$category->title}}</h6>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>

</main>
@endsection