<?php

namespace App\Http\Controllers;

use App\Models\JadwalPerbaikan;
use App\Models\Peralatan;
use App\Models\PerawatanRutin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewItem;
// use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ManagerPerawatanController extends Controller
{
  

    public function index(Request $request){
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        if($tanggal_awal && $tanggal_akhir){
            // Jika input tanggal ada maka lakukan filter berdasarkan tanggal
            $perawatan = PerawatanRutin::with('peralatan', 'user')
                ->whereBetween('tanggal_pekerjaan', [$tanggal_awal, $tanggal_akhir])
                ->paginate(10);
            }else{
                $perawatan = PerawatanRutin::with('peralatan', 'user')->paginate(10);
            }

            if($request->ajax()){
                return view('manager_MT.perawatan.index-ajax', compact('perawatan'));   
            }else{
                return view('manager_MT.perawatan.index', compact('perawatan'));
            }
      


    }

    public function create(){
        $peralatan = Peralatan::all();
        $user = User::where('role', 'Teknisi')->get();
        return view('manager_MT.perawatan.create', compact('peralatan', 'user'));
    }

    public function store(Request $request){
  

        $validasiData = $request->validate([
        

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',            
            'keterangan' => 'required|max:255',
            'prioritas' => 'required',
            'id_teknisi' => 'required',

        ]);

        $status = "Dalam Pengerjaan";
        $prioritas = $request->input('prioritas');
        $tanggal_pekerjaan = Carbon::today();

        if($prioritas === 'critical'){
            $tanggal_pekerjaan->addDays(2);
        }elseif($prioritas === 'hight'){
            $tanggal_pekerjaan->addDays(14);
        }elseif($prioritas === 'medium'){
            $tanggal_pekerjaan->addDays(30);
        }elseif($prioritas === 'low'){
            $tanggal_pekerjaan->addDays(90);
        }

        $validasiData['tanggal_pekerjaan'] = $tanggal_pekerjaan;
        $validasiData['status'] = $status;

        PerawatanRutin::create($validasiData);

    // $jadwalPerawatan = JadwalPerbaikan::find($validasiData['id_peralatan']);
    // if ($jadwalPerawatan) {
    //     $jadwalPerawatan->sendNewItem();
    // }

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/manager/perawatan');
    }


    public function edit($id){
   
        $peralatan = Peralatan::all();
        $user = User::where('role', 'Teknisi')->get();
        $perawatan = PerawatanRutin::where('id', $id)->get();

        return view('manager_MT.perawatan.edit', compact('peralatan', 'user', 'perawatan'));
    }


    public function update(Request $request, $id){
        $validasiData = $request->validate([
        

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',            
            'keterangan' => 'required|max:255',
            'prioritas' => 'required',
            'id_teknisi' => 'required',
            'status' => 'nullable|max:50',
        ]);

    
        $prioritas = $request->input('prioritas');
        $tanggal_pekerjaan = Carbon::today();

        if($prioritas === 'critical'){
            $tanggal_pekerjaan->addDays(2);
        }elseif($prioritas === 'hight'){
            $tanggal_pekerjaan->addDays(14);
        }elseif($prioritas === 'medium'){
            $tanggal_pekerjaan->addDays(30);
        }elseif($prioritas === 'low'){
            $tanggal_pekerjaan->addDays(90);
        }

        $validasiData['tanggal_pekerjaan'] = $tanggal_pekerjaan;
    
        PerawatanRutin::where('id', $id)->update($validasiData);

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/manager/perawatan');
    }

    public function cetakPerawatan(){
        return view('manager_MT.laporan.cetak-perawatan');
    }

    public function cetakPerawatanPertanggal($tanggal_awal, $tanggal_akhir){

        $tanggal_mulai = Carbon::parse($tanggal_awal)->format('d-m-Y');
        
        $tanggal_terakhir = Carbon::parse($tanggal_akhir)->format('d-m-Y');
        //dd(["Tanggal Awal : ".$tanggal_awal,"Tanggal Akhir : ".$tanggal_akhir]  );
        $cetakperawatan = PerawatanRutin::whereBetween('tanggal_pekerjaan', [$tanggal_awal, $tanggal_akhir])->get();
        $total =  $cetakperawatan->count();
        $tanggal_cetak = Carbon::today()->startOfDay()->format('d-m-Y');
        
        return view('manager_MT.laporan.cetak-perawatan-pertanggal', compact('tanggal_cetak','cetakperawatan', 'tanggal_mulai', 'tanggal_terakhir', 'total'));

        // return view('manager_MT.perawatan.index', compact('cetakperawatan'));
    }


}
