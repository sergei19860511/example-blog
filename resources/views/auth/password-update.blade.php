@extends('layouts.header-auth')
@section('title')

@section('content')
    <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
        <h1 class="mb-5 text-lg font-semibold">Сброс пароля</h1>
        <form action="{{ route('password.update') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input
                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                type="email"
                value="{{ old('email', $request->email) }}"
                name="email"
                required="required"
                autofocus="autofocus"
                placeholder="E-mail">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <input
                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                type="password"
                name="password"
                required="required"
                placeholder="Пароль">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <input
                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                type="password"
                name="password_confirmation"
                required="required"
                placeholder="Подтвердите пароль">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <button class="w-full btn btn-pink" type="submit">Отправить</button>
        </form>
    </div>
@endsection
