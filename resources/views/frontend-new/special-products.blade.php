@forelse ($special as $item)
    @if ($item->type->name == 'special')
        <div class="md-w-20 sm-w-50 mb-30px">
            <!-- Single Prodect -->
            <div class="product">
                <div class="thumb">
                    <a href="{{ route('frontend.single-product',$item->id) }}" class="image">
                        <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                        <img class="hover-image" src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                    </a>
                </div>
                <div class="content">
                    <span class="category"><a href="#">{{ $item->category->name }}</a></span>
                    <h5 class="title"><a href="{{ route('frontend.single-product',$item->id) }}">{{ $item->name }}
                        </a>
                    </h5>
                    <span class="price">
                        <span class="new">${{ $item->price }}</span>
                    </span>
                </div>
                <div class="actions">
                    {{-- <a href="{{ route('frontend.single-product',$item->id) }}">
                        <button title="Add To Cart" class="action add-to-cart">
                            <i class="pe-7s-cart"></i>
                        </button>
                    </a> --}}
                    &nbsp;
                    <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-id="{{ $item->id }}" id="showProduct"><i class="pe-7s-look"></i></button>
                </div>
            </div>
        </div>                    
    @endif
    
@empty
    <p class="text-center"> No Products Found. </p>
@endforelse

@if( count($special) )
    <div class="d-flex justify-content-center">
        {{ $special->links() }}
    </div>
@endif

