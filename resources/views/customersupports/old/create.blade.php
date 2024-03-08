@extends('adminlte::page')

@section('title', __('customersupports.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('customersupports.header') }}</h1>
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

<form action="{{ route('customersupports.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div name="catagory_group" id="catagory_group" class="form-group">
                <strong>{{ __('customersupports.project') }} : </strong>
                <select id="proj_id" name="proj_id" >
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.qrcode_type') }} :</strong>
                <select id="qrcode_type" name="qrcode_type" onchange="changeInput(this)">
                    <option value="text" selected>{{ __('customersupports.type_text') }}</option>
                    <option value="image" >{{ __('customersupports.type_image') }}</option>
                    <option value="null" >{{ __('customersupports.type_null') }}</option>
                </select>
            </div>
        </div>
        <div id="div-image" class="col-xs-12 col-sm-12 col-md-12" style="display:none" >
            <div class="form-group">
                <div id="div-url-name"><strong>{{ __('customersupports.qrcode_content') }} : </strong></div>
                <div id="div-image-file">
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
                    var changeInput = function(select) {
                       if (select.value == 'image') {
                           document.getElementById('div-text').style.display='none';
                           document.getElementById('div-image').style.display='';
                       } else {
                           document.getElementById('div-text').style.display='';
                           document.getElementById('div-image').style.display='none';
                       }
                    };
            </script>
        </div>
        <div id="div-text" class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.qrcode_content') }} :</strong>
                <input type="text" name="qrcode_content" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.message') }} :</strong>
                <input type="text" name="message" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.rcapp_label') }} :</strong>
                <input type="text" name="rcapp_label" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.rcapp') }} :</strong>
                <input type="text" name="rcapp" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.rcapp_url') }} :</strong>
                <input type="text" name="rcapp_url" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('customersupports.status') }} :</strong>
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
