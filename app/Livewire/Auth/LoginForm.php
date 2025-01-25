<?php

namespace App\Livewire\Auth;

use App\Actions\SendLoginLink;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LoginForm extends Component
{
    use WithRateLimiting;

    public string $email = '';

    public function submit(SendLoginLink $sendLoginLink): void
    {
        $this->validate();

        try {
            $this->rateLimit(5);

            $sendLoginLink->handle(
                email: $this->email,
            );

            Toaster::success("Link sent to $this->email.");

            $this->reset();

            $this->redirectRoute(
                name: 'email-sent',
                navigate: true,
            );
        } catch (TooManyRequestsException $e) {
            throw ValidationException::withMessages([
                'email' => "Slow down! Please wait another {$e->secondsUntilAvailable} seconds to log in.",
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists(table: 'users', column: 'email'),
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'email.exists' => 'The provided :attribute does not match our records.',
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.login-form');
    }
}
