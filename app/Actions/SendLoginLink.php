<?php

namespace App\Actions;

use App\Mail\Auth\LoginLink;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

final class SendLoginLink
{
    public function handle(string $email): void
    {
        Mail::to(
            users: $email,
        )->send(
            mailable: new LoginLink(
                url: URL::temporarySignedRoute(
                    name: 'login:store',
                    expiration: 10 * 60,
                    parameters: [
                        'email' => $email,
                    ],
                ),
            )
        );
    }
}
