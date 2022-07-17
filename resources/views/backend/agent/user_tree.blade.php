@extends('backend.layouts.master')

@section('css')
<style>

.tree, .tree ul, .tree li {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
}

.tree {
    margin: 0 0 1em;
    text-align: center;
}
.tree, .tree ul {
    display: table;
}
.tree ul {
  width: 100%;
}
.tree li {
    display: table-cell;
    padding: .5em 0;
    vertical-align: top;
}
        
.tree li:before {
    outline: solid 1px #666;
    content: "";
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}
.tree li:first-child:before {left: 50%;}
.tree li:last-child:before {right: 50%;}

.tree code, .tree span {
    border: solid .1em #666;
    border-radius: .2em;
    display: inline-block;
    margin: 0 .2em .5em;
    padding: .5em;
    position: relative;
    padding-bottom : 0;
}
.tree code p{
  margin-bottom : 0.5em;
  color : #4090e3;
  font-size: 1.15em;
}
/* If the tree represents DOM structure */
.tree code {
    font-family: monaco, Consolas, 'Lucida Console', monospace;
    min-width : 100px;
}

/* | */
.tree ul:before,
.tree code:before,
.tree span:before {
    outline: solid 1px #666;
    content: "";
    height: .5em;
    left: 50%;
    position: absolute;
}
.tree ul:before {
    top: -.5em;
}
.tree code:before,
.tree span:before {
    top: -.55em;
}

/* The root node doesn't connect upwards */
.tree > li {margin-top: 0;}

.tree > li:before,
.tree > li:after,
.tree > li > code:before,
.tree > li > span:before {
  outline: none;
}
</style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('main.user_tree') }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('dashboard.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('main.user_tree') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @include('backend.partials.alert')
                <div class="card h-100">
                    <figure class="card-body" style="overflow-x:scroll;"> 
                        <div class="d-flex justify-content-between mt-3 mb-5">
                            <h4 class=""> Agent Name - {{ $agent }} </h4>
                            @if($levelA)                 
                                <a href="#" class="btn btn-danger" id='delete-customer-tree' data-route="{{ route('backend.customer-tree.delete', $levelA->id) }}" data-bs-toggle="modal" data-bs-target="#deleteCustomerTree">
                                     {{ __('main.delete') }} {{ __('main.user_tree') }} </a>                                            
                            @endif         
                        </div>

                        <div id="customer-tree">
                            @include('backend.agent.customer_tree.trees')
                        </div>
                    </figure>                    
                </div>                
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">    
                        <div class="table-responsive mt-3 mb-1">                                
                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Referral Code</th>
                                        <th>Level</th>
                                        <th>Register Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $userLists as $key => $user )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->referral->code }}</td>
                                        <td>{{ $user->referral->level->name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{!! $user->status_format !!}</td>
                                        <td> 
                                            <a href='/backend/user/{{ $user->id }}' class='btn btn-info btn-sm mb-1'>{{ __('main.view') }}</a>

                                            <a href='/backend/user/{{ $user->id }}/edit' class='btn btn-primary btn-sm mb-1'>{{ __('main.edit') }}</a>
                                            
                                            <a href='#' class='btn {{$user->status == 1 ? "btn-warning" : "btn-success" }} btn-sm mb-1' id='activate-btn' data-id="{{ $user->id }}" data-type="user" data-status ='{{ $user->status }}' data-bs-toggle="modal" data-bs-target="#activeModal">
                                                @if ( Lang::locale() == "ch")
                                                    <?= $user->status == 1 ? "停用" : "启用"; ?>
                                                @else
                                                    <?=
                                                        $user->status == 1 ? "Deactivate" : "Activate"; ?>
                                                @endif
                                            </a>

                                            <a href='#' class='btn btn-danger btn-sm ml-3 mb-1' id='delete-btn' data-id="{{ $user->id }}" data-type="user" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                {{ __('main.delete') }}
                                            </a>

                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>

<!-- Delete Modal -->
<div class="modal fade zoomIn" id="deleteCustomerTree" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/gsqxdxog.json"
                        trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548"
                        style="width:100px;height:100px"
                    >
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-1 mx-sm-3">
                        @if( config('app.locale') == 'ch')
                        <h4 class="text-muted mx-3 mb-0" id="text"> 您确定要删除此客户树吗</h4>
                        @else
                        <h4 class="text-muted mx-3 mb-0" id="text"> Are you Sure You want to Remove this Customer Tree ? </h4>
                        @endif
                    </div>
                </div>

                <form action="#" id="modal_del_tree" method="post">
                    @csrf
                    @method('delete')

                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">{{ __('main.yes-delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

@include('backend.partials.modal')

@endsection

@section('script')

<!-- prismjs plugin -->
<script src="{{ asset('backend/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('backend/libs/list.js/list.min.js') }}"></script>
<script src="{{ asset('backend/libs/list.pagination.js/list.pagination.min.js') }}"></script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            scrollX : true
        });
    } );
</script>

@endsection