  <title>Medicine</title>

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
        @section('customCss')
        <style>
          .card{display: inline-block;  margin: 50px;background-color: magenta}
          </style>
        @endsection
        @section('content')
      <div class="row">

        {{ $value = old('kategori')}}
      <form  method="get" class="text-center">
        <input type="text" class="kategori text-center" name="kategori" placeholder="category from 1-12" >
        <button type="submit">Search</button>
      </form>
      <a href="/obat"><button>Reset</button></a>
      <?php
      $category_id = (isset($_GET['kategori']))? $_GET['kategori']:'';
      ?>
      @foreach ($listdata as $list)
      @if ($list->category_id == $category_id)
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            {{-- <img src="{{ asset('img/'.$list->url) }}" class="card-img-top" alt="..." style="width: 100%; height: 100px;" > --}}
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">{{ $list->generic_name }}</h5>
              <h5 class="card-title" style="text-align: center">{{ $list->form }}</h5>
              <h5 class="card-title" style="text-align: center">{{ $list->restriction_formula }}</h5>
              <h5 class="card-title" style="text-align: center">{{ $list->price }}</h5>
              {{-- <h5 class="card-title" style="text-align: center">Category: {{ $list->name }}</h5>   --}}
            </div>
          </div>    
    </div>  
    @elseif($category_id=='')
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
          {{-- <img src="{{ asset('img/'.$list->url) }}" class="card-img-top" alt="..." style="width: 100%; height: 100px;" > --}}
          <div class="card-body">
            <h5 class="card-title" style="text-align: center">{{ $list->generic_name }}</h5>
            <h5 class="card-title" style="text-align: center">{{ $list->form }}</h5>
            <h5 class="card-title" style="text-align: center">{{ $list->restriction_formula }}</h5>
            <h5 class="card-title" style="text-align: center">{{ $list->price }}</h5> 
            {{-- <h5 class="card-title" style="text-align: center">Category: {{ $list->name }}</h5>   --}}
          </div>
        </div>    
  </div>  
      @endif
      @endforeach
    </div>
    <div style="margin: 40px;">
      <a href="/catalog"><button><---Back</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection

