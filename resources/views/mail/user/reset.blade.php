@component('mail::message')
<p>Добрый день!</p>
<p>Вы получили данное письмо, так как запросили сброс пароля на сайте My Travel Blog:</p>
@component('mail::button', ['url' => $url])
Сбросить пароль
@endcomponent
<p>Если вы не создавали запрос на My Travel Blog, то проигнорируйте данное письмо.</p>
<br>

<p>С наилучшими пожеланиями,</p>
<p>{{ config('app.name') }}</p>
@endcomponent