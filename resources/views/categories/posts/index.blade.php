@extends('layouts.main')

@section('content')
<main class="blog">
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
        </section>

    </div>

</main>
@endsection