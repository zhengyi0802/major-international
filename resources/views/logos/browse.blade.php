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

@section('browse')
    <div class="row col-12">
      @foreach ($logos->chunk(4) as $row)
      <div class="card-group">
        @foreach ($row as $logo)
          <x-adminlte-card title="{!! $logo->project->name !!}" theme="purple" body-class="bg-black"
            icon="fas fa-lg fa-bell" >
            <img src="{!! $logo->image !!}" width="240px">
            <form name="logo-delete-form" action="{{ route('logos.destroy', $logo->id); }}" method="POST">
            @csrf
            @method('DELETE')
              @if ($logo->created_by != 2)
              <x-adminlte-button theme="primary" title="{{ __('tables.edit') }}" icon="fa fa-lg fa-fw fa-pen"
                onClick="window.location='{{ route('logos.edit', $logo->id); }}'" >
              </x-adminlte-button>
              <x-adminlte-button theme="danger" title="{{ __('tables.delete') }}" icon="fa fa-lg fa-fw fa-trash"
                type="submit" >
              </x-adminlte-button>
              @endif
              <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
                onClick="window.location='{{ route('logos.show', $logo->id); }}'" >
              </x-adminlte-button>
            </form>
          </x-adminlte-card>
        @endforeach
      </div>
      @endforeach
    </div>
    {!! $logos->links(); !!}
@stop

@section('content')

    <div class="row col-12">
      @yield('messages')
    </div>

    <div class="row col-12">
        <div class="card">
            <div class="pull-right">
              <x-adminlte-button label="{{ __('tables.lists') }}"
                onclick="javascript:window.location='{{ route('logos.index'); }}'" />
            </div>
        </div>
    </div>

    @include('logos.create')

    <div class="row col-12" id="div-table">
      @yield('browse')
    </div>
@stop
