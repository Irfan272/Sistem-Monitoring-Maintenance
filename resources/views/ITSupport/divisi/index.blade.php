@extends('ITSupport.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Divisi</h3>
                <a href="/IT/divisi/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Divisi</span></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Divisi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi</th>   
                            <th>Deksripsi</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisi as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_divisi}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>
                                <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                                <a href="{{url('/IT/divisi/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i> Edit</a>
                                
                                <form action="/IT/divisi/delete/{{$data->id}}" method="POST">
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
     @foreach ($divisi as $data)
         

     <div class="modal fade" id="divisiModal{{$data->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalScrollableTitle">Data : {{$data->nama_divisi}}</h5>
                 <button type="button" class="close" data-bs-dismiss="modal"
                     aria-label="Close">
                     <i data-feather="x"></i>
                 </button>
             </div>
             <div class="modal-body">
                    <div class="modal-body">
                        <label>Nama Divisi </label>
                        <div class="form-group">
                            <input type="text" placeholder="Sipil"
                                class="form-control" value="{{$data->nama_divisi}}" name="nama_divisi" id="nama_divisi" disabled>
                        </div>
                        <label>Keterangan: </label>
                        <div class="form-group">
                            <textarea style="height: 200px" type="text" placeholder="bertugas mengelola urusan lapangan"
                                class="form-control" name="keterangan" id="keterangan" disabled>{{$data->keterangan}}</textarea>
                        </div>
                        
                    </div>
  
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

