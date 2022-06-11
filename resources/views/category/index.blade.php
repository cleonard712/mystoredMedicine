<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Category</title>
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
  <h2>List Category</h2>
  <div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th></th>
        <th>created_up</th>
        <th>created_at</th>
        <th>List of medicines</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($listdata as $kategory) 
      <tr>
        <td>{{ $kategory->name }}</td>
        <td>{{ $kategory->description }}</td>
        <td>
          <a class="btn btn-default" data-toggle="modal" href="#detail_{{$kategory->id}}"
            data-toggle="modal">{{ $kategory->name }}</a>  
          
          <div class="modal fade" id="detail_{{$kategory->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">{{$kategory->name}}</h4>
                  </div>
                  <div class="modal-body">
                           {{-- <img src="{{ asset('images/').$li->id.'.jpg' }}" height='200px' /> --}}
                           <h2>{{ $kategory->description }}</h2>
                  </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
          </div>
          </td>

          <td>{{ $kategory->created_up }}</td>
          <td>{{ $kategory->updated_at }}</td>
          <td>
          {{-- <td>{{ $kategory->id }} </td>
          <td>{{ $kategory->name }} </td> --}}
          <td>
            @foreach($kategory->medicines as $m)
            {{ $m->generic_name }}{{ $m->price }}  <br>
            @endforeach
            <a class='btn btn-xs btn-info'  data-toggle='modal' data-target='#myModal'
            onclick='showMedicines({{ $kategory->id }})'>
            Detail</a></td>

            @section('javascript')
<script>
function showMedicines(category_id)
{
  $.ajax({
    type:'POST',
    url:'{{route("category.showMedicines")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'category_id':category_id
         },
    success: function(data){
       $('#showMedicines').html(data.msg)
    }
  });
}
</script>
@endsection


          {{-- <ul>
            @foreach ($kategory->medicines as $kmed)
                <li>{{ $kmed->generic_name }}</li>
            @endforeach
          </ul> --}}
        </td>


          <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-wide">
               <div class="modal-content" id="showMedicines">
                 <div class="modal=header">
                   <h4 class="modal-title">Detail Medicine</h4>
                 </div>
                 <div class="modal-body">
                   <a href="/kategori_obat/showMedicines"></a>
                   <h2>halo</h2>
                   <img src="{{ asset('conquer2/img/ajax-model-loading.gif') }}" alt="" class="loading">
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
               </div>
            </div>
          </div>
          
      </tr>
        @endforeach
    </tbody>
  </table>
  <div class="page-toolbar">
    <a href="{{ url('kategori_obat/create') }}" class="btn btn-info" type="button">+ Category Baru</a>
</div>
</div>

@endsection
</body>
</html>
