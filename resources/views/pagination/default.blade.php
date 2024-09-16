{{--@if ($paginator->hasPages())--}}
{{--    <ul class="pagination">--}}
{{--        --}}{{-- Previous Page Link --}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="page-item disabled" aria-disabled="true">--}}
{{--                <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--            </li>--}}
{{--        @else--}}
{{--		--}}
{{--			@php--}}
{{--				$prev = $paginator->previousPageUrl();--}}
{{--				$arr = explode('?', $prev);--}}
{{--				if ($arr[1] == 'page=1') $prev = str_replace('?page=1', '', $prev);--}}
{{--			@endphp--}}
{{--		--}}
{{--            <li class="page-item">--}}
{{--                <a class="page-link" href="{{ $prev }}" rel="prev">&lsaquo;</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        --}}{{-- Pagination Elements --}}
{{--        @foreach ($elements as $element)--}}
{{--            --}}{{-- "Three Dots" Separator --}}
{{--            @if (is_string($element))--}}
{{--                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--            --}}{{-- Array Of Links --}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--				--}}
{{--					@php--}}
{{--						$arr = explode('?', $url);--}}
{{--						if ($arr[1] == 'page=1') $url = str_replace('?page=1', '', $url);--}}
{{--					@endphp--}}
{{--					--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        --}}{{-- Next Page Link --}}
{{--        @if ($paginator->hasMorePages())--}}
{{--            <li class="page-item">--}}
{{--                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="page-item disabled" aria-disabled="true">--}}
{{--                <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--@endif--}}
