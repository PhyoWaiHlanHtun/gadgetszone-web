<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>            
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
            <td colspan="6"> No Data Found. </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $purchaseHistory->links() !!}
</div>