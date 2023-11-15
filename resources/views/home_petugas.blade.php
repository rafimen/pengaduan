<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="BS/css/bootstrap.min.css">
</head>
<body>
@include('layouts.navbar_petugas')
<br>
 
      <div class="container">
      <h3 style="text-align: center;">LAPORAN</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">tanggal</th>
            <th scope="col">nik</th>
            <th scope="col">isi laporan</th>
            <th scope="col">bukti foto</th>
            <th scope="col">status</th>
            <th scope="col">opsi</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach($pengaduan as $pengaduan)
          <tr>
          <td>{{$pengaduan->id_pengaduan}}</td>
          <td>{{$pengaduan->tgl_pengaduan}}</td>
          <td>{{$pengaduan->nik}}</td>
          <td>{{$pengaduan->isi_laporan}}</td>
          <td><img src="{{asset("storage/image/". $pengaduan->foto)}}" width="150px"/></td>
          <td>{{$pengaduan->status}}</td>
          <td>
                <a href="detail/{{$pengaduan->id_pengaduan}}" class="btn btn-outline-danger">detail</a>
                <a href="hapus/{{$pengaduan->id_pengaduan}}" class="btn btn-outline-danger">hapus</a>
        </td>
          <form action=""></form>
        </tr>
        @endforeach
        </tbody>
      </table>
   
    </div>

</body>
</html>