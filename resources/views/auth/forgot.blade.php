@extends('layouts.header-auth')
@section('title')

@section('content')
    <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
        <h1 class="mb-5 text-lg font-semibold">Восстановить пароль</h1>
        @if(session('status'))
            <div class="font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST" class="space-y-3">
            @csrf
            <input
                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                type="email"
                name="email"
                required="required"
                autofocus="autofocus"
                placeholder="E-mail">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <button class="w-full btn btn-pink" type="submit">Отправить</button>
        </form>

        <div class="space-y-3 mt-5">
            <div class="text-xxs md:text-xs">
                <a class="text-white hover:text-white/70 font-bold"
                   href="{{ route('login') }}"
                >
                    Я вспомнил пароль
                </a>
            </div>
        </div>
    </div>
@endsection
