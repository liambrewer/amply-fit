<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request, string $email): RedirectResponse
    {
        if (!$request->hasValidSignature()) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        /**
         * @var User $user
         */
        $user = User::query()->where('email', $email)->firstOrFail();

        Auth::login($user);

        return redirect()->intended(
            default: route('dashboard'),
        );
    }
}
