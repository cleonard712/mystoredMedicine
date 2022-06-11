@extends('layout.conquer2')
@section('content')
<h1>Create Medicine</h1>

<form enctype="multipart/form-data" role="form" method="POST" action="{{ url('obat') }}">
    @csrf
    <div class="form-group">
      <label for="name">Generic Name</label>
      <input type="text" class="form-control" id="generic_name" name="generic_name" placeholder="Enter Text">
    </div>
    <div class="form-group">
      <label for="form">Form</label>
      <textarea type="text" class="form-control" id="form" name="form"></textarea>
    </div>
    <div class="form-group">
        <label for="restriction_formula">Restriction Formula</label>
        <input type="text" class="form-control" id="restriction_formula" name="restriction_formula">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description">
      </div>
      <div class="form-group">
        <label for="faskes1">Faskes 1</label>
        <input type="text" class="form-control" id="faskes1" name="faskes1">
      </div>
      <div class="form-group">
        <label for="faskes2">Faskes 2</label>
        <input type="text" class="form-control" id="faskes2" name="faskes2">
      </div>
      <div class="form-group">
        <label for="faskes3">Faskes 3</label>
        <input type="text" class="form-control" id="faskes3" name="faskes3">
      </div>
      <select class="form-select" aria-label="Default select example" name="category_id">
        <option selected>Open this select menu</option>
        @foreach ($data as $d)
        <option value="{{ $d->id }}">{{ $d->name }}</option>     
        @endforeach
       
      </select>
      <div class="form-group">
        <label>Logo</label>
        <input type="file" class="form-control" id="logo" name="logo">
      </div>
    <br>
    <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
    <button id="btnCancel" type="submit" class="btn btn-outline-primary">Cancel</button>
  </form>    
@endsection