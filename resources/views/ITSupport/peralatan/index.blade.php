@extends('ITSupport.layout.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peralatan</h3>
                <a href="/IT/peralatan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Peralatan</span></a>
                <a href="{{ url('peralatan.pdf')}}" class="btn btn-primary me-1 mb-3 mt-2" id="success"> <button class="btn btn-primary me-1 mb-3 mt-2" id="success">  <span>Download</span></button></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peralatan</th>
                            <th>Merk Peralatan</th>
                            <th>Divisi</th>
                            <th>Tahun Masuk</th>
                            <th>Batas Pemakaian</th>
                            <th>Kondisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peralatans as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_peralatan}}</td>
                            <td>{{$data->merk_peralatan}}</td>
                            <td>{{$data->divisi->nama_divisi}}</td>
                            <td>{{$data->tahun_pembuatan}}</td>
                            <td>{{$data->tahun_batas}}</td>
                            <td>{{$data->kondisi}}</td>
                            <td>
                                <button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#peralatanModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                {{-- <a href="{{url('IT/divisi/modal', $divisi->id)}}" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                data-bs-target="#divisiModal"><i data-feather="eye"></i> View</a> --}}
                                <a href="{{url('/IT/peralatan/edit', $data->id)}}" class="btn m-1 icon icon-left btn-warning"><i data-feather="edit"></i> Edit</a>
                                
                                <form action="/IT/peralatan/delete/{{$data->id}}" method="POST">
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
   @foreach ($peralatans as $data)
         

   <div class="modal fade" id="peralatanModal{{$data->id}}" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalScrollableTitle">Data : {{$data->nama_peralatan}}</h5>
               <button type="button" class="close" data-bs-dismiss="modal"
                   aria-label="Close">
                   <i data-feather="x"></i>
               </button>
           </div>
           <div class="modal-body">
                  <div class="modal-body">
                      <label>Nama Peralatan : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->nama_peralatan}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Jenis Peralatan : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->jenis_peralatan}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Merk Peralatan : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->merk_peralatan}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Produsen : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->produsen}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Divisi : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->divisi->nama_divisi}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Tahun Pembuatan : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->tahun_pembuatan}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Tahun Batas : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->tahun_batas}}" name="nama_divisi" id="nama_divisi" disabled>
                      </div>
                      <label>Kondisi : </label>
                      <div class="form-group">
                          <input type="text" placeholder="Sipil"
                              class="form-control" value="{{$data->kondisi}}" name="nama_divisi" id="nama_divisi" disabled>
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

