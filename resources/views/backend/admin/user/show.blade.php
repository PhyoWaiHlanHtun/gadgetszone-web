@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/libs/gridjs/theme/mermaid.min.css') }}">
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('account-setting.cus_detail') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('account-setting.customer') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->       
        
        <div class="row">
            <div class="col-lg-12">
                @include('backend.partials.alert')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('account-setting.cus_detail') }} </h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td> Username </td>
                                <td> - </td>
                                <td> {{ $user->username }} </td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> - </td>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <td> Phone </td>
                                <td> - </td>
                                <td> {{ $user->phone }} </td>
                            </tr>
                            <tr>
                                <td> Referral Code </td>
                                <td> - </td>
                                <td> {{ $user->referral->code }} </td>
                            </tr>
                            <tr>
                                <td> Level </td>
                                <td> - </td>
                                <td> {{ $user->referral->level->name }} </td>
                            </tr>
                            <tr>
                                <td> Capital Amount </td>
                                <td> - </td>
                                <td> $ {{ ($user->amount && $user->amount->capital) ? $user->amount?->capital : 0 }} </td>
                            </tr>
                            <tr>
                                <td> Click Commission </td>
                                <td> - </td>
                                <td> $ {{ ($user->amount && $user->amount->click_commission) ? $user->amount?->click_commission : 0 }} </td>
                            </tr>
                            <tr>
                                <td> Level Commission </td>
                                <td> - </td>
                                <td> $ {{ ($user->amount && $user->amount->level_commission) ? $user->amount?->level_commission : 0 }} </td>
                            </tr>
                            <tr>
                                <td> Total Amount </td>
                                <td> - </td>
                                <td> $ {{ ($user->amount && $user->amount->total)  ? $user->amount->total : 0 }} </td>
                            </tr>
                        </table>

                        <div class="mt-5">
                            <h4> User Identity </h4>

                            @if( $user->identity?->status == 1 )
                            <table class="table">
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
                        
                        {{-- <div class="mt-5">                            
                            <h4> {{ __('account-setting.user_tree_view')}} </h4>                                
                            
                            @if( $user->getGroupALeader()) 
                                <div class="my-4">
                                    <h6> Level A </h6>
                                    <p>{{ $user->getGroupALeader()->username ?: '- - -' }} </p>
                                </div>
                            @else
                                <div class="my-4">
                                    <h6> Level A </h6>
                                    <p>{{ $user->username ?: '- - -' }} </p>
                                </div>
                            @endif
                            
                            @if( $groupB = $user->getGroupALeader()?->members)
                                <div class="my-4">
                                    <h5> Level B </h5>
                                    @foreach( $user->getGroupALeader()->members as $member)
                                        <p>{{ $member->member->username ?: '- - -' }} </p>
                                    @endforeach
                                </div>
                            @elseif(count($user->members))
                                <div class="my-4">
                                    <?php $groupB = $user->members ?>
                                    <h6> Level B </h6>
                                    @foreach( $groupB as $member)
                                        <p>{{ $member->member->username ?: '- - -' }} </p>
                                    @endforeach
                                </div>
                            @endif

                            @if( $groupC = $user->getGroupMembers($groupB))
                                <div class="my-4">
                                    <h6> Level C </h6>
                                    @foreach( $groupC as $member)
                                        <p>{{ $member->member->username ?: '- - -' }} </p>
                                    @endforeach
                                </div>
                            @endif

                            @for ($i = 4; $i < 27; $i++)
                            <?php $old = (isset($new)) ? $new : $groupC ?>
                            <?php $new = "group{$i}" ?>
                                @if( $new = $user->getGroupMembers($old))
                                    <div class="my-4">
                                        <h6> Level {{ getAlphabets($i) }} </h6>
                                        @foreach( $new as $member)
                                            <p>{{ $member->member->username ?: '- - -' }} </p>
                                        @endforeach
                                    </div>
                                    <?php $old = $new ?>
                                @endif
                            @endfor                            
                        </div> --}}

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>       

    </div>
    <!-- container-fluid -->
</div>

@endsection