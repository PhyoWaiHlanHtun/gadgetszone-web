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
                    <h4 class="mb-sm-0">{{ __('about.about') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">
                                {{ __('main.home') }}
                            </a></li>
                            <li class="breadcrumb-item active">{{ __('about.about') }}</li>
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
                                        <a href="{{ route('about.create') }}"><button type="button" class="btn btn-success add-btn" id="create-btn"><i class="ri-add-line align-bottom me-1"></i> {{ __('main.add') }}</button></a>
                                        {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button> --}}
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
                                            <th class="sort" data-sort="title">{{ __('main.title') }}</th>
                                            <th class="sort" data-sort="action">{{ __('main.action') }}</th>
                                            </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($abouts as $key => $item)
                                            <tr>

                                                <td class="name">{{ $item->title }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('about.show',$item->id) }}">View</a>
                                                        </div>
                                                        <div class="edit">
                                                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('about.edit',$item->id) }}">Edit</a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $item->id }}" data-type="about" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
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
                                {{-- <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div> --}}
                                {{ $abouts->links() }}
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        {{-- <div class="modal fade" id="showCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalCreate"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3" id="modal-id" style="display: none;">
                                <label for="id-field" class="form-label">ID</label>
                                <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                            </div>

                            <div class="mb-3">
                                <label for="categoryname-field" class="form-label">Title</label>
                                <input type="text" id="categoryname-field" class="form-control" name="title" placeholder="Enter Banner title" required />
                            </div>
                            <div class="mb-3">
                                <div class="snow-editor" style="height: 300px;">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="images"> Image <br> ( Maximum upload image is 1 )
                                        @error('images')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </label>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-images" id="images"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="photo-field" class="form-label">Put Image with size(242x591) and transparent background</label>
                                <input type="file" id="photo-field" class="form-control" name="image" placeholder="Choose image (243x591)" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

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

@endsection

