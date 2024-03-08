@extends('adminlte::page')

@section('title', __('bulletins.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('bulletins.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('tables.details') }}</h1>
            </div>
            @include('layouts.back')
        </div>
    </div>

    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.project') }} :</strong>
                {{ $bulletin->project }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.popup') }} :</strong>
                {{ $bulletin->popup ? __('tables.status_on') : __('tables.status_off') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.ftitle') }} :</strong>
                {{ $bulletin->title }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.message') }} :</strong>
                {{ $bulletin->message }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $bulletin->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.status') }} :</strong>
                {{ ($bulletin->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.date') }} :</strong>
                {{ $bulletin->date }}
            </div>
         </div>
     </div>
@endsection
