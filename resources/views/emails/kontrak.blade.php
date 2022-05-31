<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Data Kontrak yang sudah habis</h3>
    <table border="1">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>kontrak</th>
        </tr>
        @foreach ($details as $item)
        <tr>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jbtn }}</td>
            <td>{{ $item->mulai_kontrak }}</td>
        </tr>
        @endforeach
        
    </table>
</body>
</html>