<?php

namespace App\Livewire\Auth;

use App\Actions\CreateNewUser;
use App\Actions\SendLoginLink;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class RegisterForm extends Component
{
    use WithRateLimiting;

    public string $name = '';

    public string $email = '';

    public function submit(CreateNewUser $createNewUser, SendLoginLink $sendLoginLink): void
    {
        $this->validate();

        try {
            $this->rateLimit(1);

            $user = $createNewUser->handle(
                name: $this->name,
                email: $this->email,
            );

            $sendLoginLink->handle(
                email: $user->email,
            );

            Toaster::success('Account created! Please check your email for a link to log in.');

            $this->reset();

            $this->redirectRoute(
                name: 'email-sent',
                navigate: true,
            );
        } catch (TooManyRequestsException $e) {
            throw ValidationException::withMessages([
                'email' => "Slow down! Please wait another {$e->secondsUntilAvailable} seconds to register.",
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:55',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique(table: 'users', column: 'email'),
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'email.unique' => 'The provided :attribute is already in use.'
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.register-form');
    }
}
