@extends('adminlte::page')

@section('title', __('qalists.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('qalists.header') }}</h1>
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
                <strong>{{ __('qalists.catagory') }} :</strong>
                {{ $qalist->catagory->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.question') }} :</strong>
                {{ $qalist->question }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.type') }} :</strong>
                @if ($qalist->type == "i_video")
                    {{ __('qalists.i_video') }}
                @elseif ($qalist->type == "e_video")
                    {{ __('qalists.e_video') }}
                @else
                    {{ __('qalists.youtube_id') }}
                @endif
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.answer') }} :</strong>
                <a href="{{ $qalist->answer }}">{{ $qalist->answer }}</a>
            </div>
            @if ($qalist->type != 'youtube')
            <div class="form-group">
                <video width="640" height="360" controls >
                    <source src="{{ $qalist->answer }}" type="video/mp4" >
                </video>
            </div>
            @endif
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('tables.creator') }} :</strong>
                {{ $qalist->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.status') }} :</strong>
                {{ ($qalist->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
     </div>
@endsection
