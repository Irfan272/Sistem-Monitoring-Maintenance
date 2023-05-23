<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager MT</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-dztbJg6ukL7fJQ2adz0RUCfLYGxmf4xs9XnfY5eklHO5B+brLZ5LJjU8f6RmP6kNJ4xG4X4Z5d5ZufiiMw14hw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cetak Penjadwalan Perawatan</h3>
                {{-- <a href="/manager/perawatan/create" class="btn btn-success me-1 mb-3 mt-2" id="success" ><i class="bi bi-plus"></i> <span>Tambah Data Peralatan</span></a> --}}
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

    <h1>Nama Peralatan : </h1>
    <input type="text" id="judul" class="form-control"
    placeholder="Judul" name="judul" value="{{$peralatan->nama_peralatan}}">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="static" align="center" rules="all" vorder="1px" style="width: 75%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peralatan</th>
                            <th>Jenis Peralatan</th>
                            <th>Merk Peralatan</th>
                            <th>Produsen</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cetakRiwayat as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_peralatan}}</td>
                            <td>{{$data->jenis_peralatan}}</td>
                            <td>{{$data->merk_peralatan}}</td>
                            <td>{{$data->produsen}}</td>

                        </tr>
                        @endforeach
                
                     
                </table>
            </div>
        </div>

    </section>




</div>

<script> 
window.print();
</script>


</body>

</html>
