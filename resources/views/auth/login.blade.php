@extends('layouts.header')

@section('title', 'Авторизация')
@section('content')
<main class="bg-darkblue text-white md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">
        <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
            <h1 class="mb-5 text-lg font-semibold">Вход в аккаунт</h1>
            <form action="{{ route('login_handle') }}" method="POST" class="space-y-3">
                @csrf
                <input
                    class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                    type="email"
                    name="email"
                    required="required"
                    autofocus=""
                    autocomplete="email"
                    placeholder="E-mail">

                @error('email')
                    <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <input
                    class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                    type="password"
                    name="password"
                    required="required"
                    autocomplete="current-password"
                    placeholder="Пароль">
                @error('password')
                    <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <button class="w-full btn btn-pink" type="submit">Войти</button>
            </form>

            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs">
                    <a class="text-white hover:text-white/70 font-bold"
                       href="forgot.html"
                    >
                        Забыли пароль?
                    </a>
                </div>
                <div class="text-xxs md:text-xs">
                    <a class="text-white hover:text-white/70 font-bold"
                       href="register.html">
                        Регистрация
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
