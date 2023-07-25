@extends('ITSupport.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Peralatan</h4>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($peralatan as $data)
                        <form class="form" action="/IT/peralatan/update/{{$data->id}}" method="POST">
                            <div class="row">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Nama Peralatan</label>
                                        <input type="text" id="nama_peralatan" class="form-control"
                                            placeholder="Nama Peralatan" name="nama_peralatan" value="{{$data->nama_peralatan}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Jenis Peralatan</label>
                                        <select name="jenis_peralatan" id="jenis_peralatan" class="form-control" value="{{old('jenis_peralatan')}}">  
                                            
                                            <option disabled value="">Pilih Jenis Peralatan</option>
                                            <option @if ($data->jenis_peralatan == 'Alat Berat')
                                                selected
                                            @endif value="Alat Berat">Alat Berat</option>
                                            <option @if ($data->jenis_peralatan == 'Alat Ringan')
                                                selected
                                            @endif value="Alat Ringan">Alat Ringan</option>
                                
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Merk Peralatan</label>
                                        <input type="text" id="merk_peralatan" class="form-control" placeholder="Merk"
                                            name="merk_peralatan" value="{{$data->merk_peralatan}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Produsen</label>
                                        <input type="text" id="produsen" class="form-control"
                                            name="produsen" placeholder="Produsen" value="{{$data->produsen}}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Nomor Seri</label>
                                        <input type="text" id="nomor_seri" class="form-control"
                                            name="nomor_seri" placeholder="Nomor Seri">
                                    </div>
                                </div> --}}
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Divisi</label>
                                        <select name="id_divisi" id="id_divisi" class="form-control">
                                            <option disabled value="">Pilih Divisi</option>
                                            {{-- @foreach ($divisi as $data)
                                                <option value="{{$data->id}}">{{$data->nama_divisi}}</option>
                                             @endforeach --}}

                                             @foreach ($divisi as $d)
                                             <option @if ($data->id_divisi == $d->id)
                                                 selected
                                             @endif value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
                                             @endforeach
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Tahun Pembuatan</label>
                                        <input type="date" id="tahun_pembuatan" class="form-control"
                                            name="tahun_pembuatan" placeholder="Tahun Pembuatan" value="{{$data->tahun_pembuatan}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Tahun Batas Pemakaian</label>
                                        <input type="date" id="tahun_batas" class="form-control"
                                            name="tahun_batas" placeholder="Tahun Batas" value="{{$data->tahun_batas}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Kondisi</label>
                                        <select name="kondisi" id="kondisi" class="form-control" value="{{old('kondisi')}}">
                                            <option value="" disabled>Pilih Kondisi</option>
                                            <option @if ($data->kondisi == 'Baru')
                                                selected
                                            @endif value="Baru">Baru</option>
                                            <option @if ($data->kondisi == 'Bekas')
                                                selected
                                            @endif value="Bekas">Bekas</option>
                                            <option @if ($data->kondisi == 'Baik')
                                                selected
                                            @endif value="Baik">Baik</option>
                                            <option @if ($data->kondisi == 'Rusak')
                                                selected
                                            @endif value="Rusak">Rusak</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="/IT/peralatan/" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection