<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PegawaiController extends Controller
{
    // Metode untuk menampilkan daftar Pegawai
    public function index()
    {
        // Mengambil semua data Pegawai beserta data Pengguna terkait
        $pegawai = Pegawai::with('Pengguna')->get();
        // Mengirim data Pegawai ke view 'layout/pegawai'
        return view('layout/pegawai', compact('pegawai'));
    }

    // Metode untuk menampilkan formulir penambahan Pegawai baru
    public function tambahpegawai()
    {
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        // Mengirim data Pengguna ke view 'layout/tambahpegawai'
        return view('layout/tambahpegawai', compact('pengguna'));
    }

    // Metode untuk memasukkan data Pegawai baru
    public function insertdata2(Request $request)
    {
        // Membuat entri Pegawai baru dengan data dari request
        Pegawai::create($request->all());
        // Mengarahkan pengguna kembali ke halaman daftar Pegawai
        return redirect()->route('pegawai');
    }

    // Metode untuk menampilkan formulir pengubahan Pegawai
    public function ubahpegawai($id)
    {
        // Menemukan entri Pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        // Mengirim data Pegawai dan Pengguna ke view 'layout/ubahpegawai'
        return view('layout/ubahpegawai', compact('pegawai', 'pengguna'));
    }

    // Metode untuk memperbarui data Pegawai
    public function updatedata2(Request $request, $id)
    {
        // Menemukan entri Pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);
        // Memperbarui entri Pegawai dengan data dari request
        $pegawai->update($request->all());
        // Mengarahkan pengguna kembali ke halaman daftar Pegawai
        return redirect()->route('pegawai');
    }

    // Metode untuk menghapus data Pegawai
    public function deletepegawai($id)
    {
        // Menemukan entri Pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);
        // Menghapus entri Pegawai
        $pegawai->delete();
        // Mengarahkan pengguna kembali ke halaman daftar Pegawai
        return redirect()->route('pegawai');
    }

    // Metode untuk mengekspor data Pegawai ke file PDF
    public function eksporpegawai()
    {
        // Mengambil semua data Pegawai beserta data Pengguna terkait
        $pegawai = Pegawai::with('Pengguna')->get();
        // Berbagi data Pegawai dengan view
        view()->share('pegawai', $pegawai);
        // Memuat view dan membuat file PDF
        $pdf = PDF::loadview('layout/datapegawai-pdf');
        // Mengunduh file PDF yang dihasilkan
        return $pdf->download('pegawai.pdf');
    }
}
