<table>
    <thead>
        <tr>
            <th>{{ __('frontend.no') }}</th>
            <th>{{ __('frontend.date') }}</th>            
            <th>{{ __('frontend.payment_type') }}</th>
            <th>{{ __('frontend.amount') }}</th>
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
            <td colspan="6"> {{ __('frontend.no_data') }} </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $donations->links() !!}
</div>