<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CATALOG</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>.card{display: inline-block;  margin: 100px}</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
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
      </nav>

      <h1 style="text-align: center; margin-top:40px;">{{ $title }}</h1>
      <a href="/catalog/medicines">
        <div class="card" style="width: 18rem; ">
          <img src="{{ asset('img/medicines.png') }}" class="card-img-top" alt="..." style="width: 100%; height: 100px;" >
          <div class="card-body">
            <h5 class="card-title" style="text-align: center">Medicines</h5>
          </div>
        </div>
      </a>
      <a href="/catalog/med_equip">
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('img/medical.jpg') }}" class="card-img-top" alt="..."  style="width: 100%; height: 100px; " >
          <div class="card-body">
            <h5 class="card-title" style="text-align: center">Medical Equipment</h5>
          </div>
        </div>
      </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>