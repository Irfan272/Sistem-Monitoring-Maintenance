@extends('manager_MT.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengajuan Perbaikan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/manager/perbaikan/update/{{$permintaan->id}}" method="POST">
                        
                            <div class="row">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            placeholder="Judul" name="judul" value="{{$permintaan->judul}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Peralatan</label>
                                        <select name="id_peralatan" id="id_peralatan" class="form-control" value="{{$permintaan->id_peralatan}}">
                                        
                                            @foreach ($peralatan as $data)
                                            @if (old('id_peralatan', $permintaan->id_peralatan) == $data->id)
                                            <option value="{{$data->id}}" selected>{{$data->nama_peralatan}}</option>
                                            @endif
                                                <option value="{{$data->id}}">{{$data->nama_peralatan}}</option>
                                             @endforeach
                                        </select>
                                    </div>

                         
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Nama User</label>
                                        <select name="id_user" id="id_user" class="form-control">
                                            {{-- <option disabled value="" value="{{$permintaan->id_user}}">Pilih Divisi</option> --}}
                                            @foreach ($user as $data)
                                            @if (old('id_user', $permintaan->id_user) == $data->id)
                                                 <option value="{{$data->id}}" selected>{{$data->username}}</option>
                                            @else
                                            <option value="{{$data->id}}">{{$data->username}}</option>
                                            @endif
   
                                             @endforeach
                                        </select>
                               
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Keterangan</label>
                                        <input type="text" id="keterangan" class="form-control"
                                            name="keterangan" placeholder="Keterangan" value="{{$permintaan->keterangan}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Prioritas</label>
                                        <input type="text" id="prioritas" class="form-control"
                                            name="prioritas" placeholder="Prioritas" value="{{$permintaan->prioritas}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Lokasi</label>
                                        <input type="text" id="lokasi" class="form-control"
                                            name="lokasi" placeholder="Lokasi" value="{{$permintaan->lokasi}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Tanggal Perkerjaan</label>
                                        <input type="date" id="tanggal_pekerjaan" class="form-control"
                                            name="tanggal_pekerjaan" placeholder="Tanggal Pekerjaan" value="{{$permintaan->tanggal_pekerjaan}}">
                                    </div>
                                </div>
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