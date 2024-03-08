@extends('adminlte::page')

@section('title', __('bulletinitems.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('bulletinitems.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('bulletinitems.title') }}</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bulletinitems.create') }}">{{ __('tables.new') }}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('bulletinitems.table')

@endsection
