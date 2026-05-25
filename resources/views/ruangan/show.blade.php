<!DOCTYPE html>
<html>
<head>
<title>Detail Ruangan</title>
</head>
<body>

<h1>Detail Ruangan</h1>

<p>Nama Ruangan : {{ $ruangan[$id]['nama'] }}</p>
<p>Fasilitas : {{ $ruangan[$id]['fasilitas'] }}</p>

<a href="/booking/{{ $id }}">Booking Ruangan</a>
<br><br>
<a href="/ruangan">Kembali</a>

</body>
</html>