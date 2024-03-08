@extends('adminlte::page')

@section('title', __('businesses.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('businesses.header') }}</h1>
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
                <strong>{{ __('businesses.project') }} :</strong>
                {{ $business->project->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('businesses.serial') }} :</strong>
                {{ $business->serial+1 }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('businesses.logo') }} :</strong>
                <img src="{{ $business->logo_url }}">
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('businesses.link_url') }} :</strong>
                {{ $business->link_url }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $business->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('businesses.status') }} :</strong>
                {{ ($business->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
     </div>
@endsection
