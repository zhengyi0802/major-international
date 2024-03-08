<form action="{{ route('bulletins.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
     <x-adminlte-modal id="newBulletin" title="{{ __('tables.new').__('bulletins.table_name') }}" theme="teal" size="lg"
        icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.project') }} :  </strong>
                <select id="proj_id" name="proj_id" >
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.popup') }} :</strong>
                <input type="radio" name="popup" value="1">{{ __('tables.status_on') }}
                <input type="radio" name="popup" value="0" checked>{{ __('tables.status_off') }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.ftitle') }} :</strong>
                <input type="text" name="title" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.message') }} :</strong>
                <input type="text" name="message" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('bulletins.date') }} :</strong>
                <input type="date" name="date" class="form-control" >
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
     </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newBulletin" class="bg-teal" />
