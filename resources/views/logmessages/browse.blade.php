@extends('adminlte::page')

@section('title', __('logmessages.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('logmessages.header') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('logmessages.title') }}</h1>
            </div>
            <div class="pull-right">
                <!-- <a class="btn btn-success" href="{{ route('logmessages.create') }}">{{ __('tables.new') }}</a> -->
                <h4>{{ __('logmessages.mac_eth') }} : {{ $mac }}</h4>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>{{ __('logmessages.id') }}</th>
            <th>{{ __('logmessages.version_name') }}</th>
            <th>{{ __('logmessages.action') }}</th>
            <th>{{ __('logmessages.data') }}</th>
            <th>{{ __('logmessages.created_at') }}</th>
            <th width="100px">{{ __('tables.action') }}</th>
        </tr>
        @foreach ($logmessages as $logmessage)
        <tr>
            <td>{{ $logmessage->id }}</td>
            <td>{{ $logmessage->version_name }}</td>
            <td>{{ $logmessage->action }}</td>
            <td>{{ $logmessage->data }}</td>
            <td>{{ $logmessage->created_at }}</td>
            <td>
            <a class="btn btn-info" href="{{ route('logmessages.show',$logmessage->id) }}">{{ __('tables.details') }}</a>
            </td>
        </tr>
        @endforeach

    </table>
    {!! $logmessages->links() !!}
@endsection
