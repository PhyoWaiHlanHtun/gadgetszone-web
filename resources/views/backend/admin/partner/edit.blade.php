@extends('backend.layouts.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('home.partner_edit') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> {{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">{{ __('home.partners') }}</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('backend.layouts.msg')

        <div class="row">
            <div class="col-md-12">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalCreate">{{ __('home.partner_edit') }}</h5>
                    </div>
                    <form action="{{ route('partner.update',$partner->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">                            
                            <div class="mb-3">
                                <label for="photo-field" class="form-label"> {{ __('main.photo')}} (203x75) </label>
                                <input type="file" id="photo-field" class="form-control" name="image" placeholder="Choose photo (203x75)"/>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-success" id="add-btn">
                                    {{ __('main.update')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

