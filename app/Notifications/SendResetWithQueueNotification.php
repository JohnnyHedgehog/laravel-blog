<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class SendResetWithQueueNotification extends ResetPassword implements ShouldQueue {
    use Queueable;



    protected function buildMailMessage($url) {
        return (new MailMessage)
            ->subject(Lang::get('Сброс пароля My Travel Blog'))
            ->from('info@kniga-kofe.ru')
            ->markdown('mail.user.reset', ['url' => $url]);
    }
}
