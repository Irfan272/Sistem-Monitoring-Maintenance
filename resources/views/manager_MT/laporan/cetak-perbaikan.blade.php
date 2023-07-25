@extends('manager_MT.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Print Data Perbaikan</h3>
                {{-- <a href="/manager/Perbaikan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Peralatan</span></a> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Perbaikan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
        
                            
                    <div class="row">
                     
              
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Tanggal Awal</label>
                                <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Tanggal Akhir</label>
                                <input type="date" id="tanggal_akhir" class="form-control" name="tanggal_akhir">
                            </div>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end">
                            <a href="" onclick="this.href='/manager/cetak-perbaikan-pertanggal/'+ document.getElementById('tanggal_awal').value +
                            '/' + document.getElementById('tanggal_akhir').value " 
                            target="_blank" class="btn btn-primary me-1 mb-1">Cetak</a>
                            
                        </div>
                    </div>
             
            </div>
        </div>

    </section>



</div>
@endsection

