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
                    <h4 class="mb-sm-0">{{ __('contact.contact') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('contact.contact') }}</li>
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
                        <h4 class="card-title mb-0">{{ __('contact.contact') }}</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
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
                                            <th class="sort" data-sort="date">{{ __('main.date') }}</th>
                                            <th class="sort" data-sort="name">{{ __('main.name') }}</th>
                                            <th class="sort" data-sort="email">{{ __('main.email') }}</th>
                                            <th class="sort" data-sort="subject">{{ __('main.subject') }}</th>
                                            <th class="sort" data-sort="action">{{ __('main.action') }}</th>
                                            </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($contacts as $key => $item)
                                            <tr>
                                                <td class="date">{{ dateFormat($item->created_at) }}</td>
                                                <td class="name">{{ $item->name }}</td>
                                                <td class="email">{{ $item->email }}</td>
                                                <td class="subject">{{ $item->subject }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('contact.show',$item->id) }}">View</a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $item->id }}" data-type="contact" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
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
<script src="{{ asset('backend/js/pages/listjs.init.js') }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>


@endsection

