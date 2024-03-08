@extends('adminlte::page')

@section('title', __('appmanagers.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('appmanagers.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @include('appmanagers.create')
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('appmanagers.table')

@endsection
