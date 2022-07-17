@extends('backend.layouts.master')

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('about.create') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ __('about.about') }}</a></li>                            
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
                    <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"><div class="mb-3">
                                <label class="form-label">{{ __('main.title') }}</label>
                                <input type="text" class="form-control" name="title" required />
                            </div>
                            <div class="mb-3">
                                <textarea id="summernote" name="para"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('main.status') }}</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="status" id="select">
                                    <option selected disabled> </option>
                                    <option value="1">{{ __('main.show_data') }}</option>
                                    <option value="0">{{ __('main.hide_data') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('main.serial') }}</label>
                                <input type="number" class="form-control" name="serial" required />
                            </div>
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.select_img') }}</label>
                                <input type="file" id="photo-field" class="form-control" name="image"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-success" id="add-btn">{{ __('main.create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: '',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>


@endsection
