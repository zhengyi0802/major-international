    <div class="row col-12">
      <div class="card-group col-md-12">
        <x-adminlte-card title="{{ __('product_catagories.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="primary" icon-theme="white" fgroup-class="col-md-6" >
          <ul id="tree1">
            @foreach($productCatagories as $productCatagory)
              <li>
                 <a href="{{ route('product_catagories.edit', $productCatagory->id) }}">{{ $productCatagory->name }}</a>
                 @if(count($productCatagory->childs()))
                   @include('product_types.manageChild', ['childs' => $productCatagory->childs()])
                 @endif
              </li>
            @endforeach
          </ul>
        </x-adminlte-card>
        <x-adminlte-card title="{{ __('tables.new').__('product_catagories.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="teal" icon-theme="white" fgroup-class="col-md-6" >
            @include('product_types.create')
        </x-adminlte-card>
      </div>
    </div>
<link href="/css/treeview.css" rel="stylesheet">
<script src="/js/treeview.js"></script>
