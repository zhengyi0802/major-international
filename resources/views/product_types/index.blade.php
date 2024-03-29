@extends('adminlte::page')

@section('title', __('product_types.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('product_types.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('product_types.title') }}</h1>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
         @include('product_types.treeview')
    </div>
    @include('product_types.table')

@endsection
