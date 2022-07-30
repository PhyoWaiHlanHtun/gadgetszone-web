@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.topup') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.topup') }}</li>
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
        <div class="row">

            @include('frontend.partials.alert')

            <h4 class="my-4 text-center"> {{ __('frontend.select_payment_amount') }} </h4>

            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <input type="number" class="form-control" name="amount" id="pay-amount" placeholder="00.00">
                        <div class="row d-flex justify-content-center my-3" id="pay-money">
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="100">
                                $100.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="300">
                                $300.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="500">
                                $500.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="1000">
                                $1,000.00
                            </a>

                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="3000">
                                $3,000.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="5000">
                                $5,000.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="10000">
                                $10,000.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="20000">
                                $20,000.00
                            </a>

                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="50000">
                                $50,000.00
                            </a>
                            <a href="javascript:void(0)" class="col-md-6 text-center" id="pay-amount-box" data-amount="100000">
                                $100,000.00
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <h4 class="my-5 text-center"> {{ __('frontend.select_payment_type') }} </h4>

            <div class="row" id="pay-type">
            @foreach ($bank as $item)
                <div class="col-md-4 my-2">
                    <div class="card">
                        <a href="javascript:void(0)" class="card-body" data-id="{{ $item->id }}">
                            <img src="{{ asset(getImage($item->image)) }}" class="d-flex mx-auto mb-3" alt="Bank Logo" width="150">
                            <h5> {{ $item->name }} </h5>
                            <p> {{ $item->account }} </p>
                            <p> {{ $item->phone }} </p>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>

            <form action="/top-up/payment" method="get" id="payform">
                <input type="hidden" name="amount" id="pay_amount" value="">
                <input type="hidden" name="type" id="pay_type" value="">
            </form>
        </div>
    </div>
</div>
<!-- top up area start -->

@endsection

@section('script')

    <script src="{{ asset('assets/js/payment.js') }}"></script>

@endsection
