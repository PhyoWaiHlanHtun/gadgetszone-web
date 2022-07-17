@extends('backend.layouts.master')


@section('content')
<div class="page-content">
    <div class="container-fluid">


         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('product.sub_cat_edit') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('product.sub_cat') }}</a></li>
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
                        <h5 class="modal-title" id="exampleModalCreate">{{ __('product.sub_cat_edit') }}</h5>
                    </div>
                    <form action="{{ route('types.update',$type->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.cat_name') }}</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}" @if ($cate->id == $type->category->id) selected @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sub-categoryname-field" class="form-label">{{ __('product.sub_cat') }}</label>
                                {{-- <input type="text" id="sub-categoryname-field" class="form-control" name="name" placeholder="Enter Sub Category name" value="{{ $type->name }}" required /> --}}
                                <select class="form-select mb-3" aria-label="Default select example" name="name">
                                    <option value="new" @if ($type->name == 'new')
                                        selected
                                    @endif>New Product</option>
                                    <option value="special" @if ($type->name == 'special')
                                        selected
                                    @endif>Special Product</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.photo') }} (270x274) ( {{ __('main.optional') }})</label>
                                <input type="file" id="photo-field" class="form-control" name="photo" placeholder="Choose photo"/>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-success" id="add-btn">
                                {{ __('main.update') }}
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

