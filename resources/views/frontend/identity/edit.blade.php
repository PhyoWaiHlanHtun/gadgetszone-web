@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">User Identity</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> User Identity </li>
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

            <h4 class="my-4 text-center"> Please Re-Upload Your ID Card </h4>

            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    @include('frontend.partials.alert')
                    <div class="card">
                        <div class="card-body">
                            <form action="/user-identity/update" method="post" id="idcard-form" enctype="multipart/form-data">
                                
                                @csrf
                                
                                <div class="my-3">
                                    <label for="">ID Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" placeholder="Please Enter ID Name">
                                </div>
                                
                                <div class="my-3">
                                    <label for="">ID Number</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ $data->number }}" placeholder="Please Enter ID Number">
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

                                <button type="btn btn-block" class="mt-3" id="customBtn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top up area start -->

@endsection
