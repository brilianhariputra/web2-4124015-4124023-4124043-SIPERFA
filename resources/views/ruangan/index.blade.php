<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ruangan</title>
</head>
<body>

<h1>Daftar Ruangan Kampus</h1>

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Nama Ruangan</th>
<th>Fasilitas</th>
<th>Aksi</th>
</tr>

@foreach($ruangan as $r)
<tr>
<td>{{ $r['id'] }}</td>
<td>{{ $r['nama'] }}</td>
<td>{{ $r['fasilitas'] }}</td>
<td>
<a href="/ruangan/{{ $r['id'] }}">Detail</a> |
<a href="/booking/{{ $r['id'] }}">Booking</a>
</td>
</tr>
@endforeach

</table>

</body>
</html>