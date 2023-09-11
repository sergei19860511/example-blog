@if($paginator->hasPages())
<nav class="mt-4">
    <div class="flex flex-wrap items-center justify-center gap-3">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="active block p-3 text-sm font-black leading-none text-pink">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span class="active block p-3 text-sm font-black leading-none text-pink">{{ $page }}</span>
                        </span>
                    @else
                        <a href="{{ $url }}" class="block p-3 text-sm font-black leading-none text-white hover:text-pink" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
</nav>
@endif
