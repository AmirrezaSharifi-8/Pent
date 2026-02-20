@extends('layouts.blank')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-2xl font-semibold">دستیار شخصی</h1>
    </div>
    <form class="mt-4" method="POST">
        @csrf

        <x-input-group name="first_name" label="نام" autofocus="true" />
        <x-input-group name="last_name" label="نام خانوادگی" />
        <x-input-group name="email" type="email" label="ایمیل" autofocus="true" />
        <x-input-group name="password" type="password" label="کلمه عبور" />
        <x-input-group name="password_confirmation" type="password" label="تکرار کلمه عبور" />

        <button
            type="submit"
            class="bg-gray-800 transition w-full rounded-md text-white p-1 pb-2 text-sm font-semibold hover:bg-gray-900 focus:outline-gray-400 focus:outline-3">
            ثبت نام
        </button>
    </form>
    <div class="mt-4 text-center">
        <span class="text-gray-800 text-sm">
            حساب کاربری دارید؟
            <a href="{{ route('login') }}" class="font-bold">وارد شوید</a>
        </span>
    </div>
@endsection
