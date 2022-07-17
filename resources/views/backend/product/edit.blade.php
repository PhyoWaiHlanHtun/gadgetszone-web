@extends('backend.layouts.master')


@section('content')
<div class="page-content">
    <div class="container-fluid">


         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('product.product_edit')}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('product.product') }}</a></li>
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
                        <h5 class="modal-title" id="exampleModalCreate">{{ __('product.product_edit')}}</h5>
                    </div>
                    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.cat_name') }}</label>
                                <select class="form-select mb-3" id="category" aria-label="Default select example" name="category_id">
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}" @if ($cate->id == $product->category?->id) selected @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.sub_cat_name') }}</label>
                                <select class="form-select mb-3" id="type" aria-label="Default select example" name="type_id">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if ($type->id == $product->type?->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.brand_name') }}</label>
                                <select class="form-select mb-3" id="brand" aria-label="Default select example" name="brand_id">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" @if ($brand->id == $product->brand?->id) selected @endif>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.product_name') }}</label>
                                <input type="text" id="categoryname-field" class="form-control" name="name" value="{{ $product->name }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('main.price') }}</label>
                                <input type="number" id="categoryname-field" class="form-control" name="price" value="{{ $product->price }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('main.desc') }}</label>
                                <textarea id="categoryname-field" class="form-control" name="description"  rows="3" required >{!! $product->description !!}
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.images') }}</label>
                                <input type="file" id="photo-field" class="form-control" name="images[]" multiple />
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

@section('script')

<script>
    let category = document.getElementById('category');
    let type = document.getElementById('type');
    let brand = document.getElementById('brand');
    let url = '{{ route('products.api') }}';
    let csrf = '{{ csrf_token() }}';

    category.onchange = cateChange = () => {
        fetch(url, {
            method : 'POST',
            headers :   {'Content-Type':'application/json'},
            body    :   JSON.stringify({
                _token  :   csrf,
                type : 'type',
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

            brand.innerHTML = "";
            data.brands.forEach(e =>{
                // console.log(element.name);
                const newOption = document.createElement("option");
                newOption.value = e.id;
                newOption.text = e.name;
                brand.appendChild(newOption);
            });
        }).catch((err) => console.log(err));
    }

    type.onchange = typeChange = () => {
        // console.log(type.value);
        fetch(url, {
            method : 'POST',
            headers :   {'Content-Type':'application/json'},
            body    :   JSON.stringify({
                _token  :   csrf,
                type : 'brand',
                id   :   type.value,
                cate : category.value,
            })
        })
        .then(response => response.json())
        .then(data => {
            brand.innerHTML = "";
            data.brands.forEach(e =>{
                // console.log(element.name);
                const newOption = document.createElement("option");
                newOption.value = e.id;
                newOption.text = e.name;
                brand.appendChild(newOption);
            });
        })
        .catch((err) => console.log(err));
    }

    window.onload = (e) => {
        cateChange();
        typeChange();
    }
</script>

@endsection
