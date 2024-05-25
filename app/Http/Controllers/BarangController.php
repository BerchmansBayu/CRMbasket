<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BarangController extends Controller
{
    public function index()
    {
    	
        $barang = Barang::with('Distributor')->get();
    	
    	return view('layout/barang',compact('barang'));
 
    }

    public function tambahbarang()
    {

    	//ini digunakan untuk memanggil model Distributor pada Folder Models Distributor.php
        $distributor=Distributor::all();
    	//ini digunakan untuk menampilkan distributor pemanggilannya ke dalam form tambahbarang.blade.php dalam bentuk select option
    	return view('layout/tambahbarang',compact('distributor'));
 
    }

    public function insertdata(Request $request)
    {
        
        // mengambil data dari table pegawai
    	Barang::create($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('barang');
 
    }

    public function ubahbarang($id_barang)
    {
    	// mengambil data dari table pegawai
        $barang = Barang::find($id_barang);
        $distributor=Distributor::all();
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahbarang',compact('barang','distributor'));
 
    }

    public function updatedata(Request $request, $id_barang)
    {
    	// mengambil data dari table pegawai
        $barang = Barang::find($id_barang);
        $barang->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('barang');
 
    }

    public function deletebarang($id_barang)
    {
    	// mengambil data dari table pegawai
        $barang = Barang::find($id_barang);
        $barang->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('barang');
 
    }

    public function eksporbarang()
    {
    	// ini digunakan untuk aksi mencetak data barang yang berelasi dengan tabel distributor
        $barang = Barang::with('Distributor')->get();
        view()->share('barang',$barang);
        // untuk menampilkan view hasil cetak data barang
        $pdf = PDF::loadview('layout/databarang-pdf');
        // disimpan dengan nama barang.pdf
        return $pdf->download('barang.pdf');
    	
    	
 
    }
}
