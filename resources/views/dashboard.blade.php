@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <div class="row">
            <div class="col">
                <center>
                    <h3 class="font-weight-bold">SISTEM INFORMASI ARSIP SURAT DESA KARANGDUREN</h3>
                    <hr />
                </center>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <!-- Small boxes (Stat box) -->
                <div class="filter-container p-0 row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                {{-- <h3>{{DB::table('suratmasuk')->count()}}</h3> --}}
                                <p><strong>Surat Masuk</strong></p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-envelope-open-text"></i>
                                &nbsp
                            </div>
                            &nbsp
                            <a href="/suratmasuk/index" class="small-box-footer bg-pink">Lihat Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                {{-- <h3>{{DB::table('kategori')->count()}}</h3> --}}
                                <p><strong>Kategori</strong></p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-layer-group"></i>
                                &nbsp
                            </div>
                            &nbsp
                            <a href="/kategori/index" class="small-box-footer bg-pink">Lihat Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
