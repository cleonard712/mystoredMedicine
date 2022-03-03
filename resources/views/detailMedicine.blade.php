@if ($id==1)
<img src="{{ asset('img/konidin.jpeg') }}" class="card-img-top" alt="..." style="width: 100%; height:50%" >
<div class="card-body">
  <h1 class="card-title" style="text-align: center">Konidin</h1>
  <div style="margin: 40px;">
    <a href="/catalog/medicines"><button><---Back</button></a>
  </div>
</div>
@elseif($id==2)
<img src="{{ asset('img/mixagrip.jpeg') }}" class="card-img-top" alt="..."  style="width: 100%; height: 50%; " >
<div class="card-body">
  <h1 class="card-title" style="text-align: center">Mixagrip</h1>
  <div style="margin: 40px;">
    <a href="/catalog/medicines"><button><---Back</button></a>
  </div>
</div>
@else
<img src="{{ asset('img/paracetamol.jpeg') }}" class="card-img-top" alt="..."  style="width: 100%; height: 50%; " >
<div class="card-body">
  <h5 class="card-title" style="text-align: center">Paracetamol</h5>
  <div style="margin: 40px;">
    <a href="/catalog/medicines"><button><---Back</button></a>
  </div>
</div>
@endif