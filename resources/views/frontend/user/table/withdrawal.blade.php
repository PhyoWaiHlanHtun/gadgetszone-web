<table>
    <thead>
        <tr>
            <th>{{ __('frontend.no') }}</th>
            <th>{{ __('frontend.date') }}</th>
            <th>{{ __('frontend.payment_type') }}</th>
            <th>{{ __('frontend.amount') }}</th>
            <th>{{ __('frontend.from') }}</th>
            <th>{{ __('frontend.status') }}</th>
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
            <td colspan="6"> {{ __('frontend.no_data') }} </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $withdrawlHistory->links() !!}
</div>