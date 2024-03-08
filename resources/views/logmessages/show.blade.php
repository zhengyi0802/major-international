@extends('adminlte::page')

@section('title', __('logmessages.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('logmessages.header') }}</h1>
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
                <strong>{{ __('logmessages.timestamp') }} :</strong>
                {{ $logmessage->timestamp }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.version_code') }} :</strong>
                {{ $logmessage->version_code }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.version_name') }} :</strong>
                {{ $logmessage->version_name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.android') }} :</strong>
                {{ $logmessage->android }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.aid') }} :</strong>
                {{ $logmessage->android_id }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.mac_eth') }} :</strong>
                {{ $logmessage->mac_eth }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.mac_wifi') }} :</strong>
                {{ $logmessage->mac_wifi }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.sn') }} :</strong>
                {{ $logmessage->sn }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.created_at') }} :</strong>
                {{ $logmessage->created_at }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.action') }} :</strong>
                {{ $logmessage->action }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('logmessages.data') }} :</strong>
                {{ $logmessage->data }}
            </div>
         </div>
     </div>
@endsection
