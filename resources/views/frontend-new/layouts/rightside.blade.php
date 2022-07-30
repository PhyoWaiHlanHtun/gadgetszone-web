<!-- OffCanvas Cart Start -->
@php
    $purchased = purchased();
@endphp
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Purchased List</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @if (Auth::guard('user')->check())
                    @foreach ($purchased as $item)
                        <li>
                            <a href="#" class="image"><img src="{{ asset('storage/images/product/'.explode(',',$item->product->images)[0]) }}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="#" class="title">{{ $item->product->name }}</a>
                                <span class="quantity-price">1 x <span class="amount">${{ $item->product->price }}</span></span>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->
