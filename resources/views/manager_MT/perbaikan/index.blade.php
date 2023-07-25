@extends('manager_MT.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Approval Perbaikan</h3>
                {{-- <a href="/user/permintaan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Peralatan</span></a> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Approval Perbaikan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        
        <div class="card">
            
            <div class="card-body">
                <div class="row">
             
   
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Tanggal Awal</label>
                            <input type="date" id="tanggal_awal" class="form-control"
                                placeholder="Prioritas" name="tanggal_awal">
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Tanggal Akhir</label>
                            <input type="date" id="tanggal_akhir" class="form-control"
                                placeholder="Prioritas" name="tanggal_akhir">
                        </div>
                    </div>
      
                </div>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Perbaikan</th>
                            <th>Judul</th>
                            <th>Mesin</th>
                            <th>Penanggung Jawab</th>
                            <th>Prioritas</th>
                            <th>Lokasi</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permintaan as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>PB-0{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->peralatan->nama_peralatan}}</td>
                            <td>{{$data->user->username}}</td>
                            <td>{{$data->prioritas}}</td>
                            <td>{{$data->lokasi}}</td>
                            <td>{{$data->tanggal_pekerjaan}}</td>
                             <td>
                                {{$data->status}}
                            </td>
                            <td>
                                <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#permintaanModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                                <a href="{{url('/manager/perbaikan/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i> Edit</a>
                                
                                <form action="/manager/perbaikan/delete/{{$data->id}}" method="POST">
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
 

     <!--View Modal -->
     <div class="modal fade" id="perawatanModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalScrollableTitle">Data Akun : Irfan Fadillah</h5>
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
                                class="form-control">
                        </div>
                        <label>Nama Lengkap: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Lengkap" id="nama_lengkap"
                                class="form-control">
                        </div>
                        <label>Email: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Email Address" id="email"
                                class="form-control">
                        </div>
                        <label>Password: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Password" id="password"
                                class="form-control">
                        </div>
                        <label>Tanggal Lahir: </label>
                        <div class="form-group">
                            <input type="date" id="tanggal_lahir" placeholder="Tanggal Lahir"
                                class="form-control">
                        </div>
                        <label>Tempat Lahir: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Tempat Lahir"
                                class="form-control">
                        </div>
                        <label>Jenis Kelamin: </label>
                        <div class="form-group">
                            <input type="text" id="jenis_kelamin" placeholder="Email Address"
                                class="form-control">
                        </div>
                        <label>Alamat: </label>
                        <div class="form-group">
                            <input ype="text" id="alamat" placeholder="Alamat"
                                class="form-control">
                        </div>
                        <label>Nomor Telepon: </label>
                        <div class="form-group">
                            <input type="text" id="nomor_telpon" placeholder="Nomor Telepon"
                                class="form-control">
                        </div>
                        <label>Jabatan: </label>
                        <div class="form-group">
                            <input type="text" id="jabatan" placeholder="Jabatan"
                                class="form-control">
                        </div>
                        <label>Divisi: </label>
                        <div class="form-group">
                            <input  type="text" id="divisi"  placeholder="Divisi"
                                class="form-control">
                        </div>
                        <label>Role: </label>
                        <div class="form-group">
                            <input type="text" id="role" placeholder="Role"
                                class="form-control">
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
</div>
@endsection

