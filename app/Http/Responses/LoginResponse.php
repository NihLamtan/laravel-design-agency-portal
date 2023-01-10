<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Cookie;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        } else {
            if (Cookie::get('checkout_service_slug')) {
                return redirect()->route('checkout', ['plan' => Cookie::get('checkout_service_slug')]);
            } else {
                return redirect()->intended(config('fortify.home'));
            }
        }
    }
}
