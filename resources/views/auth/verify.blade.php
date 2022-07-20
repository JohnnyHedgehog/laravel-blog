@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Пожалуйста, подтвердите Ваш Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Ссылка для подтверждения адреса электронной почты была отправлена Вам на E-mail') }}
                    </div>
                    @endif

                    {{ __('Чтобы продолжить, пожалуйста, проверьте Вашу электронную почту и перейдите по ссылке для
                    подтверждения Email.') }}
                    {{ __('Если Вы не получили письмо с ссылкой для подтверждения') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда, чтобы
                            отправить его еще раз') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection