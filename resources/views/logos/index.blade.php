@extends('adminlte::page')

@section('title', __('logos.page_title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('logos.page_header') }}</h1>
@stop

@section('messages')
      @if ($message = Session::get('insert-success'))
      <x-adminlte-card title="{{ __('logos.success_message') }}" theme="info" icon="fas fa-lg fa-bell" removable>
         {{ __('logos.insert_ok') }}
      </x-adminlte-card>
      @endif
      @if ($message = Session::get('insert-error'))
      <x-adminlte-card title="{{ __('logos.error_message') }}" theme="danger" icon="fas fa-lg fa-bell" removable>
         {{ __('logos.insert_error') }}
      </x-adminlte-card>
      @endif
      @if ($message = Session::get('insert-error1'))
      <x-adminlte-card title="{{ __('logos.error_message') }}" theme="danger" icon="fas fa-lg fa-bell" removable>
         {{ __('logos.insert_error1') }}
      </x-adminlte-card>
      @endif
      @if ($message = Session::get('update-success'))
      <x-adminlte-card title="{{ __('logos.success_message') }}" theme="info" icon="fas fa-lg fa-bell" removable>
         {{ __('logos.update_ok') }}
      </x-adminlte-card>
      @endif
      @if ($message = Session::get('update-error'))
      <x-adminlte-card title="{{ __('logos.error_message') }}" theme="danger" icon="fas fa-lg fa-bell" removable>
         {{ __('logos.update_error') }}
      </x-adminlte-card>
      @endif
@stop

@section('content')

    <div class="row col-12">
      @yield('messages')
    </div>

    <div class="row col-12">
        <div class="card">
            <div class="pull-right">
              <x-adminlte-button label="{{ __('tables.browse') }}"
                onClick="javascript:window.location='{{ route('logos.browse') }}';" />
            </div>
        </div>
    </div>

    @include('logos.create')

    <div class="row col-12" id="div-table">
      @include('logos.table')
    </div>
@stop


