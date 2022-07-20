@extends('layouts.main')

@section('content')

<main class="blog-post mt-5" id="app" style="min-height:80vh;">
    <div class="container">
        <section class="blog-post-featured-img d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('assets/images/404.jpg') }}" alt="featured image" class="w-50">
        </section>

        <section class="post-content">
            <div class="row d-flex justify-content-center flex-column align-items-center">
                <h3>Упс, похоже, что вы потерялись!</h3>
                <h3><a href="{{route('main.index')}}">Вернуться на главную</a></h3>
            </div>
        </section>


    </div>
</main>
@endsection