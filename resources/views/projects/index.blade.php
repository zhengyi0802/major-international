@extends('adminlte::page')

@section('title', __('projects.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('projects.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @include('projects.create')
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('projects.table')

@endsection
