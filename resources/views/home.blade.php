@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row col-12">
      <x-adminlte-card title="Notice" theme="dark" icon="fas fa-lg fa-fan">
        Joylife backend release for Tai Language.
      </x-adminlte-card>
    </div>
@stop
