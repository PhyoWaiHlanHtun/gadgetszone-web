@extends('backend.layouts.master')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> {{ __('account-setting.agent_fix') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">
                                {{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('account-setting.agent_fix') }} </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> 
                            {{ __('account-setting.agent_fix_form') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="/agent-fix/{{ $data->id }}" method="post" id="agent-fix">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="username" class="form-label">{{ __('account-setting.username') }}
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}" readonly>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="agent" class="form-label">{{ __('account-setting.agent') }}
                                        @error('agent_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">                                    
                                    <select id="select-agent" placeholder="--Select Agent--" name="agent_id">
                                        <option value="">Select Agent<option>
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> {{ __('main.submit')}} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
  </script>

@endsection
