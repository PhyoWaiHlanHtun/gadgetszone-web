<table>
    <thead>
        <tr>
            <th>{{ __('frontend.no') }}</th>
            <th>{{ __('frontend.date') }}</th>
            <th>{{ __('frontend.payment_type') }}</th>
            <th>{{ __('frontend.amount') }}</th>
            <th>{{ __('frontend.status') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $topupHistory as $x => $tp )
        <tr>
            <td>{{ ++$x }}</td>
            <td>{{ $tp->topup_date }} </td>
            <td>{{ $tp->bank->name }}</td>
            <td>$ {{ number_format($tp->amount) }} </td>
            <td>
                {!! $tp->status_format !!}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5"> {{ __('frontend.no_data')}} </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $topupHistory->links() !!}
</div>