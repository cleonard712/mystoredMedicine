
@extends('layout.conquer2')
@section('content')
<div class="container">
  @if ($data)
  <h2>List Medicines</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Price</th>
        <th>Description</th>
        <th>Faskes TK 1</th>
        <th>Faskes TK 2</th>
        <th>Faskes TK 3</th>
        <th>Category ID</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $data->generic_name }} </td>
        <td>{{ $data->form }}</td>
        <td>{{ $data->restriction_formula }}</td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->description }}</td>
        <td>{{ $data->faskes_TK1 }}</td>
        <td>{{ $data->faskes_TK2 }}</td>
        <td>{{ $data->faskes_TK3 }}</td>
        <td>{{ $data->category->name }}</td>
      </tr>
    </tbody>
  </table>
  @else
  <h2>Tidak ada data</h2>
  @endif          
  
</div>
@endsection

