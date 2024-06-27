<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function datapegawai(){
        $data = Pegawai::all();
        return view('datapegawai', compact('data'));
    }
    public function tambahdata(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        Pegawai::create($request->all());
        return redirect()->route('pegawais')->with('success','Data Berhasil Ditambahkan');
    }

    public function editdata($id){
        $data = Pegawai::find($id);
        return view('editdata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('pegawais')->with('success','Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('pegawais')->with('success','Data Berhasil Dihapus');
    }
}
