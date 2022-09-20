<?php

namespace App\Http\Controllers;
use App\SuratMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use Excel;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data_suratmasuk = \App\SuratMasuk::all();
        return view('suratmasuk.index',['data_suratmasuk'=>$data_suratmasuk]);
    }

    //function masuk ke view tambah
    public function create()
    {
        $data_kategori = \App\Kategori::all();
        return view('suratmasuk/create', ['data_kategori'=>$data_kategori]);
    }

    //function tambah
    public function tambah (Request $request)
    {
        $request->validate([
            'filemasuk' => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'  => 'unique:suratmasuk|min:5',
            'isi'       => 'min:5',
        ]);
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_surat = $request->input('no_surat');
        $suratmasuk->kode     = $request->input('kode');
        $suratmasuk->isi      = $request->input('isi');
        $file                 = $request->file('filemasuk');
        $fileName             = 'suratMasuk-'. $file->getCLientOriginalName();
        $file->move('datasuratmasuk/', $fileName);
        $suratmasuk->filemasuk = $fileName;
        $suratmasuk->save();
        return redirect('/suratmasuk/index')->with("sukses","Data Berhasil Ditambahkan");
    }

    //function melihat file
    public function tampil($id_suratmasuk)
    {
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('suratmasuk/tampil',['suratmasuk'=>$suratmasuk]);
    }

    //function downloadfile
    public function downfunct()
    {
        $downloads=DB::table('suratmasuk')->get();
        return view('suratmasuk.tampil',compact('downloads'));
    }

    //function masuk ke view edit
    public function edit($id_suratmasuk)
    {
        $data_kategori = \App\Kategori::all();
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('suratmasuk/edit',['suratmasuk'=>$suratmasuk],['data_kategori'=>$data_kategori]);
    }

    //function edit
    public function update (Request $request, $id_suratmasuk)
    {
        $request->validate([
            'filemasuk' => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat' => 'min:5',
            'isi'      => 'min:5',

        ]);
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        $suratmasuk->update($request->all());
        //Untuk Update File
        if($request->hasFile('filemasuk')){
            $request->file('filemasuk')->move('datasuratmasuk/','suratMasuk-'. $request->file('filemasuk')->getClientOriginalName());
            $suratmasuk->filemasuk = 'suratMasuk-'. $request->file('filemasuk')->getClientOriginalName();
            $suratmasuk->save();
        }
        return redirect('suratmasuk/index') ->with('sukses','Data Berhasil Diedit');
    }

    //function hapus
    public function delete($id_suratmasuk)
    {
        $suratmasuk=\App\SuratMasuk::find($id_suratmasuk);
        $suratmasuk->delete();
        return redirect('suratmasuk/index')->with('sukses','Data Berhasil Dihapus');
    }
}
