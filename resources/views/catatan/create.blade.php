@extends('layouts.app')

@section('title', 'Tambah Catatan Evolusi')

@section('content')
    <h1>Tambah Catatan Evolusi</h1>

    <form method="POST" action="{{ route('catatan.store') }}">
        @csrf

        <div>
            <label for="judul">Judul</label><br>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
        </div>

        <div>
            <label for="tanggal">Tanggal</label><br>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
        </div>

        <div>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
        </div>

        @error('judul') <p style="color:red;">{{ $message }}</p> @enderror
        @error('tanggal') <p style="color:red;">{{ $message }}</p> @enderror
        @error('deskripsi') <p style="color:red;">{{ $message }}</p> @enderror

        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ route('catatan.index') }}">&larr; Kembali</a></p>
@endsection
