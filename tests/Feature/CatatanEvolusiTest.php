<?php

namespace Tests\Feature;

use App\Models\CatatanEvolusi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatatanEvolusiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_menampilkan_catatan(): void
    {
        CatatanEvolusi::create([
            'judul' => 'Rilis awal',
            'deskripsi' => 'Setup proyek Laravel pertama kali.',
            'tanggal' => '2026-01-01',
        ]);

        $response = $this->get(route('catatan.index'));

        $response->assertStatus(200);
        $response->assertSee('Rilis awal');
    }

    public function test_bisa_menambah_catatan_baru(): void
    {
        $response = $this->post(route('catatan.store'), [
            'judul' => 'Tambah fitur CRUD',
            'deskripsi' => 'Menambahkan fitur catatan evolusi.',
            'tanggal' => '2026-02-01',
        ]);

        $response->assertRedirect(route('catatan.index'));
        $this->assertDatabaseHas('catatan_evolusi', [
            'judul' => 'Tambah fitur CRUD',
        ]);
    }

    public function test_validasi_gagal_jika_judul_kosong(): void
    {
        $response = $this->post(route('catatan.store'), [
            'judul' => '',
            'deskripsi' => 'Deskripsi tanpa judul.',
            'tanggal' => '2026-02-01',
        ]);

        $response->assertSessionHasErrors('judul');
    }

    public function test_bisa_menghapus_catatan(): void
    {
        $catatan = CatatanEvolusi::create([
            'judul' => 'Catatan lama',
            'deskripsi' => 'Akan dihapus.',
            'tanggal' => '2026-01-15',
        ]);

        $response = $this->delete(route('catatan.destroy', $catatan));

        $response->assertRedirect(route('catatan.index'));
        $this->assertDatabaseMissing('catatan_evolusi', [
            'id' => $catatan->id,
        ]);
    }
}
