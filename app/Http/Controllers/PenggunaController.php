<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    // Fungsi untuk menampilkan semua data pengguna
    public function index()
    {
        // Mengambil semua data dari tabel pengguna
        $pengguna = Pengguna::all();
        // Mengirim data pengguna ke view 'layout/pengguna'
        return view('layout/pengguna', ['pengguna' => $pengguna]);
    }

    // Fungsi untuk menampilkan form tambah pengguna
    public function tambahpengguna()
    {
        // Mengirim view 'layout/tambahpengguna' untuk menampilkan form tambah pengguna
        return view('layout/tambahpengguna');
    }

    // Fungsi untuk memasukkan data pengguna baru ke database
    public function insertdata3(Request $request)
    {
        // Membuat data pengguna baru dengan semua data yang diterima dari request
        Pengguna::create($request->all());
        // Mengarahkan kembali ke route 'pengguna' setelah data berhasil ditambahkan
        return redirect()->route('pengguna');
    }

    // Fungsi untuk menampilkan form ubah pengguna berdasarkan id
    public function ubahpengguna($id)
    {
        // Mengambil data pengguna berdasarkan id
        $pengguna = Pengguna::find($id);
        // Mengirim data pengguna ke view 'layout/ubahpengguna'
        return view('layout/ubahpengguna', compact('pengguna'));
    }

    // Fungsi untuk memperbarui data pengguna berdasarkan id
    public function updatedata3(Request $request, $id)
    {
        // Mengambil data pengguna berdasarkan id
        $pengguna = Pengguna::find($id);
        // Memperbarui data pengguna dengan semua data yang diterima dari request
        $pengguna->update($request->all());
        // Mengarahkan kembali ke route 'pengguna' setelah data berhasil diperbarui
        return redirect()->route('pengguna');
    }

    // Fungsi untuk menghapus data pengguna berdasarkan id
    public function deletepengguna($id)
    {
        // Mengambil data pengguna berdasarkan id
        $pengguna = Pengguna::find($id);
        // Menghapus data pengguna
        $pengguna->delete();
        // Mengarahkan kembali ke route 'pengguna' setelah data berhasil dihapus
        return redirect()->route('pengguna');
    }
}
