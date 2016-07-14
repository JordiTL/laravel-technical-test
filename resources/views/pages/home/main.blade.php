@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('pages.home.slider')
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('pages.home.productlist')
        </div>
    </div>
@endsection
