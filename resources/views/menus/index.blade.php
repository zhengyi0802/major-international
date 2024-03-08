@extends('adminlte::page')

@section('title', __('menus.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('menus.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('menus.title') }}</h1>
            </div>
            <div class="pull-right">
                @include('menus.create')
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('menus.table')

@endsection
