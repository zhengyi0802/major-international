@extends('adminlte::page')

@section('title', __('menus.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('menus.header') }}</h1>
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

<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('menus.project') }} : </strong>
                <select id="proj_id" name="proj_id" >
                    <option value="0" style="background-color: blue">{{ __('projects.project_none') }}</option>
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('menus.name') }} :</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div id="div-url-name"><strong>{{ __('menus.icon') }} : </strong></div>
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
            <div class="form-group" id = "tag-video">
                <strong>{{ __('menus.tag') }} :</strong>
                <input type="text" name="tag" class="form-control" >
            </div>
            <div class="form-group" id="tag-project" style="display:none;">
                <strong>{{ __('menus.tag') }} :</strong>
                <select id="tag" name="tag" >
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('menus.type') }} :</strong>
                <select name="type" onchange="tagfield(this)">
                    <option value="video" selected>{{ __('menus.type_video') }}</option>
                    <option value="project">{{ __('menus.type_project') }}</option>
                </select>
                <script>
                    var tagfield = function(select) {
                        if (select.value == 'video') {
                            document.getElementById('tag-video').style.display='';
                            document.getElementById('tag-project').style.display='none';
                        } else if (select.value == 'project') {
                            document.getElementById('tag-video').style.display='none';
                            document.getElementById('tag-project').style.display='';
                        }
                    };
                </script>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('menus.status') }} :</strong>
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
