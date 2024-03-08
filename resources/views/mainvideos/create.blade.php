<form action="{{ route('mainvideos.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
     <x-adminlte-modal id="newMainvideo" title="{{ __('tables.new').__('mainvideos.table_name') }}" theme="teal" size="lg"
       icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div name="catagory_group" id="catagory_group" class="form-group">
                <strong>{{ __('mainvideos.project') }} : </strong>
                <select id="proj_id" name="proj_id" >
                    @foreach($projects as $project)
                       <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('mainvideos.type') }} :</strong>
                <select id="type" name="type" >
                     <option value="playlist" selected >{{ __('mainvideos.type_playlist') }}</option>
                     <option value="youtube_playlist" >{{ __('mainvideos.type_youtube_playlist') }}</option>
                     <option value="youtube_playlist_id" >{{ __('mainvideos.type_youtube_playlist_id') }}</option>
                     <option value="stream" >{{ __('mainvideos.type_stream') }}</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('mainvideos.playlist') }} :</strong>
                <textarea class="form-control" style="height:150px" name="playlist"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('mainvideos.description') }} :</strong>
                <textarea class="form-control" style="height:150px" name="description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('mainvideos.play_random') }} :</strong>
                <input type="radio" name="play_random" value="1">{{ __('tables.status_on') }}
                <input type="radio" name="play_random" value="0" checked>{{ __('tables.status_off') }}
            </div>
         </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
     </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newMainvideo" class="bg-teal" />
