@extends('adminlte::page')

@section('title', __('logos.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('logos.header') }}</h1>
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
                <strong>{{ __('logos.project') }} :</strong>
                {{ ($logo->project != null) ? $logo->project->name : __('logos.project_all') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logos.name') }} :</strong>
                {{ $logo->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logos.description') }} :</strong><br>
                {{ $logo->description }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logos.image') }} :</strong>
                <img src="{{ $logo->image }}">
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logos.link_url') }} :</strong>
                {{ $logo->link_url }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $logo->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logos.status') }} :</strong>
                {{ ($logo->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
     </div>
@endsection
