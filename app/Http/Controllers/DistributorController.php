<?php

namespace App\Http\Controllers;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistributorController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
 $distributor = Distributor::all();
    	// mengirim data pegawai ke view index
    	return view('layout/distributor',['distributor'=>$distributor]);
 
    }

    public function tambahdistributor()
    {
    	// mengambil data dari table pegawai
    	
 
    	// mengirim data pegawai ke view index
    	return view('layout/tambahdistributor');
 
    }

    public function insertdata1(Request $request)
    {
        Distributor::create($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('distributor');
        
        // mengambil data dari table pegawai
 
    	// mengirim data pegawai ke view index
    	
 
    }

    public function ubahdistributor($id)
    {
    	// mengambil data dari table pegawai
        $distributor = Distributor::find($id);
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahdistributor',compact('distributor'));
 
    }

    public function updatedata1(Request $request, $id)
    {
    	// mengambil data dari table pegawai
        $distributor = Distributor::find($id);
        $distributor->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('distributor');
 
    }

    public function deletedistributor($id)
    {
    	// mengambil data dari table pegawai
        $distributor = Distributor::find($id);
        $distributor->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('distributor');
 
    }
}
