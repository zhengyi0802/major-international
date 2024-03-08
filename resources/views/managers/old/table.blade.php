@php
$heads = [
    ['label' =>__('managers.id'), 'width' => 10],
    __('managers.name'),
    __('managers.account'),
    __('managers.role'),
    __('managers.project'),
    __('managers.status'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null, null, null, null, ['orderable' => false]],
    'language' => [ 'url' => __('tables.language_url') ],
];
@endphp
<x-adminlte-datatable id="manager-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($managers as $manager)
    <tr>
      <td>{{ $manager->id }}</td>
      <td>{{ $manager->name }}</td>
      <td>{{ $manager->user->email }}</td>
      <td> @if ($manager->user->role == 'admin')
               {{ __('managers.admin') }}
           @elseif($manager->user->role == 'manager')
               {{ __('managers.manager') }}
           @elseif($manager->user->role == 'operator')
               {{ __('managers.operator') }}
           @endif
      </td>
      <td>{{ ($manager->project) ? $manager->project->name : __('managers.project_all') }}</td>
      <td>{{ ($manager->status==1) ? __('tables.status_on'):__('tables.status_off') }}</td>
      <td><nobr>
          <form name="manager-delete-form" action="{{ route('managers.destroy', $manager->id); }}" method="POST">
            @csrf
            @method('DELETE')
            @if (auth()->user()->role != 'operator')
              <x-adminlte-button theme="primary" title="{{ __('tables.edit') }}" icon="fa fa-lg fa-fw fa-pen"
                onClick="window.location='{{ route('managers.edit', $manager->id); }}'" >
              </x-adminlte-button>
              <x-adminlte-button theme="danger" title="{{ __('tables.delete') }}" icon="fa fa-lg fa-fw fa-trash"
                type="submit" onclick="return confirm('{{ __('tables.confirm_delete') }}');">
              </x-adminlte-button>
             @endif
              <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
                onClick="window.location='{{ route('managers.show', $manager->id); }}'" >
              </x-adminlte-button>
            </form>
      </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

