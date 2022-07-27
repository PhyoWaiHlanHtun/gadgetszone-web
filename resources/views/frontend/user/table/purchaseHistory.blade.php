<table>
    <thead>
        <tr>
            <th>{{ __('frontend.no') }}</th>
            <th>{{ __('frontend.date') }}</th>
            <th>{{ __('frontend.product_name') }}</th>
            <th>{{ __('frontend.category')}}</th>
            <th>{{ __('frontend.price') }}</th>            
        </tr>
    </thead>
    <tbody>
        @forelse ($purchaseHistory as $key => $item)
        <tr>
            <td> {{ ++$key }} </td>
            <td> {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} </td>
            <td> {{ $item->product->name }} </td>
            <td> {{ $item->product->category->name }} </td>
            <td> ${{ $item->product->price }} </td>            
        </tr>
        @empty
        <tr>
            <td colspan="6"> {{ __('frontend.no_data')}} </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $purchaseHistory->links() !!}
</div>