@extends('penanggung_jawab.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengajuan Perbaikan</h4>
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
                        <form class="form" action="/user/permintaan/store" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            placeholder="Judul" name="judul">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Peralatan</label>
                                        <select name="id_peralatan" id="id_peralatan" class="form-control">
                                            <option disabled value="">Pilih Peralatan</option>
                                            @foreach ($peralatan as $data)
                                                <option value="{{$data->id}}">{{$data->nama_peralatan}}</option>
                                             @endforeach
                                        </select>
                                    </div>

                         
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Nama User</label>
                                        {{-- <select name="id_user" id="id_user" class="form-control">
                                            <option disabled value="">Pilih Peralatan</option>
                                            @foreach ($user as $data)
                                                <option value="{{$data->id}}">{{$data->username}}</option>
                                             @endforeach
                                        </select> --}}
                                        <input type="text" id="id_user"  class="form-control"
                                        name="id_user" value="{{auth()->user()->username}}" readonly>
                               
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Keterangan</label>
                                        <input type="text" id="keterangan" class="form-control"
                                            name="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Prioritas</label>
                                           <select name="prioritas" id="prioritas" class="form-control">
                                                <option disabled value="">Pilih Prioritas</option>
                                            
                                                    <option value="critical">Critical</option>
                                                    <option value="height">Height</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="low">Low</option>
                                              
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Lokasi</label>
                                        <input type="text" id="lokasi" class="form-control"
                                            name="lokasi" placeholder="Lokasi">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Tanggal Perkerjaan</label>
                                        <input type="date" id="tanggal_pekerjaan" class="form-control"
                                            name="tanggal_pekerjaan" placeholder="Tanggal Pekerjaan">
                                    </div>
                                </div> --}}
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="/user/permintaan" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection