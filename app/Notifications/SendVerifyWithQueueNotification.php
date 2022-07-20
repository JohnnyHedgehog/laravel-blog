<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class SendVerifyWithQueueNotification extends VerifyEmail implements ShouldQueue {
    use Queueable;

    protected function buildMailMessage($url) {
        return (new MailMessage)
            ->subject(Lang::get('Подтвердите Ваш E-mail'))
            ->from('info@kniga-kofe.ru')
            ->markdown('mail.user.email', ['url' => $url]);
    }
}
