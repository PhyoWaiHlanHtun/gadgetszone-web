@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">


         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('sidebar.user_identity') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('sidebar.user_identity') }}</li>
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
                            
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>ID Name</th>
                                    <th>ID Number</th>
                                    <th>ID Card Front</th>
                                    <th>ID Card Back</th>
                                    <th>Photo with ID Card</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $key => $dt )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $dt->user->username }}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->number }}</td>
                                    <td><img src="{{ asset(getImage($dt->front)) }}" alt="ID Card Front" class="img-fluid"></td>
                                    <td><img src="{{ asset(getImage($dt->back)) }}" alt="ID Card Back" class="img-fluid"></td>
                                    <td><img src="{{ asset(getImage($dt->selfie)) }}" alt="ID Card Holding Photo" class="img-fluid"></td>
                                    <td>
                                        <a href='#' class='btn btn-success btn-sm ml-3 my-2' id='identity-btn' data-id="{{ $dt->id }}" data-status="1" data-type="identity" data-bs-toggle="modal" data-bs-target="#identityModal"> Accept </a>
                                
                                        <a href='#' class='btn btn-danger btn-sm ml-3 my-2' id='identity-btn' data-id="{{ $dt->id }}" data-status="2" data-type="identity" data-bs-toggle="modal" data-bs-target="#identityModal"> Reject </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                                                    
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
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            scrollX : true
        });
    } );
</script>
@endsection

