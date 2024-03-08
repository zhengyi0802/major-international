@extends('adminlte::page')

@section('title', __('bulletinitems.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('bulletinitems.header') }}</h1>
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
                <strong>{{ __('bulletins.ftitle') }} : {{ $bulletin->title }} </strong>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.message') }} : </strong> {{ $bulletin->message }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.date') }} :  {{ $bulletin->date }} </strong>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletinitems.type') }} :</strong>
                @if ($bulletinitem->mime_type == "image")
                     {{ __('bulletinitems.type_image') }}
                @elseif ($bulletinitem->mime_type == "i_video")
                     {{ __('bulletinitems.type_ivideo') }}
                @elseif ($bulletinitem->mime_type == "e_video")
                     {{ __('bulletinitems.type_evideo') }}
                @elseif ($bulletinitem->mime_type == "youtube")
                     {{ __('bulletinitems.type_youtube') }}
                @endif
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletinitems.url') }} : {{ $bulletinitem->url }}</strong>
            </div>
            <div class="form-group">
                @if ($bulletinitem->mime_type == "image")
                    <img src="{{ $bulletinitem->url }}">
                @elseif (($bulletinitem->mime_type == "i_video") || ($bulletinitem->mime_type == "e_video"))
                    <video width="640" height="360" controls >
                        <source src="{{ $bulletinitem->url }}" type="video/mp4" >
                    </video>
                @else
                    <video width="640" height="360" controls >
                        <source src="{{ $bulletinitem->url }}" type="video/mp4" >
                    </video>
                @endif
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletinitems.status') }} :</strong>
                {{ ($bulletinitem->status==1) ? __('tables.status_on'):__('tables.status_off') }}
            </div>
         </div>
     </div>
@endsection
