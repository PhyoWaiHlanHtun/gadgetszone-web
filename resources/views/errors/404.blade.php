@extends('frontend.layouts.master')

@section('content')

<div class="section-404 section" data-bg-image="{{ asset('assets/images/404/bg-404.webp') }}">
    <div class="container">
        <div class="content-404">
            <h1 class="title">Oops!</h1>
            <h2 class="sub-title">Page not found!</h2>            
            <div class="buttons">                
                <a class="btn btn-dark btn-outline-hover-dark" href="/">Homepage</a>
            </div>
        </div>
    </div>
</div>

@endsection