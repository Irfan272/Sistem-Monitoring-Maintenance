@extends('manager_MT.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Approval Perbaikan</h4>
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
                        @foreach ($permintaan as $data)
                        <form class="form" action="/manager/perbaikan/update/{{$data->id}}" method="POST">
                        
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
                                        <label for="last-name-column">Nama Peralatan</label>
                                        <select name="id_peralatan"  id="id_peralatan" class="form-control" value="{{$data->id_peralatan}}">
                                        
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
                                        <label for="city-column">Nama Penanggung Jawab</label>
                                        {{-- <input type="text" id="id_user" class="form-control"
                                        name="id_user" placeholder="Keterangan" value="{{$data->id_user}}" placeholder="{{$data->user->username}}" readonly>
                                        <p>{{$data->user->username}}</p> --}}
                                        

                                        <select name="id_user"  id="id_user" class="form-control" value="{{$data->id_user}}" >
                                        
                                            @foreach ($user as $p)
                                            @if (old('id_peralatan', $data->id_user) == $p->id)
                                            <option value="{{$p->id}}" selected>{{$data->user->username}}</option>
                                            @endif
                                                {{-- <option value="{{$p->id}}">{{$data->user->username}}</option> --}}
                                             @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Keterangan</label>
                                        <input type="text" id="keterangan" class="form-control"
                                            name="keterangan" placeholder="Keterangan" value="{{$data->keterangan}}">
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
                                        <label for="email-id-column">Lokasi</label>
                                        <input type="text" id="lokasi" class="form-control"
                                            name="lokasi" placeholder="Lokasi" value="{{$data->lokasi}}">
                                    </div>
                                </div>
                           
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Teknisi</label>
                                        <select name="id_teknisi" id="id_teknisi" class="form-control">
                                            <option disabled value="">Pilih Teknisi</option>
                                            @foreach ($teknisi as $t)
                                                <option value="{{$t->id}}">{{$t->username}}</option>
                                             @endforeach
                                        </select>
                                    </div>

                         
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option disabled value="">Pilih Status</option>                                          
                                                               

                                                <option @if ($data->status == 'Menunggu Approval')
                                                    selected
                                                @endif value="Menunggu Approval">Menunggu Approval</option>
                                                <option @if ($data->status == 'Dalam Pengerjaan')
                                                    selected
                                                @endif value="Dalam Pengerjaan">Dalam Pengerjaan</option>
                                                <option @if ($data->prioritas == 'Selesai')
                                                    selected
                                                @endif value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="/manager/perbaikan" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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