<?php

namespace App\Http\Controllers;

use App\Models\CatatanEvolusi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatatanEvolusiController extends Controller
{
    public function index(): View
    {
        $catatan = CatatanEvolusi::orderByDesc('tanggal')->get();

        return view('catatan.index', compact('catatan'));
    }

    public function create(): View
    {
        return view('catatan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
        ]);

        CatatanEvolusi::create($validated);

        return redirect()
            ->route('catatan.index')
            ->with('status', 'Catatan berhasil ditambahkan.');
    }

    public function destroy(CatatanEvolusi $catatan): RedirectResponse
    {
        $catatan->delete();

        return redirect()
            ->route('catatan.index')
            ->with('status', 'Catatan berhasil dihapus.');
    }
}
