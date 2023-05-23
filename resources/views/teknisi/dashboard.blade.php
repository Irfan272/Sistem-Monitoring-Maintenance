@extends('teknisi.layout.master')

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
                                <h6 class="font-extrabold mb-0">10</h6>
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
                                <h6 class="font-extrabold mb-0">50</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
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
                                        <tr>
                                            <td>1</td>
                                            <td class="text-bold-500">Wheel Loader</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> View</a></td>
    
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-bold-500">Crane</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> View</a></td>
    
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="text-bold-500">Bulldozer</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> View</a></td>
    
                                        </tr>      
                                        <tr>
                                            <td>4</td>
                                            <td class="text-bold-500">Forklif</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> View</a></td>
    
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
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
                                        <tr>
                                            <td>1</td>
                                            <td class="text-bold-500">Sipil</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> Info</a></td>
    
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-bold-500">Electrical</td>                                            
                                            <td class="text-bold-500"><a href="#" class="btn icon icon-left btn-info"><i data-feather="eye"></i> Info</a></td>
    
                                        </tr>
                                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="{{asset('assets/images/faces/1.jpg')}}" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">John Duck</h5>
                        <h6 class="text-muted mb-0">@johnducky</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Recent Messages</h4>
            </div>
            <div class="card-content pb-4">
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('assets/images/faces/4.jpg')}}">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Hank Schrader</h5>
                        <h6 class="text-muted mb-0">@johnducky</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('assets/images/faces/5.jpg')}}">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Dean Winchester</h5>
                        <h6 class="text-muted mb-0">@imdean</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('assets/images/faces/1.jpg')}}">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">John Dodol</h5>
                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                    </div>
                </div>
                <div class="px-4">
                    <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Start Conversation</button>
                </div>
            </div>
        </div>
     
    </div>
</section>
@endsection