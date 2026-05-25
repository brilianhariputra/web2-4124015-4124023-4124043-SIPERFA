<h1>Profil Mahasiswa</h1>

<p>Nama : {{ $profil['nama'] }}</p>
<p>NIM : {{ $profil['nim'] }}</p>
<p>Prodi : {{ $profil['prodi'] }}</p>
<p>Semester : {{ $profil['semester'] }}</p>

<h3>Keahlian</h3>

<ul>
@foreach ($profil['keahlian'] as $k)
<li>{{ $k }}</li>
@endforeach
</ul>