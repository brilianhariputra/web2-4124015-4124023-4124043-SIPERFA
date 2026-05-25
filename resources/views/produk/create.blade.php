@extends('layouts.app')
@section('title','Tambah Produk')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
  <h1 class="text-2xl font-bold mb-6">Tambah Produk</h1>
  <form method="POST" action="{{ route('produk.store') }}" class="bg-white rounded-xl shadow-md p-8 space-y-6">
    @csrf
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
      <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
      @error('nama')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-lg">Simpan Produk</button>
  </form>
</div>
@endsection
