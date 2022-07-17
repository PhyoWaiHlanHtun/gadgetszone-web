<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Payment Type</th>
            <th>Amount</th>
            <th>From</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $withdrawlHistory as $x => $tp )
        <tr>
            <td>{{ ++$x }}</td>
            <td>{{ $tp->withdrawl_date }} </td>
            <td>{{ $tp->bank->name }}</td>
            <td>$ {{ number_format($tp->amount) }} </td>
            <td>{{ $tp->type_format }}</td>
            <td>
                {!! $tp->status_format !!}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5"> No Data Found. </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $withdrawlHistory->links() !!}
</div>