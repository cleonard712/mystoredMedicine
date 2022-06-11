<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Medicine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@extends('layout.conquer2')
@section('content')
<div class="container">
  <h2>List Medicines</h2>
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
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Price</th>
        <th>Description</th>
        <th>Faskes TK 1</th>
        <th>Faskes TK 2</th>
        <th>Faskes TK 3</th>
        <th>Logo</th>
        <th>Category ID</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($listdata as $medicine) 
      <tr id="tr_{{ $medicine->id }}">
        <td class="editable" id="td_generic_name_{{ $medicine->id }}">{{ $medicine->generic_name }}</td>
        <td class="editable" id="td_form_{{ $medicine->id }}">{{ $medicine->form }}</td>
        <td id="td_restriction_formula_{{ $medicine->id }}">{{ $medicine->restriction_formula }}</td>
        <td id="td_price_{{ $medicine->id }}">{{ $medicine->price }}</td>
        <td id="td_description_{{ $medicine->id }}">{{ $medicine->description }}</td>
        <td id="td_faskes1_{{ $medicine->id }}">{{ $medicine->faskes1 }}</td>
        <td id="td_faskes2_{{ $medicine->id }}">{{ $medicine->faskes2 }}</td>
        <td id="td_faskes3_{{ $medicine->id }}">{{ $medicine->faskes3 }}</td>
        <td id="td_logo_{{ $medicine->id }}"><img src="{{ asset('img/'.$medicine->logo) }}" alt=""></td>
        <td id="td_category_id_{{ $medicine->id }}">{{ $medicine->category_id }}</td>
        <td>
          <a class='btn btn-info' href="{{route('showModel',$medicine->id)}}"
             data-target="#show{{$medicine->id}}" data-toggle='modal'>detail</a>        
          <div class="modal fade" id="show{{$medicine->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
             <div class="modal-content">
               <!-- put animated gif here -->
             </div>
            </div>
          </div>
          <a href="{{ url('obat/'.$medicine->id.'/edit') }}"
            class="btn btn-xs btn-info">Edit</a>
            <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{ $medicine->id }})">+ Edit A</a>
            <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm2({{ $medicine->id }})">+ Edit B</a>
          <form method="Post" action="{{ url('obat/'.$medicine->id) }}">
          @csrf
          @method('delete')
          <br>
          <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record ?')) return false;"/>
          </form>
          <a class="btn btn-danger btn-xs" onclick="if(confirm('are you sure to delete this record ?')) deleteDataRemoveTR({{ $medicine->id }})">Delete 2</a>
          </td>

      </tr>
        @endforeach
    </tbody>
  </table>
  <div class="page-toolbar">
    <a href="{{ url('obat/create') }}" class="btn btn-info" type="button">+ Medicine Baru</a>
    <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ Medicine Baru (Modal)</a>
</div>
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
      <form method="POST" action="{{ url('obat') }}">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Medicine</h4>
      </div>
      <div class="modal-body">
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
          <br>
      </div>
      <div class="modal-footer">
        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          url:'{{ route("medicine.getEditForm") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id},
          success: function(data){
            $('#modalContent').html(data.msg)
          }
        });
      }
      function getEditForm2(id){
        $.ajax({
          type:'POST',
          url:'{{ route("medicine.getEditForm2") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id},
          success: function(data){
            $('#modalContent').html(data.msg)
          }
        });
      }
      function saveDataUpdateTD(id){
        var eGenericName = $('#eGeneric_Name').val();
        var eForm = $('#eForm').val();
        var eRestrictionFormula = $('#eRestriction_formula').val(); 
        var ePrice = $('#ePrice').val();
        var eDescription = $('#eDescription').val();
        var eFaskes1 = $('#eFaskes1').val();
        var eFaskes2 = $('#eFaskes2').val();
        var eFaskes3 = $('#eFaskes3').val();
        var eCategory_id = $('#eCategory_id').val();
        $.ajax({
          type:'POST',
          url:'{{ route("supplier.saveData") }}',
          data:{'_token':'<?php echo csrf_token()?>','id':id,'generic_name':eGenericName,'form':eForm,'restriction_formula':eRestrictionFormula,
          'price':ePrice,'description':eDescription,'category_id':eCategory_id,'faskes1':eFaskes1,'faskes2':eFaskes2,'faskes3':eFaskes3},
          success: function(data){
            if(data.status =='ok'){
              alert(data.msg)
              $('#td_generic_name_'+id).html(eGenericName);
              $('#td_form_'+id).html(eForm);
              $('#td_restriction_formula_'+id).html(eRestrictionFormula);
              $('#td_price_'+id).html(ePrice);
              $('#td_description_'+id).html(eDescription);
              $('#td_faskes1_'+id).html(eFaskes1);
              $('#td_faskes2_'+id).html(eFaskes2);
              $('#td_faskes3_'+id).html(eFaskes3);
              $('#td_category_id_'+id).html(eCategory_id);
            }
          }
        });
      }
      function deleteDataRemoveTR(id){
        $.ajax({
          type:'POST',
          url:'{{ route("medicine.deleteData") }}',
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
@section('initialscript')
    <script>
            $('.editable').editable({
        closeOnEnter :true,
        callback:function(data){
          if(data.content){
            alert(data.content)
            var s_id = data.$el[0].id
            console.log(s_id);
            var fname = s_id.split('_')[1]
            var flast = s_id.split('_')[2]
            var id = s_id.split('_')[3]
      
      $.ajax({
        type:"POST",
        url:'{{ route("medicine.saveDataField") }}',
        data:{'_token':'<?php echo csrf_token()?>',
        'id':id,
        'generic_name':fname+'_'+flast,
        'value':data.content
      },
      success:function(data){
        alert(data.msg)
      } 
      });
          }
        }
      });


    </script>
@endsection

</body>
</html>
