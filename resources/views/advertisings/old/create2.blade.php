@extends('adminlte::page')

@section('title', __('advertisings.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('advertisings.header') }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>{{ __('tables.new') }}</h1>
        </div>
        @include('layouts.back')
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('advertisings.store2', [ 'advertising' => $advertising, 'project' => $project]) }}" method="POST" enctype="multipart/form-data" >
     @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="proj_id" name="proj_id" value="$project->id" >
                <strong>{{ __('advertisings.project') }} : {{ $project->name }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('advertisings.index') }} :</strong>
                <input type="number" name="index" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div id="div-url-name"><strong>{{ __('advertisings.thumbnail') }} : </strong></div>
                <div id="div-image">
                    <input type="file" id="image" name="image" accept="image/*" onchange="loadImage(event)" >
                </div>
                <div id="div-preview">
                    <img name="preview" id="preview" >
                </div>
            </div>
            <script>
                    var loadImage = function(event) {
                        var output = document.getElementById('preview');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                           URL.revokeObjectURL(output.src) // free memory
                        }
                    };
            </script>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('advertisings.link_url') }} :</strong>
                <input type="text" name="link_url" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('advertisings.link_image') }} :</strong>
                <input type="radio" name="link_image" value="1" checked>{{ __('tables.status_on') }}
                <input type="radio" name="link_image" value="0">{{ __('tables.status_off') }}
            </div>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('advertisings.status') }} :</strong>
                <input type="radio" name="status" value="1" checked>{{ __('tables.status_on') }}
                <input type="radio" name="status" value="0">{{ __('tables.status_off') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
         </div>
     </div>
</form>
@endsection
