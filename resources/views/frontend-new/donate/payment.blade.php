@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/donate/ukarine.jpg') }})">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title text-white"> {{ __('frontend.donate_ukarine')}} </h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.donation') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- top up area start -->
<div class="pt-100px pb-100px">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <h3 class="my-4 text-center"> {{ __('frontend.pay_type')}} </h3>
            <div class="col-lg-8" id="pay-type">
                @include('frontend.partials.alert')
                <form action="/donate/payment" method="post" id="topupform" enctype="multipart/form-data">
                    @csrf

                    <div id="box">
                        {{ __('frontend.amount') }} : {{ number_format($amount) }}
                    </div>

                    <div id="box">
                        {{ __('frontend.payment_name') }} : {{ $bank->name }}
                    </div>

                    @if( $bank->account )
                    <div id="box" class="d-md-flex justify-content-between">
                        <p> {{ __('frontend.account_no') }}  :  <span id="accountCode" style=" display:block; overflow-wrap:anywhere;"> {{ $bank->account }} </span> </p>
                        <button id="copyAccount"> {{ __('frontend.copy') }}  </button>
                    </div>
                    @endif

                    <div id="box" class="d-flex">
                        <p style="width:50%"> {{ __('frontend.screenshot') }}  :  </p>
                        <input type="file" name="image" class="form-control" id="trans" accept="image/*" required>
                    </div>

                    {{-- <input type="text" class="form-control my-3" name="trans_id" id="trans_id" placeholder="Transaction id" > --}}

                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <input type="hidden" name="bank" value="{{ $bank->id }}">

                    <button class="btn btn-block mt-4" id="customBtn" type="submit"> {{ __('frontend.donate') }}  </button>
                    @if( $bank == 'custom')

                        <div id="box">
                            From Your Capital Amount
                        </div>
                    
                    @else

                        <div id="box">
                            Payment Name : {{ $bank->name }}
                        </div>

                        @if( $bank->account )
                        <div id="box" class="d-md-flex justify-content-between">
                            <p> Account No :  <span id="accountCode"> {{ $bank->account }} </span> </p>
                            <button id="copyAccount"> Copy </button>
                        </div>
                        @endif

                        <div id="box" class="d-md-flex">
                            <p style="width:50%"> Transaction Screenshot :  </p>
                            <input type="file" name="image" class="form-control" id="trans" accept="image/*" required>
                        </div>

                        
                        {{-- <input type="text" class="form-control my-3" name="trans_id" id="trans_id" placeholder="Transaction id" > --}}
                        
                        <input type="hidden" name="bank" value="{{ $bank->id }}">

                    @endif

                    <input type="hidden" name="amount" value="{{ $amount }}">
                    
                    <button class="btn btn-block mt-4" id="customBtn" type="submit"> Donate </button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- top up area start -->

@endsection

@section('script')



@endsection
