<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ], [], [
            'email' => 'ایمیل',
            'password' => 'کلمه عبور'
        ]);

        $remember = $request->get('remember', false);
        $credentials['is_active'] = true;

        if (Auth::attempt($credentials, (bool)$remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'کاربری با مشخصات وارد شده یافت نشد']);
    }
}
