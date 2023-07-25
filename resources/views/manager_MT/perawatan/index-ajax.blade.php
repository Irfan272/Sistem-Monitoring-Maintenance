@extends('manager_MT.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Penjadwalan Perawatan</h3>
                <a href="/manager/perawatan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Peralatan</span></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perawatan Rutin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        
        <div class="card">
         <div>
        <label for="tanggal_awal">Tanggal Awal:</label>
        <input type="date" id="tanggal_awal">
    </div>
    <div>
        <label for="tanggal_akhir">Tanggal Akhir:</label>
        <input type="date" id="tanggal_akhir">
    </div>
            <div class="card-body" id="tabel-perawatan">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judsadul</th>
                            <th>Peralatan</th>
                            <th>Tanggal Pekerjaan</th>
                            <th>Keterangan</th>
                            <th>Nama Teknisi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perawatan as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->peralatan->nama_peralatan}}</td>
                            <td>{{$data->tanggal_pekerjaan}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>{{$data->user->username}}</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#permintaanModal{{$data->id}}"><i data-feather="eye"></i></button>
                                {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                                <a href="{{url('/manager/perawatan/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i></a>
                                
                                <form action="/manager/perawatan/delete/{{$data->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn m-1 icon icon-left btn-danger"><i data-feather="x"></i></button>
                                </form>
                            </td>
    
                        </tr>
                        @endforeach
                
                     
                </table>
            </div>
        </div>

    </section>

     <!--View Modal -->
     <div class="modal fade" id="perawatanModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalScrollableTitle">Data Jadwal Perawatan  : Crane</h5>
                 <button type="button" class="close" data-bs-dismiss="modal"
                     aria-label="Close">
                     <i data-feather="x"></i>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#">
                    <div class="modal-body">
                        <label>Mesin: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Username" id="username"
                                class="form-control">
                        </div>
                        <label>Judul Perawatan: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Lengkap" id="nama_lengkap"
                                class="form-control">
                        </div>
                        <label>Prioritas: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Prioritas" id="email"
                                class="form-control">
                        </div>
                        <label>Tanggal Perawatan: </label>
                        <div class="form-group">
                            <input type="date" placeholder="Tanggal Perawatan" id="Tanggal Perawatan"
                                class="form-control">
                        </div>
                        <label>Nama Teknisi: </label>
                        <div class="form-group">
                            <input type="text" id="nama_teknisi" placeholder="Nama Teknisi"
                                class="form-control">
                        </div>
                        <label>Keterangan: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Keterangan"
                                class="form-control">
                        </div>
                        <label>Status: </label>
                        <div class="form-group">
                            <input type="text" id="status" placeholder="Status"
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $('#tanggal_awal, #tanggal_akhir').change(function(){
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();

    $.ajax({
        url: '/manager/perawatan',
        method: 'GET',
        data: {
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        success: function(response) {
            $('#tabel-perawatan').html(response);
        },

        error: function(xhr){
            console.log(xhr.responseText);
        }

    });
 
});


</script>

@endsection

