<form action="{{ route('product_types.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('product_types.catagory') }} :</strong>
                <select name="catagory_id" class="form-control">
                   @foreach($productCatagories as $productCatagory)
                        <option value="{{ $productCatagory->id }}">{{ $productCatagory->name }}</option>
                   @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('product_types.name') }} :</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('product_types.description') }} :</strong>
                <textarea class="form-control" style="height:150px" name="descriptions" placeholder="Descriptions"></textarea>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
         </div>
     </div>
</form>
