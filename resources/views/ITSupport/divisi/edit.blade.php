@extends('ITSupport.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Divisi</h4>
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
                        @foreach ($divisi as $data)
                        <form class="form" action="/IT/divisi/update/{{$data->id}}" method="POST">                           
                            <div class="row">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Nama Divisi</label>
                                        <input type="text" id="nama_divisi" class="form-control"
                                            placeholder="Nama Divisi" name="nama_divisi" value="{{$data->nama_divisi}}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Deskripsi</label>
                                        <textarea type="text" id="keterangan" class="form-control"
                                            placeholder="Tuliskan Deksripsi Divisi" name="keterangan">{{$data->keterangan}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="/IT/divisi/" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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