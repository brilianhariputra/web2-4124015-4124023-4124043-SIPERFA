@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

<div class="grid grid-cols-3 gap-4">
    
    @for ($i = 1; $i <= 6; $i++)
    <div class="bg-white rounded-xl shadow p-4 hover:shadow-xl transition">
        <h2 class="font-bold text-lg">Produk {{ $i }}</h2>
        <p class="text-gray-600">Deskripsi produk</p>

        <a href="#" class="inline-block mt-3 bg-teal-500 text-white px-3 py-1 rounded hover:bg-teal-600">
            Detail
        </a>
    </div>
    @endfor

</div>
@endsection