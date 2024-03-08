@extends('adminlte::page')

@section('title', __('voicesettings.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('voicesettings.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('tables.edit') }}</h1>
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

    <form name="vform" action="{{ route('voicesettings.update',$voicesetting->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('voicesettings.project') }} :</strong>
                    <select id="proj_id" name="proj_id">
                        @foreach($projects as $project)
                           <option value="{{ $project->id }}" {{ ($project->id == $voicesetting->proj_id) ? "selected" : null }} >{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('voicesettings.keywords') }} :</strong>
                    <input type="text" name="keywords" value="{{ $voicesetting->keywords }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('voicesettings.label') }} :</strong>
                    <input type="text" name="label" value="{{ $voicesetting->label }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('voicesettings.package') }} :</strong>
                    <input type="text" name="package" value="{{ $voicesetting->package }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('voicesettings.status') }} :</strong>
                    <input type="radio" name="status" value="1" {{ ($voicesetting->status==1) ? "checked":null }} >{{ __('tables.status_on') }}
                    <input type="radio" name="status" value="0" {{ ($voicesetting->status!=1) ? "checked":null }} >{{ __('tables.status_off') }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
            </div>
        </div>
    </form>
@endsection
