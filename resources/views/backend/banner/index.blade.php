@extends('backend.layouts.master')

@section('css')
    <!-- Sweet Alert css-->
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/vendors/image-uploader/image-uploader.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">


         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('home.banner_list') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('home.banners') }}</li>
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
                                            <th class="sort" data-sort="image">{{ __('main.photo') }}</th>
                                            <th class="sort" data-sort="title">{{ __('main.title') }}</th>
                                            <th class="sort" data-sort="action">{{ __('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($banners as $key => $item)
                                            <tr>
                                                <td class="photo">
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            @if( $item->image)
                                                            <img class="image avatar-xl img-thumbnail" alt="" src="{{ asset('storage/images/banner/'.$item->image) }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="name">{{ $item->title }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('banner.edit',$item->id) }}">
                                                                {{ __('main.edit') }}
                                                            </a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $item->id }}" data-type="banner" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                {{ __('main.delete') }}
                                                            </a>
                                                        </div>
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
                                {{ $banners->links() }}
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
                            {{ __('home.banner_add') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"><div class="mb-3">
                                <label for="categoryname-field" class="form-label">{{ __('main.title') }}</label>
                                <input type="text" id="categoryname-field" class="form-control" name="title"  required />
                            </div>
                            <div class="mb-3">
                                <label for="photo-field" class="form-label"> {{ __('main.photo')}} ( 242 x 591 ) {{ __('main.transparent')}} </label>
                                <input type="file" id="photo-field" class="form-control" name="image" placeholder="Choose image (243x591)" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal"> {{ __('main.close') }}</button>
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
<script src="{{ asset('backend/vendors/image-uploader/image-uploader.min.js') }}"></script>

<script>
    $(".input-images").imageUploader({
        maxSize: 2 * 1024 * 1024,
        maxFiles: 1
    });
    document.getElementById("showCreateModal") && (
        document.getElementById("showCreateModal").addEventListener("show.bs.modal", (e) => {
            e.relatedTarget.classList.contains("add-btn") ? (
                // (document.getElementById("exampleModalCreate").innerHTML = "Add Category"),
                (document.getElementById("showCreateModal").querySelector(".modal-footer").style.display = "block"),
                (document.getElementById("edit-btn").style.display = "none"),
                (document.getElementById("add-btn").style.display = "block")
                )
            : (
                (document.getElementById("exampleModalCreate").innerHTML = "List Category"),
                (document.getElementById("showModal").querySelector(".modal-footer").style.display = "none")
                );
        })
    );


</script>

@endsection

