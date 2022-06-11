@extends('layout.conquer2')
@section('content')
<div class="container">
  <h2>List Supplier</h2>
  <div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
</div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr id="tr_{{ $d->id }}">
        <td id="td_name_{{ $d->id }}">{{ $d->name }} </td>
        <td id="td_address_{{ $d->id }}">{{ $d->address }}</td>
        <td><a href="{{ url('suppliers/'.$d->id.'/edit') }}"
          class="btn btn-xs btn-info">Edit</a>
          <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{ $d->id }})">+ Edit A</a>
          <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm2({{ $d->id }})">+ Edit B</a>
        @can('delete-permission',$d)
          <form method="Post" action="{{ url('suppliers/'.$d->id) }}">
        @csrf
        @method('delete')
        <br>
        <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record ?')) return false;"/>
        </form>
        @endcan
        <a class="btn btn-danger btn-xs" onclick="if(confirm('are you sure to delete this record ?')) deleteDataRemoveTR({{ $d->id }})">Delete 2</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> 
  <div class="page-toolbar">
    <a href="{{ url('suppliers/create') }}" class="btn btn-info" type="button">+ Supplier Baru</a>
    <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ Supplier Baru (Modal)</a>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
      <form method="POST" action="{{ url('suppliers') }}">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Supplier</h4>
      </div>
      <div class="modal-body">
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

      </div>
      <div class="modal-footer">
          <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </form>  
    </div>
  </div>
</div>

{{-- Edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalContent">

    </div>
  </div>
</div>
</div>
@endsection
@section('javascript')
    <script>
      function getEditForm(id){
        $.ajax({
          type:'POST',
          url:'{{ route("supplier.getEditForm") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id},
          success: function(data){
            $('#modalContent').html(data.msg)
          }
        });
      }
      function getEditForm2(id){
        $.ajax({
          type:'POST',
          url:'{{ route("supplier.getEditForm2") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id},
          success: function(data){
            $('#modalContent').html(data.msg)
          }
        });
      }
      function saveDataUpdateTD(id){
        var eName = $('#eName').val();
        var eAddress = $('#eAddress').val(); 
        $.ajax({
          type:'POST',
          url:'{{ route("supplier.saveData") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id,'name':eName,'address':eAddress},
          success: function(data){
            if(data.status =='ok'){
              alert(data.msg)
              $('#td_name_'+id).html(eName);
              $('#td_address_'+id).html(eAddress);
            }
          }
        });
      }
      function deleteDataRemoveTR(id){
        $.ajax({
          type:'POST',
          url:'{{ route("supplier.deleteData") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id},
          success: function(data){
            if(data.status =="OK"){
              alert(data.msg)
              $('#tr_'+id).remove();
            }
            else{
              alert(data.msg)
            }
          }
        });
      }
    </script>
@endsection
