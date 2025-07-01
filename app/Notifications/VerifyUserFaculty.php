<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class VerifyUserFaculty extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    protected function verificationUrl($notifiable)
    {
        if(static::$createUrlCallback){
            return call_user_func(static::$createUrlCallback, $notifiable);
        }

        return URL::temporarySignedRoute(
            "user_faculty.verification.verify",
            now()->addHour(),
            [
                "id" => $notifiable->getKey(),
                "hash" => sha1($notifiable->getEmailForVerification())
            ]
        );
    }
}
