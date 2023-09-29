@extends('layouts.header')

@section('title', 'Подробно о статье')
@section('content')

<main class="py-16 lg:py-20">
    <div class="container">
        <div>
            <div class="tasks-card-photo overflow-hidden h-40 xs:h-48 sm:h-[300px] rounded-3xl md:rounded-[40px]">
                <img src="{{ asset('images/article_demo.jpg') }}"
                     class="object-cover w-full h-full" alt="">
            </div>
            <div class="prose prose-lg min-w-full prose-img:rounded-xl prose-invert">
                <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                    {{ $article->title }}
                </h1>
                <div class="flex flex-wrap gap-3 mt-7">
                    <a href="{{ route('show_category', $article->category) }}"
                       class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                        {{ $article->category->title }}
                    </a>
                </div>

                <div class="mt-4 break-words">

                    <p>
                        {{ $article->text }}
                    </p>
                    <p>
                        Автор статьи: {{ $article->user->name }}
                    </p>

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
