<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        $data_kategori = \App\Kategori::all();
        return view('kategori.index',['data_kategori'=> $data_kategori]);
    }

    //function masuk ke view tambah
    public function create()
    {
        return view('kategori/create');
    }

    //function tambah
    public function tambah (Request $request)
    {
        $request->validate([
            'nama' => 'unique:kategori|min:5',
            'kode' => 'unique:kategori|max:2',
        ]);
        $kategori = new Kategori();
        $kategori->nama = $request->input('nama');
        $kategori->kode = $request->input('kode');
        $kategori->save();
        return redirect('/kategori/index')->with("sukses", "data kategori berhasil ditambahkan");
    }

    //function masuk ke view edit
    public function edit($id_kategori)
    {
        $kategori = \App\Kategori::find($id_kategori);
        return view('kategori/edit',['kategori'=>$kategori]);
    }

    public function update (Request $request, $id_kategori)
    {
        $request->validate([
            'nama' => 'min:5',
            'kode' => 'max:2',
        ]);
        $kategori = \App\Kategori::find($id_kategori);
        $kategori->update($request->all());
        $kategori->save();
        return redirect('kategori/index') -> with ('sukses', 'data kategori berhasil diedit');
    }

    //function hapus
    public function delete($id_kategori)
    {
        $kategori=\App\Kategori::find($id_kategori);
        $kategori->delete();
        return redirect('kategori/index') -> with ('sukses', 'data kategori berhasil dihapus');
    }
}
