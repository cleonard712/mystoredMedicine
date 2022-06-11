<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicine</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.card{display: inline-block;  margin: 50px;background-color: magenta}
body{background-color: pink;}
</style>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="{{ asset('img/farmasi.png') }}" style="width: 50px" alt="farmasi"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="/">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/catalog">CATALOG</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
      @extends('layout.conquer2')
      @section('content')
      <div class="row">
        @if ($data)
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
              {{-- <img src="{{ asset('img/'.$list->url) }}" class="card-img-top" alt="..." style="width: 100%; height: 100px;" > --}}
              <div class="card-body">
                <h5 class="card-title" style="text-align: center">{{ $data->generic_name }}</h5>
                <h5 class="card-title" style="text-align: center">{{ $data->form }}</h5>
                <h5 class="card-title" style="text-align: center">{{ $data->restriction_formula }}</h5>
                <h5 class="card-title" style="text-align: center">{{ $data->price }}</h5>
                {{-- <h5 class="card-title" style="text-align: center">Category: {{ $data->name }}</h5>   --}}
              </div>
            </div>    
      </div>  
      @else
      <h2>Tidak ada data</h2>
        @endif
      </div>
      <div style="margin: 40px;">
        <a href="/catalog"><button><---Back</button></a>
      </div>
      @endsection
      
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>