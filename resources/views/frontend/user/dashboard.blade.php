@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.account') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.account') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- account area start -->
<div class="account-dashboard pt-100px pb-100px">
    <div class="container">
        <div class="row">

            @include('frontend.partials.alert')

            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active"> 
                            {{ __('frontend.dashboard') }}
                        </a></li>
                        <li> <a href="#today-purchase" data-bs-toggle="tab" class="nav-link">
                            {{ __('frontend.today_purchase') }}
                        </a></li>
                        <li><a href="#purchase-history" data-bs-toggle="tab" class="nav-link">
                            {{ __('frontend.purchase_history')}}
                        </a></li>
                        <li><a href="#topup-history" data-bs-toggle="tab" class="nav-link">
                            {{ __('frontend.topup_history')}}
                        </a></li>
                        <li><a href="#withdrawal-history" data-bs-toggle="tab" class="nav-link">
                            {{ __('frontend.withdrawal_history')}}
                        </a></li>
                        <li><a href="#investment" data-bs-toggle="tab" class="nav-link">
                            {{ __('frontend.invest')}}
                        </a>
                        <li><a href="#donations" data-bs-toggle="tab" class="nav-link"> 
                            {{ __('frontend.donation')}}
                        </a>
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">
                             {{ __('frontend.account_detail')}}
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="row">
                            <div class="col-md-8">
                                <h4> {{ __('frontend.user_dashboard')}} </h4>
                                <div>
                                    <p class="my-3">{{ $user->username }}</p>
                                    <p class="my-3">{{ $user->email }}</p>
                                    <p class="my-3">{{ $user->phone }}</p>
                                    <p class="my-3"> {{ __('frontend.level')}} - {{ $user->referral->level->name }} </p>
                                </div>
                                <div class="my-3">
                                    <p> {{ __('frontend.ref_code')}} -
                                        <span id='referralCode'>{{ $user->referral->code }} </span>
                                    </p>
                                    <button class="btn mt-3" id="copyReferral"> {{ __('frontend.copy_code')}} </button>
                                </div>
                            </div>
                            <div class="col-md-4  text-md-end">

                                <div>
                                    <h5> {{ __('frontend.capital')}} </h5>
                                    <p> {{ $user->getAmountFormat($user->amount?->capital + $user->fakeBonus?->amount) }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> {{ __('frontend.click_comm')}} </h5>
                                    <p> $ {{ ($user->amount && $user->amount->click_commission) ? $user->amount?->click_commission : 0 }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> {{ __('frontend.level_comm')}} </h5>
                                    <p> $ {{ ($user->amount && $user->amount->level_commission) ? $user->amount?->level_commission : 0 }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> {{ __('frontend.total_amount')}} </h5>
                                    <p> $ {{ ($user->amount && $user->amount->total)  ? $user->amount->total : 0 }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <h4> {{ __('frontend.user_identity')}} </h4>

                            @if( $user->identity )

                            @if( $user->identity->status == 1 )
                                <span class="text-success">
                                    {{ __('frontend.id_approved')}}
                                </span>
                            @elseif( $user->identity->status == 2 )
                                <span class="text-danger">
                                    {{ __('frontend.id_reject')}}
                                    <a href="{{ route('user.identity.edit') }}" class="btn" id="customBtn" style="width:150px">
                                        {{ __('frontend.id_edit')}}
                                    </a>
                                </span>
                            @else
                                <span class="text-warning">
                                    {{ __('frontend.id_pending')}}
                                </span>
                            @endif

                            <table class="table mt-3">
                                <tr>
                                    <td> {{ __('frontend.id_name')}}</td>
                                    <td> : </td>
                                    <td> {{ $user->identity?->name }} </td>
                                </tr>
                                <tr>
                                    <td> {{ __('frontend.id_number')}} </td>
                                    <td> : </td>
                                    <td> {{ $user->identity?->number }} </td>
                                </tr>
                                <tr>
                                    <td> {{ __('frontend.front_id')}} </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($user->identity->front)) }}" alt="Front ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> {{ __('frontend.back_id')}} </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($user->identity->back)) }}" alt="Back ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> {{ __('frontend.with_id')}} </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($user->identity->selfie)) }}" alt="Photo with ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                            </table>
                            @else
                                <p> No Data Available.</p>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade" id="today-purchase">
                        <h4>{{ __('frontend.today_purchase') }}</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.purchaseToday')
                        </div>
                    </div>

                    <div class="tab-pane fade" id="purchase-history">
                        <h4>{{ __('frontend.purchase_history') }}</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.purchaseHistory')
                        </div>
                    </div>

                    <div class="tab-pane" id="topup-history">
                        <h4>{{ __('frontend.topup_history') }}</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.topup')
                        </div>
                    </div>

                    <div class="tab-pane" id="withdrawal-history">
                        <h4>{{ __('frontend.withdrawal_history') }}</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.withdrawal')
                        </div>
                    </div>

                    <div class="tab-pane" id="investment">
                        <h4> {{ __('frontend.invest')}} </h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.investment')
                        </div>
                    </div>

                    <div class="tab-pane" id="donations">
                        <h4> {{ __('frontend.donation')}} </h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.donations')
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account-details">
                        <h3> {{ __('frontend.account_detail')}} </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('frontend.user.update') }}" method="post">
                                       @csrf
                                        <div class="default-form-box mb-20">
                                            <label> {{ __('frontend.username') }}</label>
                                            <input type="text" name="username" value="{{ $user->username }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label> {{ __('frontend.email') }}</label>
                                            <input type="text" name="email" value="{{ $user->email }}" readonly>
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label> {{ __('frontend.phone') }}</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label> {{ __('frontend.password') }}</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>{{ __('frontend.confirm_pass') }}</label>
                                            <input type="password" name="confirm-password">
                                        </div>
                                        <br>
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">{{ __('frontend.submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area start -->

@endsection

@section('script')

<script>
$(document).ready(function(){

    $(document).on('click', '#topup-history .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.topup.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#topup-history #table_data').html(data);
         }
       });
    });

    $(document).on('click', '#withdrawal-history .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.withdrawal.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#withdrawal-history #table_data').html(data);
         }
       });
    });

    $(document).on('click', '#today-purchase .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.purchase.today.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#today-purchase #table_data').html(data);
         }
       });
    });

    $(document).on('click', '#purchase-history .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.purchase.history.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#purchase-history #table_data').html(data);
         }
       });
    });

    $(document).on('click', '#investment .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.investment.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#investment #table_data').html(data);
         }
       });
    });

    $(document).on('click', '#donations .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.donations.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#donations #table_data').html(data);
         }
       });
    });

   });
</script>

@endsection
