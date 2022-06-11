@extends('layout.conquer2')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#" onclick="showInfo()">Welcome
        <i class="icon-bulb"></a></i>
      </li>
    </ul>
  </div>
  <div id='showinfo'></div>

  @section('javascript')
  <script>
  function showInfo()
  {
    $.ajax({
      type:'POST',
      url:'{{route("showInfo")}}',
      data:'_token=<?php echo csrf_token() ?>',
      success: function(data){
         $('#showinfo').html(data.msg)
      }
    });
  }
  </script>
  @endsection
  

<h2>Welcome</h2>
<a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
<div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">DISCLAIMER</h4>
          </div>
          <div class="modal-body">
            Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
     </div>
  </div>
@endsection