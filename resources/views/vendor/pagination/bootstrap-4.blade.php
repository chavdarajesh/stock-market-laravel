@if ($paginator->hasPages())
<div class="row">
    <div class="col-md-12">
        <ul class="blog-page__pagination clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            {{-- <li class="prev disabled"><a href="javascrip:void(0);"><span class="icon-caret-left"></span></a></li> --}}
            @else
            <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><span class="icon-caret-left"></span></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li><a href="javascrip:void(0);" class="disabled">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li><a href="javascrip:void(0);" class="active">{{ $page }}</a></li>
                        @else
                        <li><a href="{{ $url }}" >{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><span class="icon-caret-right"></span></a></li>
            @else
            {{-- <li class="next disabled"><a href="javascrip:void(0);"><span class="icon-caret-right"></span></a></li> --}}
            @endif
        </ul>
    </div>
    </div>
@endif
