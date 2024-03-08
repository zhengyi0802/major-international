@extends('adminlte::page')

@section('title', __('bulletins.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('bulletins.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('bulletins.title') }}</h1>
            </div>
            <div class="pull-right">
                @include('bulletins.create')
            </div>
        </div>
    </div>

    <div class="row md-12">
      @include('bulletins.table')
    </div>
@endsection
