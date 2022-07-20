@extends('layouts.main')

@section('title')
<title>My Travel Blog | Контакты</title>
@endsection


@section('content')

<main class="blog-post" id="app">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="edica-page-title mb-5" data-aos="fade-up">Наши контакты</h1>
        </div>
        <div class=" row" data-aos="fade-up">
            <div class="col-lg-6">
                <p class="mb-3"><b>Наш адрес для бумажных писем:</b></p>
                <p>Сюндахобн</p>
                <p>Рейкьявик, округ Хёвюдборгарсвайдид</p>
                <p>Координаты:</p>
                <p>64.150847, -21.868690</p>
                <p class="mt-5"><b>Электронная почта</b></p>
                <p><a href="mailto:mytravelblog@gmail.com">mytravelblog@gmail.com</a></p>
            </div>
            <div class="col-lg-6">
                <iframe
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A125b490baf67e218f9d18ac12772974cc51010e16e195d3b6dee00426de7400a&amp;source=constructor"
                    width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</main>


@endsection