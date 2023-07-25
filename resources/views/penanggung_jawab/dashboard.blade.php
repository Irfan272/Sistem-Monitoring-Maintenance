@extends('penanggung_jawab.layout.master')

@section('content')

<section class="row">
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldSetting"></i>                                   
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Peralatan</h6>
                                <h6 class="font-extrabold mb-0">{{$total_peralatan}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldTime-Circle"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Permintaan Perbaikan</h6>
                                <h6 class="font-extrabold mb-0">{{$total_permintaan}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Peralatan</h4>
                        </div>
                        <div class="card-content">
                          
    
                            <!-- Table with no outer spacing -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peralatan as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-bold-500">{{$data->nama_peralatan}}</td>                                            
                                            <td class="text-bold-500"><button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                                data-bs-target="#peralatanModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                            
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                         
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Permintaan Perbaikan</h4>
                        </div>
                        <div class="card-content">
                          
    
                            <!-- Table with no outer spacing -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permintaan as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-bold-500">{{$data->judul}}</td>                                            
                                            <td class="text-bold-500"><button type="submit" class="btn m-1 icon icon-left btn-info" data-bs-toggle="modal"
                                                data-bs-target="#permintaanModal{{$data->id}}"><i data-feather="eye"></i> View</button>
                                            
                                            </td>
                                            
                                        </tr>
                                        @endforeach       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <!--View Modal -->

          @foreach ($peralatan as $data)    
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
                                        class="form-control" value="{{$data->jenis_perawatan}}" name="nama_divisi" id="nama_divisi" disabled>
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

   <div class="modal fade" id="permintaanModal" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalScrollableTitle">Scrolling long
                   Content</h5>
               <button type="button" class="close" data-bs-dismiss="modal"
                   aria-label="Close">
                   <i data-feather="x"></i>
               </button>
           </div>
           <div class="modal-body">
              <form action="#">
                  <div class="modal-body">
                      <label>Judul: </label>
                      <div class="form-group">
                          <input type="text" id="judul" placeholder="Judul"
                              class="form-control">
                      </div>
                      <label>Mesin: </label>
                      <div class="form-group">
                          <input type="text" id="mesin" placeholder="Mesin"
                              class="form-control">
                      </div>
                      <label>Nama User: </label>
                      <div class="form-group">
                          <input type="text" id="nama_user" placeholder="Nama User"
                              class="form-control">
                      </div>
                      <label>Keterangan: </label>
                      <div class="form-group">
                          <input type="text" id="keterangan" placeholder="Keterangan"
                              class="form-control">
                      </div>
                      <label>Prioritas: </label>
                      <div class="form-group">
                          <input type="text" id="prioritas"  placeholder="Prioritas"
                              class="form-control">
                      </div>
                      <label>Lokasi: </label>
                      <div class="form-group">
                          <input type="text" id="lokasi" placeholder="Lokasi"
                              class="form-control">
                      </div>
                      <label>Tanggal Perkerjaan: </label>
                      <div class="form-group">
                          <input type="date" id="tanggal_pekerjaan" placeholder="Tanggal Perkerjaan"
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


    <div class="col-12 col-lg-3">
      
        <div class="card">
            <div class="card-header">
                <h4>Recent Messages</h4>
            </div>
            <div class="card-content pb-4">
                @foreach ($akun as $data)
                    
              
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('assets/images/faces/4.jpg')}}">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">{{$data->username}}</h5>
                        <h6 class="text-muted mb-0">{{$data->no_telpon}}</h6>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
     
    </div>
</section>
@endsection