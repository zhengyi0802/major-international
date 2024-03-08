@extends('adminlte::page')

@section('title', __('videocatagories.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('videocatagories.header') }}</h1>
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

<form action="{{ route('videocatagories.store') }}" method="POST">
     @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('videocatagories.parent') }} :</strong>
                <select name="parent_id">
                    <option value="0" {{ ($catagory->id == 0) ? "selected" : null }}>{{ __('videocatagories.root') }}</option>
                    @foreach($parents as $parent)
                      <option value="{{ $parent->id }}" {{ ($catagory->id == $parent->id) ? "selected" : null }}>{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('videocatagories.name') }} :</strong>
                <input type="text" name="name" class="form-control" value="{{ $catagory->name }}" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('videocatagories.description') }} :</strong>
                <textarea class="form-control" style="height:150px" name="description" >{{ $catagory->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('videocatagories.status') }} :</strong>
                <input type="radio" name="status" value="1" {{ ($catagory->status) ? "checked" : null }}>{{ __('tables.status_on') }}
                <input type="radio" name="status" value="0" {{ (!$catagory->status) ? "checked" : null }}>{{ __('tables.status_off') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
        </div>
    </div>
</form>
@endsection
