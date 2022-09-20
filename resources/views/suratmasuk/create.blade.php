@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/suratmasuk/tambah" method="POST" enctype="multipart/form-data">
            <h3><i class="nav-icon fas fa-envelope-open-text my-1 btn-sm-1"></i> Arsip Surat >> Unggah</h3>
            <h5>Unggah surat yang telah terbit pada form ini untuk diarsipkan</h5>
            <h5>Catatan:</h5>
            <h5>-  Gunakan file berformat PDF</h5>
            <hr />
            {{csrf_field()}}
            <div class="row">
                <div class="col-6">
                    <label for="nomorsurat">Nomor Surat</label>
                    <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                        id="nomorsurat" placeholder="Nomor Surat" required>
                    <label for="kode">Kategori</label>
                    <select name="kode" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                        required>
                        <option value="">-- Pilih Kategori Surat --</option>
                        @foreach($data_kategori as $kategori)
                        <option value="{{$kategori->nama}}">{{$kategori->nama}} ( {{$kategori->kode}} )
                        </option>
                        @endforeach
                    </select>
                    <label for="isisurat">Judul</label>
                    <textarea name="isi" class="form-control bg-light" id="isisurat" rows="3"
                        placeholder="Isi Ringkas Surat Masuk" required>{{old('isi')}}</textarea>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File</label>
                        <input name="filemasuk" type="file" class="form-control-file" id="exampleFormControlFile1"
                            required>
                        <small id="exampleFormControlFile1" class="text-danger">
                            Pastikan file anda ( .pdf ) !!!
                        </small>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> Simpan</button>
            <a class="btn btn-danger btn-sm" href="index" role="button"><i class="fas fa-undo"></i> Batal</a>
        </form>
    </div>
    </div>
</section>
@endsection
