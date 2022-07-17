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
                    <h4 class="mb-sm-0">{{ __('home.ads_popup_list') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('home.ads_popup') }}</li>
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

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    @if( count($advertise) == 0 )
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showCreateModal"><i class="ri-add-line align-bottom me-1"></i> {{ __('main.add') }}</button>
                                    </div>
                                    @endif
                                </div>                                
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th> {{ __('main.no') }} </th>
                                            <th class="sort" data-sort="photo">{{ __('main.photo') }}</th>
                                            <th class="sort" data-sort="action">{{ __('main.action') }}</th>
                                            </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse ($advertise as $key => $ad)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td class="photo">
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <img class="image img-thumbnail" alt="" src="{{ asset(getImage($ad->image)) }}" width="150">
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a class="btn btn-sm btn-success edit-item-btn" href="#" id="edit-btn" data-id={{ $ad->id }}>
                                                                {{ __('main.edit') }}
                                                            </a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $ad->id }}" data-type="advertise" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                {{ __('main.delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan='3' class="text-center">No Data Available.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                

                                
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
                            {{ __('home.ads_add')}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="{{ route('advertise.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">                            
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.photo')}} </label>
                                <input type="file" id="photo-field" class="form-control" name="image" placeholder="Choose photo " accept="image/*" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                <button type="submit" class="btn btn-success" id="add-btn">{{ __('main.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="showEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalCreate">
                            {{ __('home.ads_edit')}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">                            
                            <div class="mb-3">
                                <label for="photo-field" class="form-label">{{ __('main.photo')}} </label>
                                <input type="file" id="photo-field" class="form-control" name="image" placeholder="Choose photo " accept="image/*" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                <button type="submit" class="btn btn-success" id="add-btn">{{ __('main.submit') }}</button>
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
                // (document.getElementById("exampleModalCreate").innerHTML = 'Add ads'),
                (document.getElementById("showCreateModal").querySelector(".modal-footer").style.display = "block"),
                (document.getElementById("edit-btn").style.display = "none"),
                (document.getElementById("add-btn").style.display = "block")
                )
            : (
                (document.getElementById("exampleModalCreate").innerHTML = "List ads"),
                (document.getElementById("showModal").querySelector(".modal-footer").style.display = "none")
                );
        })
    );

    $("#edit-btn").click(function(){
        let id = $(this).data('id');
        let route = `/backend/advertise/${id}`;
        $('#showEditModal form').attr('action', route);        
        $("#showEditModal").modal('show');
    })

</script>

@endsection

