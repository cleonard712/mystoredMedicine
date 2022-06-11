<form method="POST" action="{{ url('obat/'.$data->id) }}">
    <div class="modal-header">
      <button type="button" class="close" 
        data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Edit Medicine</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method("put")
        <div class="form-group">
          <label for="name">Generic Name</label>
          <input type="text" class="form-control" id="eGeneric_name" name="generic_name" placeholder="Enter Text" value="{{ $data->generic_name }}">
        </div>
        <div class="form-group">
          <label for="form">Form</label>
          <textarea type="text" class="form-control" id="eForm" name="form">{{ $data->form }}</textarea>
        </div>
        <div class="form-group">
            <label for="restriction_formula">Restriction Formula</label>
            <input type="text" class="form-control" id="eRestriction_formula" name="restriction_formula" value="{{ $data->restriction_formula }}">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="ePrice" name="price" value="{{ $data->price }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="eDescription" name="description" value="{{ $data->description }}">
          </div>
          <div class="form-group">
            <label for="faskes1">Faskes 1</label>
            <input type="text" class="form-control" id="eFaskes1" name="faskes1" value="{{ $data->faskes1 }}">
          </div>
          <div class="form-group">
            <label for="faskes2">Faskes 2</label>
            <input type="text" class="form-control" id="eFaskes2" name="faskes2" value="{{ $data->faskes2 }}">
          </div>
          <div class="form-group">
            <label for="faskes3">Faskes 3</label>
            <input type="text" class="form-control" id="eFaskes3" name="faskes3" value="{{ $data->faskes3 }}">
          </div>
          <select class="form-select" aria-label="Default select example" id="ecategory_id" name="category_id">
            <option selected>Open this select menu</option>
            @foreach ($listdata as $d)
            <option {{ $d->name == $data->category->name ? 'selected':'' }} value="{{ $d->id }}">{{ $d->name }}</option>     
            @endforeach
           
          </select>
    </div>
    <div class="modal-footer">
      <button id="btnSubmit" type="button" data-dismiss="modal" onclick="saveDataUpdateTD({{ $data->id }})" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </form>  