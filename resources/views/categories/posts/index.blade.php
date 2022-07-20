@extends('layouts.main')

@section('title')
<title>My Travel Blog | Категория - {{$category->title}}</title>
@endsection

@section('content')
<main class="blog" id="app">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{$category->title}}</h1>
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
                            {{--
                            Отображаем Лайки через Vue.JS
                            --}}
                            @auth
                            <like-component :post-id="{{$post->id}}"
                                :post-liked-users-count="{{$post->liked_users_count}}"
                                :user-likes-this-post="{{(int)auth()->user()->likedPosts->contains($post->id)}}">
                            </like-component>

                            @endauth
                            @guest
                            <p class="blog-post-category" data-toggle="tooltip" data-placement="top"
                                title="Авторизуйтесь, чтобы поставить лайк">
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
        </section>

    </div>

</main>
@endsection