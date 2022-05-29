@extends('layouts.main')

@section('content')

<main class="blog-post">
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
                    <div class="mb-5">
                        @auth
                        <form action="{{route('post.like.store', $post->id)}}" method="POST">
                            @csrf
                            <span class="liked-post-text"> Отметки "Мне нравится":</span>
                            <span class="blog-post-category liked-post-text like-count">
                                <button type="submit"
                                    class="bg-transparent border-0 blog-post-category liked-post-text">
                                    @if (auth()->user()->likedPosts->contains($post->id))
                                    <i class="nav-icon fas fa-heart"></i>
                                    @else
                                    <i class="nav-icon far fa-heart"></i>
                                    @endif
                                </button>
                                {{$post->liked_users_count}}</span>
                        </form>
                        @endauth
                        @guest
                        <p class="like-post-block">
                            <span class="liked-post-text"> Отметки "Мне нравится":</span>
                            <span class="mr-0 liked-post-text">
                                <i class="nav-icon far fa-heart mr-0 liked-post-text"></i>
                                {{$post->liked_users_count}}</span>
                        </p>
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
                                <p class="post-category">{{$relatedPost->category->title}}</p>
                                <h5 class="post-title">{{$relatedPost->title}}</h5>
                            </a>
                        </div>

                        @endforeach

                    </div>
                </section>
                @endif
                <section class="comment-section">
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
                    @auth
                    <h2 class="section-title mb-5" data-aos="fade-up">Добавить комментарий</h2>
                    <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Ваш комментарий</label>
                                <textarea name="message" id="comment" class="form-control"
                                    placeholder="Введите комментарий" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                    @endauth
                    @guest
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