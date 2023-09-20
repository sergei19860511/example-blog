@extends('layouts.header-profile')
@section('title', 'Профиль')

@section('content')
    <main class="py-16 lg:py-20">
        <div class="container">
            {{--<p class="max-w-[640px] mt-4 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple mb-5">
                Изменения сохранены
            </p>--}}

            <div class="md:flex md:items-start md:justify-between md:space-x-4" x-data="{active: 1}">
                <div class="md:w-1/2 md:my-0 my-4 w-full p-2 xs:p-4 md:p-8 2xl:p-12 rounded-[20px] bg-purple">
                    <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 1}" @click="active = 1"> Редактировать профиль</div>
                    <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 2}" @click="active = 2"> Изменить пароль</div>
                </div>
                <div class="w-full p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                    <form action="{{ route('profile_handle') }}" method="POST" class="space-y-3" x-show="active === 1" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-between">
                            <div><input type="file" class="hidden">
                                <div class="mt-2"><img
                                        src="{{ asset('images/nav/logo.svg') }}"
                                        alt="" class="rounded-full h-20 w-20 object-cover"></div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="w-full btn btn-pink mt-2 mr-2" type="button"> Загрузить</button>
                                <button class="w-full btn btn-outline mt-2" type="button"> Удалить</button>
                            </div>
                        </div>

                        <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                               type="text"
                               name="name"
                               required=""
                               placeholder="Имя">
                        @error('name')
                            <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                        @enderror

                        <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                               type="email"
                               name="email"
                               required=""
                               placeholder="E-mail">
                        @error('email')
                            <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                        @enderror

                        <button class="w-full btn btn-pink" type="submit"> Сохранить</button>

                        @if(session('status'))
                            <div>
                                <div class="text-center p-4 my-4 rounded-lg shadow-xl bg-card"> Профиль сохранен</div>
                            </div>
                        @endif

                    </form>
                    <form class="space-y-3" x-show="active === 2">
                        <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                               type="password"
                               required=""
                               autocomplete="current-password"
                               placeholder="Текущий пароль"
                        >

                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="password" required="" autocomplete="new-password" placeholder="Новый пароль"
                        >

                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="password" required="" autocomplete="new-password" placeholder="Повторите пароль"
                        >

                        <button class="w-full btn btn-pink" type="submit"> Сменить пароль</button>

                        <div>
                            {{--<div class="text-center p-4 my-4 rounded-lg shadow-xl bg-card" style="display: none;"> Новый
                                пароль установлен
                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


