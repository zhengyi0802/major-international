
    <form name="vform" action="{{ route('appmanagers.store') }}" method="POST" enctype="multipart/form-data" >
         @csrf
         <x-adminlte-modal id="newAppManager" title="{{ __('tables.new').__('appmanagers.table_name') }}" theme="teal" size="lg"
            icon="fas fa-bell" v-centered static-backdrop scrollable>
            <div class="col-xs-12 col-sm-12 col-me-12">
                <div class="form-group">
                   <strong>{{ __('appmanagers.project') }} : </strong>
                   <select id="proj_id" name="proj_id" >
                         <option value="0" selected>{{ __('appmanagers.project_all') }}</option>
                      @foreach ($projects as $project)
                         <option value="{{ $project->id }}" >{{ $project->name }}</option> 
                      @endforeach
                   </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-me-12">
                <div class="form-group">
                   <strong>{{ __('appmanagers.package') }} : </strong>
                   <select id="apk_id" name="apk_id" >
                         <option value="0" selected>--------</option>
                      @foreach ($apkmanagers as $apkmanager)
                         <option value="{{ $apkmanager->id }}" >{{ $apkmanager->label.'('. $apkmanager->package_version_name.')' }}</option> 
                      @endforeach
                   </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmanagers.market_id') }} : </strong>
                    <input type="radio" name="market_id" value="1" >{{ __('appmanagers.market_yes') }}
                    <input type="radio" name="market_id" value="0" checked>{{ __('appmanagers.market_no') }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmanagers.installer_flag') }} : </strong>
                    <input type="radio" name="installer_flag" value="1" >{{ __('appmanagers.flag_on') }}
                    <input type="radio" name="installer_flag" value="0" checked>{{ __('appmanagers.flag_off') }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmanagers.delaytime') }} : </strong>
                    <input type="number" name="delaytime" value="5" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('appmanagers.status') }} : </strong>
                    <input type="radio" name="status" value="1" checked>{{ __('tables.status_on') }}
                    <input type="radio" name="status" value="0" >{{ __('tables.status_off') }}
                </div>
            </div>
            <x-slot name="footerSlot">
                <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
                <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
            </x-slot>
        </x-adminlte-modal>
    </form>
    <x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newAppManager" class="bg-teal" />
