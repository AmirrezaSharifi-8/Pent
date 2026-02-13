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
        $form = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ], [], [
            'email' => 'ایمیل',
            'password' => 'کلمه عبور'
        ]);

        $remember_me = isset($form['remember_me']) ? $form['remember_me'] : false;
        if (Auth::attempt(['email' => $form['email'], 'password' => $form['password']], $remember_me)) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'کاربری با مشخصات وارد شده یافت نشد']);
    }
}
