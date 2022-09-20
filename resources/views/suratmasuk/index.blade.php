@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h3><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Surat Masuk</h3>&nbsp
                <h5>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h5>
                <h5>Klik "View" pada kolom aksi untuk menampilkan surat.</h5> &nbsp
                <hr />
            </div>
        </div>
        <div>
            <div class="col">
                <a class="btn btn-success btn-sm my-1 mr-sm-1" href="create" role="button"><i class="fas fa-plus"></i>
                    <strong>Arsipkan Surat</strong></a>
                <br>
            </div>
        </div>
        <div class="row table-responsive">
            <div class="col">
                <table class="table table-hover table-head-fixed" id='tabelSuratmasuk'>
                    <thead>
                        <tr class="bg-light">
                            <th>No.</th>
                            <th>Nomor Surat</th>
                            <th>File</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($data_suratmasuk as $suratmasuk)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$suratmasuk->no_surat}}</td>
                            <td><a href="/suratmasuk/{{$suratmasuk->id}}/tampil">{{$suratmasuk->filemasuk}}</a></td>
                            <td>{{$suratmasuk->kode}}</td>
                            <td>{{$suratmasuk->isi}}</td>                     
                            <td>{{$suratmasuk->created_at}}</td>
                            <td>
                                <a href="/suratmasuk/{{$suratmasuk->id}}/edit"
                                    class="btn btn-primary btn-sm my-1 mr-sm-1 btn-block"><i
                                        class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                        <a href="/suratmasuk/{{$suratmasuk->id}}/tampil "
                                            class="btn btn-warning btn-sm my-1 mr-sm-1 btn-block"><i
                                                class="nav-icon fas fa-envelope"></i> View</a>
                                <a href="/suratmasuk/{{$suratmasuk->id}}/delete"
                                    class="btn btn-danger btn-sm my-1 mr-sm-1 btn-block"
                                    onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                    Hapus</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</section>
@endsection
