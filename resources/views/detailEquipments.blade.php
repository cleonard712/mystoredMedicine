@if ($id==1)
<img src="{{ asset('img/stetoskop.png') }}" class="card-img-top" alt="..." style="width: 100%; height:30%" >
<div class="card-body">
  <h1 class="card-title" style="text-align: center">Stethoscope</h1>
  <div style="margin: 40px;">
    <a href="/catalog/med_equip"><button><---Back</button></a>
  </div>
</div>
@else
<img src="{{ asset('img/termometer.jpeg') }}" class="card-img-top" alt="..."  style="width: 100%; height: 100px; " >
<div class="card-body">
  <h5 class="card-title" style="text-align: center">Termometer</h5>
  <div style="margin: 40px;">
    <a href="/catalog/med_equip"><button><---Back</button></a>
  </div>
</div>
@endif