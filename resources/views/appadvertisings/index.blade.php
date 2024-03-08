@extends('adminlte::page')

@section('title', __('appadvertisings.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('appadvertisings.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('appadvertisings.title') }}</h1>
            </div>
            <div class="pull-right">
                @include('appadvertisings.create')
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('appadvertisings.table')

@endsection
