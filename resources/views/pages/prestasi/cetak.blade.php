<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Prestasi</title>
</head>
<body>
    <div class="form-group">
        <p align="center">
            <b>Data Prestasi</b>
        </p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Prestasi</th>
                <th>Penyelenggara</th>
                <th>Tingkat</th>
            </tr>
            @foreach ($cetak as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->prestasi }}</td>
                    <td>{{ $item->penyelenggara }}</td>
                    <td>{{ $item->tingkat }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
