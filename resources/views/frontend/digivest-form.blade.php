@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/invest.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.invest_plan') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.invest_plan') }}</li>
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

            <h3 class="my-4 text-center"> {{ __('frontend.invest_form') }}</h3>
            <div class="col-lg-8" id="pay-type">
                @include('frontend.partials.alert')
                <form action="{{ route('frontend.digiinvest.store') }}" method="post" id="topupform" enctype="multipart/form-data">
                    @csrf

                    <div id="box">
                        @switch($plan)
                            @case("1")
                                Plan : Gadgets Zone Return Collective Asset Management Plan
                                @break
                            @case("2")
                                Plan : Gadgets Zone Deposit Management Plan
                                @break
                            @case("3")
                                Plan : Gadgets Zone eco growth Management Plan
                                @break
                            @default

                        @endswitch

                    </div>

                    <div id="box">
                        {{ __('frontend.amount') }} : {{ number_format($amount) }}
                    </div>

                    <div id="box" class="d-flex">
                        <p style="width:50%"> Investment Period :  </p>
                        <select name="period" id="period" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="30"> 30 Days </option>
                            @if( $plan != 2)
                                <option value="60"> 60 Days </option>
                                <option value="90"> 90 Days </option>
                            @endif
                        </select>
                    </div>

                    @if( $bank == 'custom')

                        <div id="box">
                            {{ __('frontend.from_captial')}}
                        </div>
                    
                    @else

                        <div id="box">
                            {{ __('frontend.payment_name') }} : {{ $bank->name }}
                        </div>

                        @if( $bank->account )
                        <div id="box" class="d-md-flex justify-content-between">
                            <p> {{ __('frontend.account_no') }} :  <span id="accountCode"> {{ $bank->account }} </span> </p>
                            <button id="copyAccount"> {{ __('frontend.copy') }} </button>
                        </div>
                        @endif

                        <div id="box" class="d-md-flex">
                            <p style="width:50%"> {{ __('frontend.screenshot') }} :  </p>
                            <input type="file" name="image" class="form-control" id="trans" required accept="image/*">
                        </div>
                        
                        {{-- <input type="text" class="form-control my-3" name="trans_id" id="trans_id" placeholder="Transaction id" > --}}
                        
                        <input type="hidden" name="bank" value="{{ $bank->id }}">

                    @endif

                    {{-- <input type="text" class="form-control my-3" name="trans_id" id="trans_id" placeholder="Transaction id" > --}}
                    <input type="hidden" name="plan" value="{{ $plan }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">

                    <button class="btn btn-block mt-4" id="customBtn" type="submit"> {{ __('frontend.invest') }} </button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- top up area start -->

@endsection

@section('script')



@endsection
