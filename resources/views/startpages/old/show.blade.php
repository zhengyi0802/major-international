@extends('adminlte::page')

@section('title', __('startpages.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('startpages.header') }}</h1>
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
                <strong>{{ __('startpages.name') }} :</strong>
                {{ $startpage->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.project_name') }} :</strong>
                {{ ($startpage->project) ? $startpage->project->name : '--------' }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.mime_type') }} :</strong>
                @if ($startpage->mime_type == 'image')
                  {{ __('startpages.image') }}
                @elseif (($startpage->mime_type == 'i_video') || ($startpage->mime_type == 'e_video'))
                  {{ __('startpages.video') }}
                @else
                  {{ __('startpages.youtube_id') }}
                @endif
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.url') }} : {{ ($startpage->url_http != null) ? $startpage->url_http : $startpage->url }}</strong>
            </div>
            <div class="form-group">
                @if ($startpage->mime_type == 'image')
                    <img src="{{ $startpage->url }}" width="60%" height="60%" >
                @elseif (($startpage->mime_type == 'i_video') || ($startpage->mime_type == 'e_video'))
                    <video width="640" height="360" controls>
                        <source src="{{ $startpage->url }}" type="video/mp4">
                    </video>
                @else
                    {{ __('startpages.youtube_id') }} : {{ $startpage->url }}
                @endif
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $startpage->user->name }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.status') }} :</strong>
                {{ ($startpage->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.start_time') }} :</strong>
                {{ $startpage->start_time }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('startpages.stop_time') }} :</strong>
                {{ $startpage->stop_time }}
            </div>
        </div>
     </div>
@stop
