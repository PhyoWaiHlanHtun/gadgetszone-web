@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Account</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>
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
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                        <li> <a href="#today-purchase" data-bs-toggle="tab" class="nav-link">Today Purchase</a></li>
                        <li><a href="#purchase-history" data-bs-toggle="tab" class="nav-link">Purchase History</a></li>
                        <li><a href="#topup-history" data-bs-toggle="tab" class="nav-link">Top-up History</a></li>
                        <li><a href="#withdrawal-history" data-bs-toggle="tab" class="nav-link">Withdrawal History</a></li>
                        <li><a href="#investment" data-bs-toggle="tab" class="nav-link"> Investment </a>
                        <li><a href="#donations" data-bs-toggle="tab" class="nav-link"> Donations </a>
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="row">
                            <div class="col-md-8">
                                <h4> User Dashboard </h4>
                                <div>
                                    <p class="my-3">{{ $user->username }}</p>
                                    <p class="my-3">{{ $user->email }}</p>
                                    <p class="my-3">{{ $user->phone }}</p>
                                    <p class="my-3"> Level - {{ $user->referral->level->name }} </p>
                                </div>
                                <div class="my-3">
                                    <p> Referral Code -
                                        <span id='referralCode'>{{ $user->referral->code }} </span>
                                    </p>
                                    <button class="btn mt-3" id="copyReferral"> Copy Code </button>
                                </div>
                            </div>
                            <div class="col-md-4  text-md-end">

                                <div>
                                    <h5> Capital Amount </h5>
                                    <p> $ {{ ($user->amount && $user->amount->capital) ? $user->amount->capital : 0 }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> Click Commission </h5>
                                    <p> $ {{ ($user->amount && $user->amount->click_commission) ? $user->amount->click_commission : 0 }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> Level Commission </h5>
                                    <p> $ {{ ($user->amount && $user->amount->level_commission) ? $user->amount->level_commission : 0 }} </p>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <h5> Total Amount </h5>
                                    <p> $ {{ ($user->amount && $user->amount->total)  ? $user->amount->total : 0 }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <h4> User Identity </h4>

                            @if( $user->identity )

                            @if( $user->identity->status == 1 )
                                <span class="text-success">
                                    Your ID Card is approved.
                                </span>
                            @elseif( $user->identity->status == 2 )
                                <span class="text-danger">
                                    Your ID Card is rejected. Please upload again.
                                    <a href="{{ route('user.identity.edit') }}" class="btn" id="customBtn" style="width:150px">
                                        ID Card Edit
                                    </a>
                                </span>
                            @else
                                <span class="text-warning">
                                    Your ID Card is pending. Please wait admin's approval.
                                </span>
                            @endif

                            <table class="table mt-3">
                                <tr>
                                    <td> ID Name </td>
                                    <td> : </td>
                                    <td> {{ $user->identity?->name }} </td>
                                </tr>
                                <tr>
                                    <td> ID Number </td>
                                    <td> : </td>
                                    <td> {{ $user->identity?->number }} </td>
                                </tr>
                                <tr>
                                    <td> Front ID Card </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($user->identity->front)) }}" alt="Front ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> Back ID Card </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($user->identity->back)) }}" alt="Back ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> Photo with ID Card </td>
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
                        <h4>Today Purchase</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.purchaseToday')
                        </div>
                    </div>

                    <div class="tab-pane fade" id="purchase-history">
                        <h4>Purchase History</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.purchaseHistory')
                        </div>
                    </div>

                    <div class="tab-pane" id="topup-history">
                        <h4>Topup History</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.topup')
                        </div>
                    </div>

                    <div class="tab-pane" id="withdrawal-history">
                        <h4>Withdrawal History</h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.withdrawal')
                        </div>
                    </div>

                    <div class="tab-pane" id="investment">
                        <h4> Investment </h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.investment')
                        </div>
                    </div>

                    <div class="tab-pane" id="donations">
                        <h4> Donations </h4>
                        <div class="table_page table-responsive" id="table_data">
                            @include('frontend.user.table.donations')
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('frontend.user.update') }}" method="post">
                                       @csrf
                                        <div class="default-form-box mb-20">
                                            <label> Username</label>
                                            <input type="text" name="username" value="{{ $user->username }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ $user->email }}" readonly>
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Password</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm-password">
                                        </div>
                                        <br>
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">Save</button>
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
