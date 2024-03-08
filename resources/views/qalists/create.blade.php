<form name="vform" action="{{ route('qalists.store') }}" method="POST">
    @csrf
     <x-adminlte-modal id="newQAList" title="{{ __('tables.new').__('qalists.table_name') }}" theme="teal" size="lg"
        icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div name="catagory_group" id="catagory_group" class="form-group">
                <strong>{{ __('qalists.catagory') }} : </strong>
                <select id="catagory_id" name="catagory_id" >
                    @foreach($qacatagories as $qacatagory)
                       <option value="{{ $qacatagory->id }}">{{ $qacatagory->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.question') }} :</strong>
                <input type="text" name="question" class="form-control" placeholder="Question">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.type') }} :</strong>
                <select id="type" name="type" onchange="changeInput(this)">
                    <option value="i_video" disabled>{{ __('qalists.i_video') }}</option>
                    <option value="e_video">{{ __('qalists.e_video') }}</option>
                    <option value="youtube" >{{ __('qalists.youtube_id') }}</option>
                </select>
                    <script>
                      var changeInput = function(select) {
                          if (select.value == 'i_video') {
                              document.getElementById('div-url').style.display='none';
                              document.getElementById('div-upload').style.display='';
                          } else {
                              document.getElementById('div-url').style.display='';
                              document.getElementById('div-upload').style.display='none';
                          }
                      };
                    </script>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="progress">
                <div class="bar"></div>
                <div class="percent">0%</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('qalists.answer') }} :</strong>
            </div>
            <div id="div-upload">
                <input type="file" id="file" name="file" >
            </div>
            <div id="div-url">
                <input type="text" name="answer" class="form-control">
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
     </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newQAList" class="bg-teal" />
