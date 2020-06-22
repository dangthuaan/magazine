@if ($paginator->hasPages())
    <nav>
        <ul class="pagination kt-pagination__links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled kt-pagination__link--first" aria-disabled="true"
                    aria-label="@lang('pagination.previous')">
                    <a><i class="fa fa-angle-left kt-font-brand"></i></a>
                </li>
            @else
                <li class="kt-pagination__link--first">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')"><i
                            class="fa fa-angle-left kt-font-brand"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="kt-pagination__link--active" aria-current="page"><span><a>{{ $page }}</a></span>
                            </li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="kt-pagination__link--last">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')"><i class="fa fa-angle-right kt-font-brand"></i></a>
                </li>
            @else
                <li class="disabled kt-pagination__link--last" aria-disabled="true"
                    aria-label="@lang('pagination.next')">
                    <a><i class="fa fa-angle-right kt-font-brand"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
