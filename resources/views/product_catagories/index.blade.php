@extends('adminlte::page')

@section('title', __('product_catagories.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('product_catagories.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('product_catagories.title') }}</h1>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
         @include('product_catagories.treeview')
    </div>
    @include('product_catagories.table')

@endsection
