@extends('manager_MT.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Perawatan Rutin</h4>
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
                        @foreach ($perawatan as $data)
                        <form class="form" action="/manager/perawatan/update/{{$data->id}}" method="POST">
                            
                            <div class="row">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            placeholder="Judul" name="judul" value="{{$data->judul}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Peralatan</label>
                                        <select name="id_peralatan" id="id_peralatan" class="form-control">
                                            @foreach ($peralatan as $p)
                                            @if (old('id_peralatan', $data->id_peralatan) == $p->id)
                                            <option value="{{$p->id}}" selected>{{$p->nama_peralatan}}</option>
                                            @endif
                                                <option value="{{$p->id}}">{{$p->nama_peralatan}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Keterangan</label>
                                        <input type="text" id="keterangan" class="form-control" placeholder="Keterangan"
                                            name="keterangan" value="{{$data->keterangan}}" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Prioritas</label>
                                        <select name="prioritas" id="prioritas" class="form-control">
                                            <option disabled value="">Pilih Prioritas</option>                                          
                                                               

                                                <option @if ($data->prioritas == 'critical')
                                                    selected
                                                @endif value="critical">Critical</option>
                                                <option @if ($data->prioritas == 'height')
                                                    selected
                                                @endif value="height">Height</option>
                                                <option @if ($data->prioritas == 'medium')
                                                    selected
                                                @endif value="medium">Medium</option>
                                                <option @if ($data->prioritas == 'low')
                                                    selected
                                                @endif value="low">Low</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Nama Teknisi</label>
                                        <select name="id_teknisi" id="id_teknisi" class="form-control">
                                                       {{-- <option disabled value="" value="{{$permintaan->id_user}}">Pilih Divisi</option> --}}
                                                       @foreach ($user as $u)
                                                       @if (old('id_user', $data->id_user) == $u->id)
                                                            <option value="{{$u->id}}" selected>{{$u->username}}</option>
                                                       @else
                                                       <option value="{{$u->id}}">{{$u->username}}</option>
                                                       @endif
              
                                                        @endforeach
                                        </select>
                               
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option disabled value="">Pilih Status</option>
                                            <option @if ($data->status == 'Dalam Pengerjaan')
                                                    selected
                                                @endif value="Dalam Pengerjaan">Dalam Pengerjaan</option>
                                                <option @if ($data->status == 'Selesai')
                                                    selected
                                                @endif value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="/manager/perawatan/" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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