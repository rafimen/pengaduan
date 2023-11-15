<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="BS/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.app')
@section('content')

<br>

<div class="container">
<form action={{url("/update/$pengaduan->id_pengaduan")}} method="POST">
  @method("POST")
  @csrf
<div>
  <label for="exampleFormControlTextarea1" class="form-label">laporan</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="laporan"></textarea>
  </div>

  <button  class="btn btn-primary" type="submit">laporkan</button>

  </form>
  </div>
</div>
</div>

@endsection
</body>
</html>