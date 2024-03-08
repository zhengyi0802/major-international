<form name="vform" action="{{ route('voicesettings.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
     <x-adminlte-modal id="newVoicesetting" title="{{ __('tables.new').__('voicesettings.table_name') }}" theme="teal" size="lg"
       icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('voicesettings.project') }} : </strong>
                <select id="proj_id" name="proj_id" >
                    <option value="0" style="background-color: blue" disabled>{{ __('projects.project_none') }}</option>
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('voicesettings.keywords') }} :</strong>
                <input type="text" name="keywords" class="form-control" placeholder="Keywords">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('voicesettings.package_from') }} :</strong>
                <input type="radio" name="from" value="1" checked>{{ __('voicesettings.internal_package') }}
                <input type="radio" name="from" value="0">{{ __('voicesettings.external_package') }}
            </div>
        </div>
        <script>
            var rad=document.vform.from;
            for (var i=0; i<rad.length; i++) {
                 rad[i].addEventListener('change', function() {
                     //alert('check box = ' + this.value);
                     if (this.value == 1) {
                         document.getElementById('div-upload').style.display='';
                         document.getElementById('div-label').style.display='none';
                         document.getElementById('div-package').style.display='none';
                         document.getElementById('div-link').style.display='none';
                     } else {
                         document.getElementById('div-upload').style.display='none';
                         document.getElementById('div-label').style.display='';
                         document.getElementById('div-package').style.display='';
                         document.getElementById('div-link').style.display='';
                     }
                 });
            }
        </script>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="div-upload" >
                <strong>{{ __('voicesettings.upload_apk') }} :</strong>
                <input type="file" name="app_file" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="div-label" style="display:none" >
                <strong>{{ __('voicesettings.label') }} :</strong>
                <input type="text" name="label" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="div-package" style="display:none" >
                <strong>{{ __('voicesettings.package') }} :</strong>
                <input type="text" name="package" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="div-link" style="display:none" >
                <strong>{{ __('voicesettings.link_url') }} :</strong>
                <input type="text" name="link_url" class="form-control">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="progress">
                <div class="bar"></div>
                <div class="percent">0%</div>
            </div>
         </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
     </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newVoicesetting" class="bg-teal" />
