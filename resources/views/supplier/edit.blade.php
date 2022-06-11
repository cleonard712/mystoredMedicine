@extends('layout.conquer2')
@section('content')
<h1>Edit Supplier</h1>

<form method="POST" action="{{ url('suppliers/'.$data->id) }}">
    @csrf
    @method("put")
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Text" value="{{ $data->name }}">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea type="text" class="form-control" id="address" name="address">{{ $data->address }}</textarea>
    </div>
    <br>
    <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
    <button id="btnCancel" type="submit" class="btn btn-outline-primary">Cancel</button>
  </form>    
@endsection
