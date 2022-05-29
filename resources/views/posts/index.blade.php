@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Блог о путешествиях</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/'.$post->preview_image) }}" alt="blog post">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{$post->category->title}}</p>
                            @auth
                            <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                @csrf

                                <button type="submit"
                                    class="bg-transparent border-0 blog-post-category mr-1 like-count">
                                    <span class="blog-post-category mr-1">{{$post->liked_users_count}}</span>
                                    @if (auth()->user()->likedPosts->contains($post->id))
                                    <i class="nav-icon fas fa-heart"></i>
                                    @else
                                    <i class="nav-icon far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                            @endauth
                            @guest
                            <p class="blog-post-category">
                                <span class="mr-2">{{$post->liked_users_count}}</span><i
                                    class="nav-icon far fa-heart mr-1"></i>
                            </p>
                            @endguest
                        </div>
                        <h6 class="blog-post-title">{{$post->title}}</h6>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top:-80px;">
                    {{$posts->links()}}
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-md-8">
                <section>
                    <h3 class="widget-title mb-4">Случайные посты</h3>
                    <div class="row blog-post-row">
                        @foreach ($randomPosts as $randomPost)

                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <a href="{{route('post.show', $randomPost->id)}}" class="blog-post-permalink">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/'.$randomPost->preview_image) }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">{{$randomPost->category->title}}</p>

                                <h6 class="blog-post-title">{{$randomPost->title}}</h6>

                        </div>
                        </a>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title mb-3">Популярные посты</h5>
                    <ul class="post-list">
                        @foreach ($likedPosts as $likedPost)
                        <li class="post">
                            <a href="{{route('post.show', $likedPost->id)}}" class="post-permalink media">
                                <img src="{{ asset('storage/'.$likedPost->preview_image) }}" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">{{$likedPost->title}}</h6>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Поддержать автора</h5>
                    <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">
                </div>
            </div>
        </div>
    </div>

</main>
@endsection