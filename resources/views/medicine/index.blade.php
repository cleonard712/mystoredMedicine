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

<div class="container">
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
        @foreach ($listdata as $medicine) 
      <tr>
        <td>{{ $medicine->generic_name }}</td>
        <td>{{ $medicine->form }}</td>
        <td>{{ $medicine->restriction_formula }}</td>
        <td>{{ $medicine->price }}</td>
        <td>{{ $medicine->description }}</td>
        <td>{{ $medicine->faskes_TK1 }}</td>
        <td>{{ $medicine->faskes_TK2 }}</td>
        <td>{{ $medicine->faskes_TK3 }}</td>
        <td>{{ $medicine->category_id }}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
