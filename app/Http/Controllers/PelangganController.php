<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PelangganController extends Controller
{
    // Method untuk menampilkan daftar Pelanggan
    public function index()
    {
        // Mengambil semua data Pelanggan beserta relasinya dengan Pengguna
        $pelanggan = Pelanggan::with('Pengguna')->get();
        // Mengirim data Pelanggan ke view 'layout/pelanggan'
        return view('layout/pelanggan', compact('pelanggan'));
    }

    // Method untuk menampilkan form tambah Pelanggan baru
    public function tambahpelanggan()
    {
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        // Mengirim data Pengguna ke view 'layout/tambahpelanggan'
        return view('layout/tambahpelanggan', compact('pengguna'));
    }

    // Method untuk menyimpan data Pelanggan baru
    public function insertdata4(Request $request)
    {
        // Membuat data Pelanggan baru berdasarkan data dari request
        Pelanggan::create($request->all());
        // Mengarahkan kembali ke halaman daftar Pelanggan
        return redirect()->route('pelanggan');
    }

    // Method untuk menampilkan form ubah data Pelanggan
    public function ubahpelanggan($id)
    {
        // Mencari data Pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        // Mengirim data Pelanggan dan Pengguna ke view 'layout/ubahpelanggan'
        return view('layout/ubahpelanggan', compact('pelanggan', 'pengguna'));
    }

    // Method untuk memperbarui data Pelanggan
    public function updatedata4(Request $request, $id)
    {
        // Mencari data Pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);
        // Memperbarui data Pelanggan dengan data dari request
        $pelanggan->update($request->all());
        // Mengarahkan kembali ke halaman daftar Pelanggan
        return redirect()->route('pelanggan');
    }

    // Method untuk menghapus data Pelanggan
    public function deletepelanggan($id)
    {
        // Mencari data Pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);
        // Menghapus data Pelanggan
        $pelanggan->delete();
        // Mengarahkan kembali ke halaman daftar Pelanggan
        return redirect()->route('pelanggan');
    }

    // Method untuk mengekspor data Pelanggan ke dalam file PDF
    public function eksporpelanggan()
    {
        // Mengambil semua data Pelanggan beserta relasinya dengan Pengguna
        $pelanggan = Pelanggan::with('Pengguna')->get();
        // Membagikan data Pelanggan dengan view
        view()->share('pelanggan', $pelanggan);
        // Memuat view dan menghasilkan file PDF
        $pdf = PDF::loadview('layout/datapelanggan-pdf');
        // Mengunduh file PDF yang dihasilkan
        return $pdf->download('pelanggan.pdf');
    }
}
