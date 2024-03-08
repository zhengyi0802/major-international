<form action="{{ route('appadvertisings.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
     <x-adminlte-modal id="newAppAdvertising" title="{{ __('tables.new').__('appadvertisings.table_name') }}" theme="teal" size="lg"
       icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('appadvertisings.project') }} : </strong>
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
                <strong>{{ __('appadvertisings.interval') }} :</strong>
                <input type="number" name="interval" class="form-control" value="5" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div id="div-url-name"><strong>{{ __('appadvertisings.thumbnail') }} : </strong></div>
                <div id="div-image">
                    <input type="file" id="image" name="image" accept="image/*" onchange="loadImage(event)" >
                </div>
                <div id="div-preview">
                    <img name="preview" id="preview" >
                </div>
            </div>
            <script>
                    var loadImage = function(event) {
                        var output = document.getElementById('preview');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                           URL.revokeObjectURL(output.src) // free memory
                        }
                    };
            </script>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('appadvertisings.link_url') }} :</strong>
                <input type="text" name="link_url" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('appadvertisings.link_image') }} :</strong>
                <input type="radio" name="link_image" value="1" checked>{{ __('tables.status_on') }}
                <input type="radio" name="link_image" value="0">{{ __('tables.status_off') }}
            </div>
         </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
     </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newAppAdvertising" class="bg-teal" />
