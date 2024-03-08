    <div class="row col-12">
      <div class="card-group col-md-12">
        <x-adminlte-card title="{{ __('qalists.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="primary" icon-theme="white" fgroup-class="col-md-6" >
          <ul id="tree1">
            @foreach($qacatagories as $qacatagory)
              <li>
                 <a href="{{ route('qacatagories.edit', $qacatagory->id) }}">{{ $qacatagory->name }}</a>
                 @if(count($qacatagory->childs()))
                   @include('qalists.manageChild', ['childs' => $qacatagory->childs()])
                 @endif
              </li>
            @endforeach
          </ul>
        </x-adminlte-card>
        <x-adminlte-card title="{{ __('tables.new').__('qalists.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="teal" icon-theme="white" fgroup-class="col-md-6" >
          @include('qalists.create')
        </x-adminlte-card>
      </div>
    </div>
<link href="/css/treeview.css" rel="stylesheet">
<script src="/js/treeview.js"></script>
