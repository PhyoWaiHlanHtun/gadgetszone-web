@extends('backend.layouts.master')

@section('css')
  
  <link href="{{ asset('backend/vendors/image-uploader/image-uploader.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('payment.bank_edit') }} </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }} </a></li>
                            <li class="breadcrumb-item active">{{ __('payment.banks') }} </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->       
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('payment.bank_edit') }} </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bank.update',$bank->id) }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            @method('put')

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="name" class="form-label"> {{ __('main.name') }}
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name"  value="{{ $bank->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="account" class="form-label"> {{ __('main.account') }}
                                        @error('account')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="account" class="form-control @error('account')is-invalid @enderror" id="account" name="account" value="{{ $bank->account }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="phone" class="form-label"> {{ __('main.phone') }}
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="tel" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ $bank->phone }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="images"> {{ __('main.photo') }} <br> ( {{ __('main.max_img')}} 1 )
                                        @error('images')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="input-images" id="images"></div>
                                </div>
                            </div>                     

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="type" class="form-label">{{ __('payment.type') }}
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select mb-3" id="type" aria-label="Default select example" name="type">
                                        <option selected disabled>{{ __('main.open_select')}}</option>
                                        <option value="1" {{ ($bank->type == 1 ) ? 'selected' : '' }}> Topup </option>
                                        <option value="2" {{ ($bank->type == 2 ) ? 'selected' : '' }}> Investment </option>
                                        <option value="3" {{ ($bank->type == 3 ) ? 'selected' : '' }}> Donation </option>
                                    </select>
                                </div>
                            </div>       

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> {{ __('main.submit')}} </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('backend/vendors/image-uploader/image-uploader.min.js') }}"></script>
  
<script>

    var id = `{{ $bank->id }}`;
    let text = $("#locale").val() == 'ch' ? '将文件拖放到此处或单击以浏览' : 'Drag & Drop files here or click to browse';

     $.ajax({
        url: "/api/bank/image/"+id          
    }).done(function(response) {
      
        if( response ){
            $('.input-images').imageUploader({
                preloaded: response,
                imagesInputName: 'images',
                preloadedInputName: 'old',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 1,
                label : text
            });
        }

    });
    
</script>
@endsection