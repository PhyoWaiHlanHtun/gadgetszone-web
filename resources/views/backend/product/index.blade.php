@extends('backend.layouts.master')

@section('css')
    <!-- Sweet Alert css-->
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('product.product_list')}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('product.product') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('backend.layouts.msg')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ __('main.add,edit,remove') }}</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showCreateModal"><i class="ri-add-line align-bottom me-1"></i> {{ __('main.add') }}</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="name">{{ __('product.cat_name') }} </th>
                                            <th class="sort" data-sort="name">{{ __('product.sub_cat_name') }}</th>
                                            <th class="sort" data-sort="name">{{ __('product.brand_name') }}</th>
                                            <th class="sort" data-sort="name">{{ __('product.product_name') }}</th>
                                            <th class="sort" data-sort="name">{{ __('main.price') }}</th>
                                            <th class="sort" data-sort="action">{{ __('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($products as $key => $cate)
                                            <tr>
                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                <td class="name">{{ $cate->category?->name }}</td>
                                                <td class="name">{{ $cate->type?->name }}</td>
                                                <td class="name">{{ $cate->brand?->name }}</td>
                                                <td class="name">{{ $cate->name }}</td>
                                                <td class="name">{{ $cate->price }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('products.show',$cate->id) }}">
                                                                {{ __('main.view') }}
                                                            </a>
                                                        </div>
                                                        <div class="edit">
                                                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('products.edit',$cate->id) }}">
                                                                {{ __('main.edit') }}
                                                            </a>
                                                        </div>
                                                        {{-- <div class="remove">
                                                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $cate->id }}" data-type="products" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                                        </div> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                {{-- <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div> --}}
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <div class="modal fade" id="showCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalCreate">
                            {{ __('product.product_add') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.cat_name') }}</label>
                                <select class="form-select mb-3" id="category" aria-label="Default select example" name="category_id">
                                    <option selected disabled>{{ __('main.open_select')}}</option>
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.sub_cat_name') }}</label>
                                <select class="form-select mb-3" id="type" aria-label="Default select example" name="type_id">
                                    <option selected disabled>{{ __('main.open_select')}}</option>
                                    {{-- @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.brand_name') }}</label>
                                <select class="form-select mb-3" id="brand" aria-label="Default select example" name="brand_id">
                                    <option selected disabled>{{ __('main.open_select')}}</option>
                                    {{-- @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('product.product_name') }}</label>
                                <input type="text" id="categoryname-field" class="form-control" name="name" required />
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('main.price') }}</label>
                                <input type="number" id="categoryname-field" class="form-control" name="price" required />
                            </div>
                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('main.desc') }}</label>
                                <textarea id="categoryname-field" class="form-control" name="description" rows="3" required ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.images') }} (270x274)</label>
                                <input type="file" id="photo-field" class="form-control" name="images[]" multiple required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    {{ __('main.close') }}
                                </button>
                                <button type="submit" class="btn btn-success" id="add-btn">
                                    {{ __('main.create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('backend.partials.modal')
    </div>
</div>

@endsection

@section('script')

<!-- prismjs plugin -->
<script src="{{ asset('backend/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('backend/libs/list.js/list.min.js') }}"></script>
<script src="{{ asset('backend/libs/list.pagination.js/list.pagination.min.js') }}"></script>

<!-- listjs init -->
{{-- <script src="{{ asset('backend/js/pages/listjs.init.js') }}"></script> --}}

<!-- Sweet Alerts js -->
<script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>

    document.getElementById("showCreateModal") && (
        document.getElementById("showCreateModal").addEventListener("show.bs.modal", (e) => {
            e.relatedTarget.classList.contains("add-btn") ? (
                // (document.getElementById("exampleModalCreate").innerHTML = "Add Product"),
                (document.getElementById("showCreateModal").querySelector(".modal-footer").style.display = "block"),
                // (document.getElementById("edit-btn").style.display = "none"),
                (document.getElementById("add-btn").style.display = "block")
                )
            : (
                (document.getElementById("exampleModalCreate").innerHTML = "List Category"),
                (document.getElementById("showModal").querySelector(".modal-footer").style.display = "none")
                );
        })
    );

    let category = document.getElementById('category');
    let type = document.getElementById('type');
    let brand = document.getElementById('brand');
    let url = '{{ route('products.api') }}';
    let csrf = '{{ csrf_token() }}';

    category.onchange = () => {
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

    type.onchange = () => {
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

</script>

@endsection
