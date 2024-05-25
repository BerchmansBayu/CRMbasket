<?php

namespace App\Http\Controllers;

use App\Models\Poin;          // Mengimpor model Poin
use App\Models\Pengguna;      // Mengimpor model Pengguna
use Illuminate\Http\Request;  // Mengimpor kelas Request
use Illuminate\Support\Facades\DB; // Mengimpor facade DB
use PDF;                      // Mengimpor facade PDF untuk menghasilkan PDF

class PoinController extends Controller
{
    // Metode untuk menampilkan daftar poin
    public function index()
    {
        // Mengambil semua data Poin beserta relasi dengan Pengguna
        $poin = Poin::with('Pengguna')->get();
        
        // Mengirim data ke view 'layout/poin'
        return view('layout/poin', compact('poin'));
    }

    // Metode untuk menampilkan formulir penambahan poin baru
    public function tambahpoin()
    {
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        
        // Mengirim data ke view 'layout/tambahpoin'
        return view('layout/tambahpoin', compact('pengguna'));
    }

    // Metode untuk menangani pengiriman formulir penambahan poin baru
    public function insertdata5(Request $request)
    {
        // Membuat data Poin baru dengan data yang diberikan
        Poin::create($request->all());
        
        // Mengarahkan ke rute 'poin'
        return redirect()->route('poin');
    }

    // Metode untuk menampilkan formulir pengubahan poin
    public function ubahpoin($id)
    {
        // Mencari data Poin berdasarkan ID
        $poin = Poin::find($id);
        
        // Mengambil semua data Pengguna
        $pengguna = Pengguna::all();
        
        // Mengirim data ke view 'layout/ubahpoin'
        return view('layout/ubahpoin', compact('poin', 'pengguna'));
    }

    // Metode untuk menangani pengiriman formulir pengubahan poin
    public function updatedata5(Request $request, $id)
    {
        // Mencari data Poin berdasarkan ID
        $poin = Poin::find($id);
        
        // Memperbarui data Poin dengan data yang diberikan
        $poin->update($request->all());
        
        // Mengarahkan ke rute 'poin'
        return redirect()->route('poin');
    }

    // Metode untuk menghapus poin
    public function deletepoin($id)
    {
        // Mencari data Poin berdasarkan ID
        $poin = Poin::find($id);
        
        // Menghapus data Poin
        $poin->delete();
        
        // Mengarahkan ke rute 'poin'
        return redirect()->route('poin');
    }

    // Metode untuk mengekspor daftar poin ke PDF
    public function eksporpoin()
    {
        // Mengambil semua data Poin beserta relasi dengan Pengguna
        $poin = Poin::with('Pengguna')->get();
        
        // Membagikan data dengan view
        view()->share('poin', $poin);
        
        // Memuat view 'layout/datapoin-pdf' ke dalam PDF
        $pdf = PDF::loadview('layout/datapoin-pdf');
        
        // Mengunduh file PDF yang dihasilkan sebagai 'poin.pdf'
        return $pdf->download('poin.pdf');
    }
}
