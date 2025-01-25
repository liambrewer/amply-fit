<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class CreateNewUser
{
    public function handle(string $name, string $email)
    {
        return User::query()->create([
            'name' => $name,
            'email' => $email,
        ]);
    }
}
