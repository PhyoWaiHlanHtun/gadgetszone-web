<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>            
        </tr>
    </thead>
    <tbody>
        @forelse ($todayPurchase as $key => $item)
        <tr>
            <td> {{ ++$key }} </td>
            <td> {{ $item->product->name }} </td>
            <td> {{ $item->product->category->name }} </td>
            <td> ${{ $item->product->price }} </td>            
        </tr>
        @empty
        <tr>
            <td colspan="5"> No Data Found. </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $todayPurchase->links() !!}
</div>