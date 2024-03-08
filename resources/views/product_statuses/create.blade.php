<form action="{{ route('product_statuses.store') }}" method="POST">
    @csrf
    <x-adminlte-modal id="newProductStatus" title="{{ __('tables.new').__('product_statuses.table_name') }}" theme="teal" size="lg"
        icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('product_statuses.name') }} : </strong>
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('product_statuses.detail') }} : </strong>
                <textarea class="form-control" style="height:150px" name="detail" ></textarea>
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
            <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
</form>
<x-adminlte-button label="{{ __('tables.new') }}" data-toggle="modal" data-target="#newProductStatus" class="bg-teal" />
