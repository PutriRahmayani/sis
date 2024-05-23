{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Prestasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .table-bordered {
      border: 2px solid #DAA520;
    }

    .table-bordered td,
    .table-bordered th {
      border: 2px solid #DAA520;
    }

    .logo-container {
      position: absolute;
      top: 5px;
      left: 80px;
    }

    .logo-container img {
      width: 100px;
      height: 100px;
    }

    .container {
      background-repeat: repeat;
      background-position: center;
      background-size: cover;
      opacity: 1;
      position: relative;
      padding-top: 30px; /* Adjust this value to move the text up */
    }

    .text-center {
      text-align: center;
      margin-top: -10px; /* Adjust this value to move the text up */
    }

    h3 {
      margin-top: -20px; /* Adjust this value to move the text up */
    }
  </style>
</head>

<body>
  <div class="logo-container">
    <img src="{{ asset('logo_smait.png') }}" alt="Logo">
  </div>
  <div class="container">
    <h3 align='center'>Data Prestasi</h3>
    <div class="text-center">
      <h6 style="margin-bottom: 5px;">SMA IT IQRA' KOTA BENGKULU</h6>
      <p>Jalan Merawan 21 Sawah Lebar, Ratu Agung, Kota Bengkulu</p>
    </div>
    <hr>
    <table class="table table-bordered" align="center" rules="all" style="width: 95%" border="1px">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Lomba</th>
          <th scope="col">Penyelenggara</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($cetak as $prestasi)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $prestasi->nama }}</td>
            <td>{{ $prestasi->tanggal }}</td>
            <td>{{ $prestasi->lomba }}</td>
            <td>{{ $prestasi->penyelenggara }}</td>
            <td>{{ $prestasi->tingkat }}</td>
            <td>{{ $prestasi->keterangan }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
 --}}

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Prestasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .table-bordered td,
    .table-bordered th {
      border: 2px solid #070707;
    }

    .table-bordered th {
      background-color: #DAA520;
      color: black;
    }

    .logo-container {
      position: absolute;
      top: 3px;
      left: 50px;
    }

    .logo-container img {
      width: 100px;
      height: 100px;
    }

    .container {
      background-repeat: repeat;
      background-position: center;
      background-size: cover;
      opacity: 1;
      position: relative;
      padding-top: 30px;
    }

    .text-center {
      text-align: center;
      margin-top: -10px;
    }

    h3 {
      margin-top: -20px;
    }
  </style>
</head>

<body>
  <div class="logo-container">
    <img src="{{ asset('logo_smait.png') }}" alt="Logo">
  </div>
  <div class="container">
    <h3 align='center'>Data Prestasi</h3>
    <div class="text-center">
      <h5 style="margin-bottom: 5px;">SMA IT IQRA' KOTA BENGKULU</h5>
      <h6>JL. Merawan 21, Sawah Lebar, Ratu Agung, Kota Bengkulu</h6>
    </div>
    <hr>
    <table class="table table-bordered" align="center" rules="all" style="width: 95%" border="2px">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Lomba</th>
          <th scope="col">Penyelenggara</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($cetak as $prestasi)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $prestasi->nama }}</td>
            <td>{{ $prestasi->tanggal }}</td>
            <td>{{ $prestasi->lomba }}</td>
            <td>{{ $prestasi->penyelenggara }}</td>
            <td>{{ $prestasi->tingkat }}</td>
            <td>{{ $prestasi->keterangan }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
