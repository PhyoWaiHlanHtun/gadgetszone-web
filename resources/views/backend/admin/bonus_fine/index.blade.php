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
                    <h4 class="mb-sm-0"> {{ __('sidebar.bonus_fine_list')}} </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('account-setting.home') }}</a></li>
                            <li class="breadcrumb-item active"> {{ __('sidebar.bonus_fine_list')}} </li>
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
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('sidebar.bonus_fine_list')}} </h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>{{ __('main.no') }}</th>
                                    <th>{{ __('main.username') }}</th>
                                    <th>{{ __('main.email') }}</th>
                                    <th>{{ __('main.phone') }}</th>
                                    <th>{{ __('main.ref_code') }}</th>
                                    <th>{{ __('main.agent') }}</th>
                                    <th>{{ __('main.level') }}</th>
                                    <th>{{ __('main.capital') }}</th>
                                    <th>{{ __('main.click_com') }}</th>
                                    <th>{{ __('main.level_com') }}</th>
                                    <th>{{ __('main.investment') }}</th>
                                    <th>{{ __('main.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $key => $dt )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $dt->username }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->phone }}</td>
                                    <td>{{ $dt->referral->code }}</td>
                                    <td>{{ $dt->agent ? $dt->agent->username : '-' }}</td>
                                    <td>{{ $dt->referral->level->name }}</td>                                    

                                    <td>{{ $dt->getAmountFormat($dt->amount?->capital) }}</td>
                                    <td>{{ $dt->getAmountFormat($dt->amount?->click_commission) }}</td>
                                    <td>{{ $dt->getAmountFormat($dt->amount?->level_commission) }}</td>
                                    <td>{{ $dt->getAmountFormat($dt->amount?->investment) }}</td>                                    
                                    <td>
                                        <a href='javascript:void(0)' class='btn btn-success btn-sm ml-3 my-2 formBtn' data-id={{ $dt->id }} data-status="1"> {{ __('main.bonus')}} </a>
                                        <a href='javascript:void(0)' class='btn btn-danger btn-sm ml-3 my-2 formBtn' data-id={{ $dt->id }} data-status="2"> {{ __('main.fine')}} </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>

        <!-- Form Modal -->
        <div class="modal fade zoomIn" id="formModal" tabindex="-1" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('backend.bonus-fine.form') }}" method="POST" id="bonusFineForm" name="bonusFineForm" class="form-horizontal">
                            @csrf

                            <input type="hidden" name="user_id" id="user_id">                   
                            <input type="hidden" name="status" id="status">                   
          
                            <div class="form-group">                                
                                <div class="col-sm-12">
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">--Select Type --</option>
                                        <option value="1">Click Commission </option>
                                        <option value="2">Level Commission  </option>
                                        <option value="3">Capital </option>
                                        <option value="4">Investment </option>
                                    </select>
                                </div>
                            </div>
            
                            <div class="form-group my-3">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                                </div>
                            </div>
            
                            <div class="col-sm-offset-2 col-sm-10 mt-3">
                                <button type="submit" class="btn btn-primary"> Submit
                                </button>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->

    </div>
    <!-- container-fluid -->
</div>

@endsection

@section('script')
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            scrollX : true
        });
        
        
    });

    $('.formBtn').click(function () {
        // console.log('h');
        let user_id = $(this).data('id');
        let status = $(this).data('status');
        let title = (status == 1 ) ? 'Bonus' : 'Fine';
        
        $('#formModal #user_id').val(user_id);
        $('#formModal #status').val(status);
        $('#modelHeading').html(title);
        $('#formModal').modal('show');
    });
</script>
@endsection
