@extends('layouts.blank')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-2xl font-semibold">دستیار شخصی</h1>
    </div>
    <form class="mt-4" method="POST" action="<?= route('login') ?>">
        @csrf

        <x-input-group name="email" type="email" label="ایمیل" placeholder="example@company.com" autofocus="true" />
        <x-input-group name="password" type="password" label="کلمه عبور" placeholder="********" />
        <x-checkbox name="remember_me" label="مرا به خاطر بسپار" />

        <button
            type="submit"
            class="bg-gray-800 transition w-full rounded-md text-white p-1 pb-2 text-sm font-semibold hover:bg-gray-900 focus:outline-gray-400 focus:outline-3">
            ورود
        </button>
    </form>
    <div class="mt-4 text-center">
        <span class="text-gray-800 text-sm">
            حساب کاربری ندارید؟
            <a href="{{ route('register') }}" class="font-bold">ثبت نام کنید</a>
        </span>
    </div>
@endsection
