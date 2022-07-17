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
                    <h4 class="mb-sm-0"> {{ $title }} </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('account-setting.home') }}</a></li>
                            <li class="breadcrumb-item active"> {{ $title }} </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                @include('backend.partials.alert')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> {{ $title }} </h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>{{ __('main.no') }}</th>
                                    <th>{{ __('main.username') }}</th>
                                    <th>{{ __('main.email') }}</th>
                                    <th>{{ __('main.phone') }}</th>
                                    <th>{{ __('main.amount') }}</th>
                                    <th>{{ __('main.type') }}</th>
                                    <th>{{ __('main.date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $key => $dt )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $dt->user->username }}</td>
                                    <td>{{ $dt->user->email }}</td>
                                    <td>{{ $dt->user->phone }}</td>
                                    <td>{{ $dt->amount }}</td>
                                    <td>{{ $dt->type_format }}</td>
                                    <td>{{ dateFormat($dt->created_at) }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>        

    </div>
    <!-- container-fluid -->
</div>

@endsection

@section('script')
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            // scrollX : true
        });        
    });
</script>
@endsection
