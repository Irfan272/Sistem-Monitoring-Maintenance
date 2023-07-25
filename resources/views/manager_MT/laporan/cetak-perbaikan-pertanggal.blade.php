<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .wrap-text {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
    <title>Laporan Perbaikan</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            {{-- <h2>PT. PRIMA KONSTRUKSI UTAMA</h2> --}}
            <img src="{{asset('assets/images/logo/logo_pku.png')}}" alt="Logo" srcset="" style="width: 600px; height: 90px">
        </div>
        <div class="text-center mt-5">
            <h4 class="text-center mt-5">Laporan Perbaikan</h4>
            <p>Range tanggal: {{ $tanggal_mulai }} s/d {{ $tanggal_terakhir }}</p
        </div>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Perbaikan</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Nama Peralatan</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Nama Teknisi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Prioritas</th>
                        <th scope="col">Tanggal Perbaikan</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cetakperbaikan as $data)
                        
         
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td class="wrap-text">PB-0{{$data->id}}</td>
                        <td class="wrap-text">{{$data->judul}}</td>
                        <td class="wrap-text ">{{$data->peralatan->nama_peralatan}}</td>
                        <td class="wrap-text">{{$data->user->username}}</td>
                        {{-- Nanti diganti dengan nama teknisi --}}
                        {{-- <td class="wrap-text">      @if ($data->teknisi && $data->teknisi->user)
                            {{ $data->teknisi->user->username }}
                        @endif</td>  --}}
                        <td class="wrap-text">{{$data->teknisi->username}}</td>
                        <td class="wrap-text">{{$data->keterangan}}</td>
                        <td class="wrap-text">{{$data->prioritas}}</td>
                        <td class="wrap-text">{{$data->tanggal_pekerjaan}}</td>
                        <td class="wrap-text">{{$data->lokasi}}</td> 
                        <td class="wrap-text">{{$data->status}}</td>
                    </tr>
                    @endforeach
                    <tr>

                        <td class="text-center fw-bold" colspan="10">Total : {{$total}}</td>




                    </tr>
                  
                </tbody>
            </table>
        </div>

        <div class="text-end">
            <p>Serang, {{$tanggal_cetak}}</p>
            <p class="text-decoration-underline me-5 mt-5 w-">{{auth()->user()->username}}</p>
            <p>{{auth()->user()->jabatan}}</p>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>