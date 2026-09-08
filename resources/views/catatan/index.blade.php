@extends('layouts.app')

@section('title', 'Catatan Evolusi')

@section('content')
    <h1>Catatan Evolusi</h1>

    <p><a href="{{ route('catatan.create') }}">+ Tambah catatan</a></p>

    @forelse ($catatan as $item)
        <article style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #ddd;">
            <h2>{{ $item->judul }}</h2>
            <p><em>{{ $item->tanggal->format('d M Y') }}</em></p>
            <p>{{ $item->deskripsi }}</p>

            <form method="POST" action="{{ route('catatan.destroy', $item) }}"
                  onsubmit="return confirm('Hapus catatan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </article>
    @empty
        <p>Belum ada catatan.</p>
    @endforelse
@endsection
