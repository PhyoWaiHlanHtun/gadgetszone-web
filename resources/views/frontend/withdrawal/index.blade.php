@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.withdrawal') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active"> {{ __('frontend.withdrawal') }} </li>
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

            <h4 class="my-4 text-center"> {{ __('frontend.withdrawal') }} </h4>

            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    @include('frontend.partials.alert')
                    <div class="card">
                        <div class="card-body">
                            <form action="/withdrawal" method="post" id="idcard-form" enctype="multipart/form-data">
                                @csrf                                

                                <select name="type" id="type" class="form-control my-3 @error('type') is-invalid @enderror" required>
                                    <option value="">--Select Withdrawal Format --</option>
                                    <option value="1">Click Commission ($ {{ Auth::user()->amount->click_commission ?? '0' }}) </option>
                                    <option value="2">Level Commission ($ {{ Auth::user()->amount->level_commission ?? '0' }}) </option>
                                    <option value="3">Capital ($ {{ Auth::user()->amount->capital ?? '0' }}) </option>
                                    <option value="4">Investment ($ {{ Auth::user()->amount->investment ?? '0' }}) </option>
                                </select>
                                
                                <input type="number" class="form-control my-3 @error('amount') is-invalid @enderror" name="amount" id="pay-amount" value="{{ old('amount') }}" placeholder="Withdrawal Amount ( Minimum - 10 USDT )">

                                <select name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror" required>
                                    <option value="">--{{ __('frontend.select_payment_type') }}--</option>
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}"> {{ $bank->name }} </option>
                                    @endforeach
                                </select>                                

                                <input type="text" class="form-control my-3 @error('account') is-invalid @enderror" name="account" id="account" value="{{ old('account') }}" placeholder="User Withdrawal Address">                                

                                <hr class="mt-5">
                                <h4 class="text-center my-4"> User Identity </h4>

                                <div class="my-3">
                                    <label for="">ID Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Please Enter ID Name">
                                </div>

                                <div class="my-3">
                                    <label for="">ID Number</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}" placeholder="Please Enter ID Number">
                                </div>

                                <div id="box" class="my-3">
                                    <label for="idcard-front"> Upload the front of your ID Card :  </label>
                                    <input type="file" name="front" class="form-control" id="idcard-front" accept="image/*" >
                                </div>

                                <div id="box" class="my-3">
                                    <label for="idcard-back"> Upload the back of your ID Card :  </label>
                                    <input type="file" name="back" class="form-control" id="idcard-back" accept="image/*" >
                                </div>

                                <div id="box" class="my-3">
                                    <label for="idcard-selfie"> Upload a photo of you holding an ID Card :  </label>
                                    <input type="file" name="selfie" class="form-control" id="idcard-selfie" accept="image/*" >
                                </div>

                                <div id="box" class="my-3">
                                    <label for="address"> Withdrawal Address :  </label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                                </div>
                                                                
                                <button type="btn btn-block" id="customBtn">{{ __('frontend.withdrawal') }}</button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h4 class="my-4"> Withdrawal Instructions </h4>
                        <p> 1. The 100USDT trial funds given by the platform cannot be withdrawn, but only recharge funds and commissions can be withdrawn. </p>
                        <p> 2. The minimum withdrawal amount is 10USDT, and those less than 10USDT cannot be withdrawn. </p>
                        <p> 3. Please select the correct node and enter the correct delivery address, otherwise the funds will not reach your account. </p>
                        <p> 4. If the withdrawal has not arrived in the account for more than 12 hours and the account balance has not been deducted, please contact the online customer service. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top up area start -->

@endsection

@section('script')

    <script src="{{ asset('assets/js/payment.js') }}"></script>

@endsection
