@extends('teknisi.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Perawatan Rutin</h3>
                {{-- <a href="/manager/perawatan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Perawatan Rutin</span></a> --}}
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
        {{-- id="tabel-perawatan" --}}
        <div >
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Perawatan</th>
                        <th>Judul</th>
                        <th>Peralatan</th>
                        <th>Keterangan</th>
                        <th>Nama Teknisi</th>
                        <th>Prioritas</th>
                        <th>Tanggal Pekerjaan</th>
                        <th>Status</th>
                        <th>Action</th>



                        {{-- <th>Kode Perbaikan</th>
                        <th>Judul</th>
                        <th>Mesin</th>
                        <th>Penanggung Jawab</th>
                        <th>Prioritas</th>
                        <th>Lokasi</th>
                        <th>Tanggal Pengerjaan</th>
                        <th>Status</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perawatan as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>PR-0{{$data->id}}</td>
                        <td>{{$data->judul}}</td>
                        <td>{{$data->peralatan->nama_peralatan}}</td>
                        <td>{{$data->keterangan}}</td>
                        <td>{{$data->prioritas}}</td>
                      
                     
                        <td>{{$data->user->username}}</td>
                        <td>{{$data->tanggal_pekerjaan}}</td>
                        <td>
                            {{$data->status}}
                        </td>
                        <td>
                            <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                            data-bs-target="#permintaanModal{{$data->id}}"><i data-feather="eye"></i>View</button>
                            {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                            data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                            <a href="{{url('/teknisi/perawatan/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i>Edit</a>
                            
                            {{-- <form action="/teknisi/perawatan/delete/{{$data->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn m-1 icon icon-left btn-danger"><i data-feather="x"></i>Delete</button>
                            </form> --}}
                        </td>

                    </tr>
                    @endforeach
            
                 
            </table>
        </div>
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


// pt
// Copy code
// $(document).ready(function() {
//     // Event delegation untuk tombol "View"
//     $(document).on('click', '.btn-info', function() {
//         // Kode logika untuk tombol "View"
//         // ...
//     });

//     // Event delegation untuk tombol "Edit"
//     $(document).on('click', '.btn-warning', function() {
//         // Kode logika untuk tombol "Edit"
//         // ...
//     });

//     // Event delegation untuk tombol "Delete"
//     $(document).on('click', '.btn-danger', function() {
//         // Kode logika untuk tombol "Delete"
//         // ...
//     });

//     // Fungsi untuk menginisialisasi event listener pada tombol aksi
//     function initActionButtons() {
//         $('.btn-info').removeClass('btn-sm').addClass('btn');
//         $('.btn-warning').removeClass('btn-sm').addClass('btn');
//         $('.btn-danger').removeClass('btn-sm').addClass('btn');
//     }

//     // Panggil fungsi initActionButtons saat halaman pertama dimuat
//     initActionButtons();
//  $('#tanggal_awal, #tanggal_akhir').change(function(){
//     var tanggal_awal = $('#tanggal_awal').val();
//     var tanggal_akhir = $('#tanggal_akhir').val();

//     $.ajax({
//         url: '/manager/perawatan',
//         method: 'GET',
//         data: {
//             tanggal_awal: tanggal_awal,
//             tanggal_akhir: tanggal_akhir
//         },
//         success: function(response) {
//             var parsed = $('<div>').html(response);

//             $('#tabel-perawatan').html(parsed.find('#tabel-perawatan').html());

//             // Memperbarui elemen paginasi
//             $('#pagination').html(parsed.find('#pagination').html());
//             initActionButtons();
//         },

//         error: function(xhr){
//             console.log(xhr.responseText);
//         }

//     });
 
// });

// });

$(document).ready(function() {
    // Fungsi untuk memperbarui tabel dengan data terfilter
    function updateFilteredData(tanggal_awal, tanggal_akhir) {
        $.ajax({
            url: '/manager/perawatan',
            method: 'GET',
            data: {
                tanggal_awal: tanggal_awal,
                tanggal_akhir: tanggal_akhir
            },
            success: function(response) {
                $('#tabel-perawatan').html(response);
                initActionButtons(); // Inisialisasi ulang event listener pada tombol aksi setelah pembaruan tabel
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    // Inisialisasi event listener pada tombol filter
    $('#tanggal_awal, #tanggal_akhir').change(function() {
        var tanggal_awal = $('#tanggal_awal').val();
        var tanggal_akhir = $('#tanggal_akhir').val();
        updateFilteredData(tanggal_awal, tanggal_akhir);
    });

    // Event delegation untuk tombol "View"
    $(document).on('click', '.btn-info', function() {
        // Kode logika untuk tombol "View"
        // ...
    });

    // Event delegation untuk tombol "Edit"
    $(document).on('click', '.btn-warning', function() {
        // Kode logika untuk tombol "Edit"
        // ...
    });

    // Event delegation untuk tombol "Delete"
    $(document).on('click', '.btn-danger', function() {
        // Kode logika untuk tombol "Delete"
        // ...
    });

    // Fungsi untuk menginisialisasi event listener pada tombol aksi
    function initActionButtons() {
        $('.btn-info').removeClass('btn-sm').addClass('btn');
        $('.btn-warning').removeClass('btn-sm').addClass('btn');
        $('.btn-danger').removeClass('btn-sm').addClass('btn');
    }

    // Panggil fungsi initActionButtons saat halaman pertama dimuat
    initActionButtons();
});


</script>

@endsection

