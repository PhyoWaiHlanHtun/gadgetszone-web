<div class="d-flex justify-content-between mb-3">
    <div>
        <p> Total Investment Amount : $ {{ getTotalInvestAmount() }} </p>
    </div>
    <div>
        <p> Total Profit Amount : $ {{ getTotalInvestProfitAmount() }} </p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Invest Plan</th>
            <th>Payment Type</th>
            <th>Amount</th>
            <th>Period</th>
            <th>Rate</th>
            <th>Profit</th>
            <th>Status</th>
            <th>Action</th>
            <th>Profit Date</th>
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
            <td colspan="11"> No Data Found. </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {!! $investment->links() !!}
</div>
