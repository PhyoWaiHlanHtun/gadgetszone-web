<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>            
            <th>Payment Type</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $donations as $x => $donation )
        <tr>
            <td>{{ ++$x }}</td>
            <td>{{ dateFormat($donation->created_at) }} </td>            
            <td>{{ $donation->bank ? $donation->bank->name : 'From Capital Amount' }}</td>
            <td>$ {{ number_format($donation->amount) }} </td>
        </tr>
        @empty
        <tr>
            <td colspan="6"> No Data Found. </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $donations->links() !!}
</div>