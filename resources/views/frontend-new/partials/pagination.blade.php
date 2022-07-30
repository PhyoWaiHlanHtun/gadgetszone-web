@if ($paginator->hasPages())
<div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
    <div class="pages">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="li disabled">
                    <a class="page-link" href="#">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @else
                <li class="li">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="li">
                                <a class="page-link active" href="javascript:void(0)">{{ $page }}</a>
                            </li>
                        @else
                            <li class="li">
                                <a class="page-link" href="{{ $url }}"> {{ $page }}</a>
                                {{-- <a class="page-link" href="{{ route('frontend.types', 'category='. strtolower(Request::get('category')) .'&page='. $page) }}"> {{ $page }}</a> --}}
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="li">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @else
                <li class="li disabled">
                    <a class="page-link" href="#">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
@endif
