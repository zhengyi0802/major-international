@extends('adminlte::page')

@section('title', __('elearningcatagories.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('elearningcatagories.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('tables.details') }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group col-md-12">
            @include('layouts.back')
            @if (auth()->user()->rol != 'operator')
            <div class="card col-md-2">
               @include('elearningcatagories.popwindow')
            </div>
            @endif
        </div>
    </div>
    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.project') }} :</strong>
                {{ $elearningcatagory->project->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.parent') }} :</strong>
                {{ $elearningcatagory->parent ? $elearningcatagory->parent : null  }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.type') }} :</strong>
                {{ $elearningcatagory->type }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.name') }} :</strong>
                {{ $elearningcatagory->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.password') }} :</strong>
                {{ $elearningcatagory->password }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.descriptions') }} :</strong>
                {{ $elearningcatagory->description }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.thumbnail') }} :</strong>
                <img src="{{ $elearningcatagory->thumbnail }}">
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $elearningcatagory->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('elearningcatagories.status') }} :</strong>
                {{ ($elearningcatagory->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
     </div>
@endsection
@section('plugins.BootstrapSelect', true)
