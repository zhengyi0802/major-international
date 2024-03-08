@extends('adminlte::page')

@section('title', __('qacatagories.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('qacatagories.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('qacatagories.title') }}</h1>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row col-12">
        @include('qacatagories.treeview')
    </div>

    @include('qacatagories.table')

@endsection
