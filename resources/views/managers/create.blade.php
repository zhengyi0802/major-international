<form action="{{ route('managers.store') }}" method="POST">
    @csrf
    <x-adminlte-modal id="newManager" title="{{ __('tables.new').__('managers.table_name') }}" theme="teal" size="lg"
      icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-me-12">
            <div class="form-group">
               <strong>{{ __('managers.project') }} : </strong>
               <select id="proj_id" name="proj_id" >
                     <option value="0" style="background-color: blue">{{ __('managers.project_all') }}</option>
                  @foreach ($projects as $project)
                     <option value="{{ $project->id }}" >{{ $project->name }}</option> 
                  @endforeach
               </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.name') }} :</strong>
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.account') }} :</strong>
                <input type="text" name="account" class="form-control" placeholder="user@e-mail.com">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.password') }} :</strong>
                <input type="text" name="password" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.job_title') }} :</strong>
                <input type="text" name="job_title" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.description') }} :</strong>
                <textarea class="form-control" style="height:150px" name="descriptions"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('managers.status') }} :</strong>
                <input type="radio" name="status" value="1" checked>{{ __('tables.status_on') }}
                <input type="radio" name="status" value="0">{{ __('tables.status_off') }}
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newManager" class="bg-teal" />
