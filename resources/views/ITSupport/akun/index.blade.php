@extends('ITSupport.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Akun</h3>
                <a href="/IT/akun/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Akun</span></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>      
                            <th>Role</th>                     
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akun as $data)
                        <tr>
                            <td class="wrap-text">{{$loop->iteration}}</td>
                            <td class="wrap-text">{{$data->username}}</td>
                            <td class="wrap-text">{{$data->nama_lengkap}}</td>
                            <td class="wrap-text">{{$data->email}}</td>
                            <td class="wrap-text">{{$data->no_telpon}}</td>
                            <td class="wrap-text">{{$data->jabatan}}</td>
                            <td class="wrap-text">{{$data->divisi->nama_divisi}}</td>
                            <td class="wrap-text">{{$data->role}}</td>
                            <td class="wrap-text">
                                <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#akunModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                                <a href="{{url('/IT/akun/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i> Edit</a>
                                
                                <form action="/IT/akun/delete/{{$data->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn m-1 icon icon-left btn-danger"><i data-feather="x"></i>Delete</button>
                                </form>
                            </td>
    
                        </tr>
                        @endforeach



                      
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>

     <!--View Modal -->
@foreach ($akun as $data)
<div class="modal fade" id="akunModal{{$data->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Data Akun : {{$data->username}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
               <form action="#">
                   <div class="modal-body">
                       <label>Username: </label>
                       <div class="form-group">
                           <input type="text" placeholder="Username" id="username"
                               class="form-control" value=" {{$data->username}}" disabled>
                       </div>
                       <label>Nama Lengkap: </label>
                       <div class="form-group">
                           <input type="text" placeholder="Nama Lengkap" id="nama_lengkap"
                               class="form-control" value=" {{$data->nama_lengkap}}" disabled>
                       </div>
                       <label>Email: </label>
                       <div class="form-group">
                           <input type="text" placeholder="Email Address" id="email"
                               class="form-control" value=" {{$data->email}}" disabled>
                       </div>
                       <label>Tanggal Lahir: </label>
                       <div class="form-group">
                           <input type="date" id="tanggal_lahir" placeholder="Tanggal Lahir"
                               class="form-control" value=" {{$data->tanggal_lahir}}" disabled>
                       </div>
                       {{-- <label>Tempat Lahir: </label>
                       <div class="form-group">
                           <input type="text" placeholder="Tempat Lahir"
                               class="form-control" value=" {{$data->tempat_lahir}}" disabled>
                       </div> --}}
                       <label>Jenis Kelamin: </label>
                       <div class="form-group">
                           <input type="text" id="jenis_kelamin" placeholder="Email Address"
                               class="form-control" value=" {{$data->jenis_kelamin}}" disabled>
                       </div>
                       <label>Alamat: </label>
                       <div class="form-group">
                           <input ype="text" id="alamat" placeholder="Alamat"
                               class="form-control" value=" {{$data->alamat}}" disabled>
                       </div>
                       <label>Nomor Telepon: </label>
                       <div class="form-group">
                           <input type="text" id="nomor_telpon" placeholder="Nomor Telepon"
                               class="form-control" value=" {{$data->no_telpon}}" disabled>
                       </div>
                       <label>Jabatan: </label>
                       <div class="form-group">
                           <input type="text" id="jabatan" placeholder="Jabatan"
                               class="form-control" value=" {{$data->jabatan}}" disabled>
                       </div>
                       <label>Divisi: </label>
                       <div class="form-group">
                           <input  type="text" id="divisi"  placeholder="Divisi"
                               class="form-control" value=" {{$data->divisi->nama_divisi}}" disabled>
                       </div>
                       <label>Role: </label>
                       <div class="form-group">
                           <input type="text" id="role" placeholder="Role"
                               class="form-control" value=" {{$data->role}}" disabled>
                       </div>
                   </div>
                 
               </form>
               <div class="modal-footer">
                   <button type="button" class="btn btn-light-secondary"
                       data-bs-dismiss="modal">
                       <i class="bx bx-x d-block d-sm-none"></i>
                       <span class="d-none d-sm-block">Close</span>
                   </button>
                   {{-- <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                       <i class="bx bx-check d-block d-sm-none"></i>
                       <span class="d-none d-sm-block">Accept</span>
                   </button> --}}
               </div>
            </div>
         
        </div>
    </div>
   </div>
@endforeach

</div>
@endsection

