@extends('layout.conquer2')
@section('content')
<h1>Create Supplier</h1>

<form method="POST" action="{{ url('suppliers') }}">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Text">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea type="text" class="form-control" id="address" name="address"></textarea>
    </div>
    <br>
    <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
    <button id="btnCancel" type="submit" class="btn btn-outline-primary">Cancel</button>
  </form>    
@endsection
