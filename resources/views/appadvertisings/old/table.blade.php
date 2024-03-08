@php
$heads = [
    ['label' =>__('appadvertisings.id'), 'width' => 10],
    __('appadvertisings.project'),
    __('appadvertisings.interval'),
    __('appadvertisings.thumbnail'),
    __('tables.creator'),
    __('appadvertisings.status'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 20],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null, null, null, null, ['orderable' => false]],
    'language' => [ 'url' => __('tables.language_url') ],
];
@endphp
<x-adminlte-datatable id="appadvertisings-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
        @foreach ($appadvertisings as $appadvertising)
        <tr>
            <td>{{ $appadvertising->id }}</td>
            <td>{{ ($appadvertising->project) ? $appadvertising->project->name : null }}</td>
            <td>{{ $appadvertising->interval }}</td>
            <td><img src="{{ $appadvertising->thumbnail }}" width="320px" height="180px"></td>
            <td>{{ $appadvertising->user->name }}</td>
            <td>{{ ($appadvertising->status==1) ? __('tables.status_on'):__('tables.status_off') }}</td>
            <td>
                <form action="{{ route('appadvertisings.destroy', $appadvertising->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('appadvertisings.show', $appadvertising->id) }}">{{ __('tables.details') }}</a>
                    <a class="btn btn-primary" href="{{ route('appadvertisings.edit', $appadvertising->id) }}">{{ __('tables.edit') }}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('tables.confirm_delete') }}');">{{ __('tables.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

