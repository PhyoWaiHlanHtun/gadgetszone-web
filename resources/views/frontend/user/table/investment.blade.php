<div class="d-flex justify-content-between mb-3">
    <div>
        <p> {{ __('frontend.total_inv_amount')}} : $ {{ getTotalInvestAmount() }} </p>
    </div>
    <div>
        <p> {{ __('frontend.total_profit_amount')}} : $ {{ getTotalInvestProfitAmount() }} </p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>{{ __('frontend.no') }}</th>
            <th>{{ __('frontend.date') }}</th>
            <th>{{ __('frontend.inv_plan') }}</th>
            <th>{{ __('frontend.payment_type') }}</th>
            <th>{{ __('frontend.amount') }}</th>
            <th>{{ __('frontend.period') }}</th>
            <th>{{ __('frontend.rate') }}</th>
            <th>{{ __('frontend.profit') }}</th>
            <th>{{ __('frontend.status') }}</th>
            <th>{{ __('frontend.action') }}</th>
            <th>{{ __('frontend.profit_date') }}</th>
        </tr>
    </thead>
    <tbody> 
        @forelse( $investment as $x => $inv )         
        <tr>
            <td> {{ ++$x }}</td>
            <td> {{ $inv->investment_date }} </td>
            <td> {{ $inv->plan }} </td>
            <td> {{ $inv->bank ? $inv->bank->name : 'From Capital Amount' }}</td>
            <td> $ {{ number_format($inv->amount) }} </td>            
            <td> {{ $inv->period }} </td>            
            <td> {{ $inv->rate }} </td>            
            <td> {{ $inv->profit }} </td>
            <td>
                {!! $inv->status_format !!}
            </td>
            <td>
                {!! $inv->action_format !!}
            </td>
            <td>
                {{ $inv->profit_date }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="11"> {{ __('frontend.no_data') }} </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $investment->links() !!}
</div>