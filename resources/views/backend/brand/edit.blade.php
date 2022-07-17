@extends('backend.layouts.master')


@section('content')
<div class="page-content">
    <div class="container-fluid">


         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('product.brand_edit') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('product.brand') }}</a></li>
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
                        <h5 class="modal-title" id="exampleModalCreate">{{ __('product.brand_edit') }}</h5>
                    </div>
                    <form action="{{ route('brands.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.cat_name') }}</label>
                                <select class="form-select mb-3" id="category" aria-label="Default select example" name="category_id">
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}" @if ($cate->id == $brand->category->id) selected @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.sub_cat') }}</label>
                                <select class="form-select mb-3" id="type" aria-label="Default select example" name="type_id">
                                    {{-- @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if ($type->id == $brand->type->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.brand') }}</label>
                                <input type="text" id="categoryname-field" class="form-control" name="name"  value="{{ $brand->name }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.photo')}} (270x274) ( {{ __('main.optional') }})</label>
                                <input type="file" id="photo-field" class="form-control" name="photo" placeholder="Choose photo"/>
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

@section('script')
    <script>
        let category = document.getElementById('category');
        let type = document.getElementById('type');
        let url = '{{ route('products.api') }}';
        let csrf = '{{ csrf_token() }}';

        category.onchange = cateChange = () => {
            fetch(url, {
                method : 'POST',
                headers :   {'Content-Type':'application/json'},
                body    :   JSON.stringify({
                    _token  :   csrf,
                    type : 'cate',
                    id   :   category.value,
                })
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data.brands);
                type.innerHTML = "";
                data.types.forEach(e => {
                    // console.log(element.name);
                    const newOption = document.createElement("option");
                    newOption.value = e.id;
                    newOption.text = e.name;
                    type.appendChild(newOption);
                });
            }).catch((err) => console.log(err));
        }

        window.onload = (e) => {
            cateChange();
        }
    </script>
@endsection

