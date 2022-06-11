<form method="POST" action="{{ url('suppliers/'.$data->id) }}">
    <div class="modal-header">
      <button type="button" class="close" 
        data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Edit Supplier</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="eName" name="name" placeholder="Enter Text" value="{{ $data->name }}">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control" id="eAddress" name="address">{{ $data->address }}</textarea>
          </div>
        <br>
    </div>
    <div class="modal-footer">
        <button id="btnSubmit" type="button" data-dismiss="modal" onclick="saveDataUpdateTD({{ $data->id }})" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </form>  