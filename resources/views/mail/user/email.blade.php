@component('mail::message')
<p>Добрый день!</p>
<p>Пожалуйста, нажмите на кнопку ниже, чтобы подвердить Ваш E-mail:</p>
@component('mail::button', ['url' => $url])
Подтвердить e-mail
@endcomponent
<p>Если вы не создавали аккаунт My Travel Blog, то проигнорируйте данное письмо.</p>
<br>

<p>С наилучшими пожеланиями,</p>
<p>{{ config('app.name') }}</p>
@endcomponent