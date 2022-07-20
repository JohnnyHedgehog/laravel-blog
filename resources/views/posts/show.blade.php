@extends('layouts.main')

@section('title')
<title>My Travel Blog | {{$post->title}}</title>
@endsection


@section('content')

<main class="blog-post" id="app">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$date->translatedFormat('d F Y')}} •
            {{$date->format('H:i')}} •
            {{$post->CommentsCount}}</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/'.$post->main_image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto mb-5" data-aos="fade-up">
                    {!! $post->content !!}
                    <div class="mb-5 d-flex">
                        <div class="liked-post-text mr-2"> Отметки "Мне нравится": </div>
                        {{--
                        Отображаем Лайки через Vue.JS
                        --}}
                        @auth
                        <like-component :post-id="{{$post->id}}" :post-liked-users-count="{{$post->liked_users_count}}"
                            :user-likes-this-post="{{(int)auth()->user()->likedPosts->contains($post->id)}}">
                        </like-component>
                        @endauth
                        @guest

                        <div class="mr-0 liked-post-text" data-toggle="tooltip" data-placement="top"
                            title="Авторизуйтесь, чтобы поставить лайк">
                            <i class="nav-icon far fa-heart mr-0 liked-post-text"></i>
                            {{$post->liked_users_count}}
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relatedPosts->count() > 0)
                <section class="related-posts mb-6">
                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                    <div class="row blog">
                        @foreach ($relatedPosts as $relatedPost)

                        <div class="col-md-4 blog-post mb-0" data-aos="fade-right" data-aos-delay="100">
                            <a href=" {{route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                                <img src="{{ asset('storage/'.$relatedPost->main_image) }}" alt="related post"
                                    class="post-thumbnail">
                                <div class="d-flex justify-content-between">
                                    <p class="blog-post-category">{{$relatedPost->category->title}}</p>
                                    {{--
                                    Отображаем Лайки через Vue.JS
                                    --}}
                                    @auth
                                    <like-component :post-id="{{$relatedPost->id}}"
                                        :post-liked-users-count="{{$relatedPost->liked_users_count}}"
                                        :user-likes-this-post="{{(int)auth()->user()->likedPosts->contains($relatedPost->id)}}">
                                    </like-component>

                                    @endauth
                                    @guest
                                    <p class="blog-post-category" data-toggle="tooltip" data-placement="top"
                                        title="Авторизуйтесь, чтобы поставить лайк">
                                        <span class="mr-2">{{$relatedPost->liked_users_count}}</span><i
                                            class="nav-icon far fa-heart mr-1"></i>
                                    </p>
                                    @endguest
                                </div>
                                <h5 class="post-title">{{$relatedPost->title}}</h5>
                            </a>
                        </div>

                        @endforeach

                    </div>
                </section>
                @endif
                <section class="comment-section">
                    @auth
                    <comment-component :post-id="{{$post->id}}"></comment-component>
                    @endauth
                    @guest
                    <div class="comments">
                        <h2 class="section-title mb-5">Комментарии ({{$post->comments->count()}})</h2>
                        @foreach ($post->comments as $comment)


                        <div class="comment-block">
                            <p class="comment-name">{{$comment->user->name}}</p>
                            <p class="comment-date">{{$comment->dateAsCarbon->diffForHumans()}}</p>
                            <p class="comment-message">{{$comment->message}}</p>
                        </div>
                        @endforeach
                    </div>
                    <h5 class="section-title mt-5 mb-5 text-center" data-aos="fade-up">Для того, чтобы оставить
                        комментарий,
                        необходимо
                        <a href="{{route('login')}}" class="blog-link">авторизоваться</a>
                    </h5>
                    @endguest
                </section>
            </div>
        </div>
    </div>
</main>
@endsection